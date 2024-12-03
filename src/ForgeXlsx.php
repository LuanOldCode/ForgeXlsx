<?php

namespace ForgeXlsx;

use ZipArchive;

class ForgeXlsx
{
    private $sheets = [];
    private $filePath;

    public function __construct($filePath = null)
    {
        $this->filePath = $filePath ?: tempnam(sys_get_temp_dir(), 'xlsx_');
    }

    public function createSheet($name = 'Sheet1')
    {
        $sheet = new Sheet($name);
        $this->sheets[] = $sheet;
        return $sheet;
    }

    public function save($outputPath)
    {
        $zip = new ZipArchive();
        $zip->open($outputPath, ZipArchive::CREATE);

        $zip->addFromString('[Content_Types].xml', $this->generateContentTypes());
        $zip->addFromString('_rels/.rels', $this->generateRelationships());
        $zip->addFromString('xl/workbook.xml', $this->generateWorkbook());
        foreach ($this->sheets as $index => $sheet) {
            $zip->addFromString("xl/worksheets/sheet" . ($index + 1) . ".xml", $sheet->toXml());
        }

        $zip->close();
    }

    private function generateContentTypes() {
        return <<<XML
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>
    <Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>
</Types>
XML;
    }


    private function generateRelationships() {
        return <<<XML
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>
</Relationships>
XML;
    }


    private function generateWorkbook() {
        return <<<XML
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" 
          xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">
    <sheets>
        <sheet name="Sheet1" sheetId="1" r:id="rId1"/>
    </sheets>
</workbook>
XML;
    }

}
