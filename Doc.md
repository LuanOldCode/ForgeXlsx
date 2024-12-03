# 📖 Documentação da ForgeXlsx

## Introdução

ForgeXlsx é uma biblioteca PHP para criar e manipular arquivos XLSX de maneira eficiente e otimizada, evitando o consumo excessivo de memória. Essa documentação aborda como instalar, usar e personalizar as planilhas geradas pela biblioteca.

---

## 📦 Instalação

Antes de usar a ForgeXlsx, instale a biblioteca via Composer (disponível em breve):

```bash
composer require luanoldcode/forgexlsx
```

Inclua o autoloader no seu código:

```php
require 'vendor/autoload.php';
```

---

## 🛠 Exemplo Básico de Uso

### Criando uma Planilha do Zero

```php
use ForgeXlsx\ForgeXlsx;

$xlsx = new ForgeXlsx();
$sheet = $xlsx->createSheet('Minha Planilha');
$sheet->addRow(['Coluna 1', 'Coluna 2', 'Coluna 3']);
$sheet->addRow(['Valor 1', 'Valor 2', 'Valor 3']);
$xlsx->save('minha_planilha.xlsx');
```

- **`createSheet($name)`**: Cria uma nova planilha com o nome especificado.
- **`addRow(array $data)`**: Adiciona uma linha com os dados fornecidos.
- **`save($path)`**: Salva o arquivo no caminho especificado.

### Abrindo e Editando um Arquivo Existente

```php
$xlsx = new ForgeXlsx('planilha_existente.xlsx');
$sheet = $xlsx->getSheet(0); // Seleciona a primeira planilha
$sheet->addRow(['Nova Linha', 'Com Novos Dados']);
$xlsx->save();
```

- **`getSheet($index)`**: Retorna a planilha no índice especificado.
- **`addRow(array $data)`**: Adiciona uma linha de dados na planilha.

---

## 🎨 Personalização de Estilos

Adicione estilos personalizados às células, como bordas, cores e alinhamento.

### Adicionando Estilo Simples

```php
$sheet->addRow(
    ['Cabeçalho 1', 'Cabeçalho 2', 'Cabeçalho 3'],
    ['bold' => true, 'backgroundColor' => '#FFFF00']
);
```

- **`bold`**: Define se o texto será em negrito.
- **`backgroundColor`**: Define a cor de fundo da célula.

### Definindo Estilos por Coluna

```php
$sheet->setColumnStyle('A', ['bold' => true, 'fontColor' => '#FF0000']);
```

- **`setColumnStyle($column, $style)`**: Define um estilo para uma coluna inteira.

---

## 🚀 Funcionalidades Avançadas

### Gerenciamento de Grandes Volumes de Dados

A ForgeXlsx utiliza streams para manipular arquivos, permitindo lidar com grandes conjuntos de dados sem sobrecarregar a memória.

```php
$sheet = $xlsx->createSheet('Dados Extensos');

for ($i = 1; $i <= 1000000; $i++) {
    $sheet->addRow(["Linha $i", rand(1, 1000), date('Y-m-d')]);
}

$xlsx->save('dados_grandes.xlsx');
```

---

## 📚 Estrutura do Arquivo XLSX

A ForgeXlsx cria automaticamente a estrutura do arquivo conforme as especificações do OpenXML. Você não precisa gerenciar detalhes como relacionamentos ou tipos de conteúdo.

---

## 📄 Licença

ForgeXlsx é licenciado sob a GNU General Public License v3.0. Para mais informações, acesse a [licença oficial](https://www.gnu.org/licenses/gpl-3.0.en.html).

---

Para dúvidas, contribuições ou sugestões, visite o repositório oficial no [GitHub de LuanOldCode](https://github.com/LuanOldCode/forgeXlsx). 🚀