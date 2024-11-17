
# ForgeXlsx

ForgeXlsx é uma biblioteca em PHP para manipular e criar arquivos XLSX de forma otimizada e com alto desempenho. Inspirada no **ForgePDF**, a ForgeXlsx busca oferecer uma solução eficiente e fácil de usar para gerar planilhas diretamente em PHP.

## 🚀 Características

- Manipulação de arquivos XLSX existente.
- Criação de arquivos XLSX do zero.
- Suporte a grandes volumes de dados sem perda de desempenho.
- Configuração de estilos personalizados para células, como cores, bordas e alinhamento.
- Compactação otimizada para reduzir o tamanho dos arquivos gerados.
- Integração simples com projetos PHP via [Composer](https://getcomposer.org/).

## 📦 Instalação

A biblioteca ainda está em desenvolvimento e será publicada em breve no Packagist. Para incluir a ForgeXlsx ao seu projeto, você poderá usar o Composer:

```bash
composer require luanoldcode/forgexlsx
```

## 📝 Exemplo de Uso

### Criando uma Planilha do Zero

```php
require 'vendor/autoload.php';

use ForgeXlsx\ForgeXlsx;

$xlsx = new ForgeXlsx();
$xlsx->createSheet('Minha Planilha');
$xlsx->addRow(['Coluna 1', 'Coluna 2', 'Coluna 3']);
$xlsx->addRow(['Dado 1', 'Dado 2', 'Dado 3']);
$xlsx->save('meu_arquivo.xlsx');
```

### Abrindo e Editando um Arquivo Existente

```php
$xlsx = new ForgeXlsx('arquivo_existente.xlsx');
$xlsx->addRow(['Nova Linha', 'Com Novos Dados']);
$xlsx->save();
```

## 📚 Documentação Completa

A documentação oficial da ForgeXlsx está em desenvolvimento e estará disponível em breve. Fique atento às atualizações neste repositório.

## 🛠 Contribuição

Contribuições são bem-vindas! Siga os passos abaixo para contribuir com o projeto:

1. Faça um fork deste repositório.
2. Crie uma branch para sua feature: `git checkout -b minha-feature`.
3. Faça o commit das suas alterações: `git commit -m 'Adiciona minha feature'`.
4. Envie para a branch principal: `git push origin minha-feature`.
5. Abra um Pull Request.

## 📄 Licença

Este projeto está licenciado sob a [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html).

---

**ForgeXlsx** é mantido por [LuanOldCode](https://github.com/LuanOldCode). Para dúvidas ou sugestões, sinta-se à vontade para abrir uma issue ou entrar em contato.
