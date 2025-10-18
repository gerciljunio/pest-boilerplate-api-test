# Pest Boilerplate API Test

## Sobre o Projeto
Este projeto é um boilerplate para testes automatizados de APIs em PHP utilizando Pest.
Ele foi criado para acelerar o desenvolvimento de testes em APIs externas ou internas, oferecendo uma estrutura organizada, modular e pronta para uso em qualquer projeto.

Além disso, o repositório já conta com um workflow de integração contínua (CI) configurado no GitHub Actions, permitindo executar automaticamente todos os testes a cada novo push request.

## Tecnologias Utilizadas
- PHP 8.3+
- Pest PHP – Framework de testes
- Composer – Gerenciador de dependências do PHP
- PHPUnit – Base de execução para o Pest
- Allure - Relatórios de testes automatizados

## Como utilizar

### Clonando o repositório
```bash
git clone https://github.com/gerciljunio/pest-boilerplate-api-test.git
cd pest-boilerplate-api-test
```

### Instalando dependências via Composer
```bash
composer install
```

### Instalação do Allure Report

#### macOS (via Homebrew)
```bash
brew install allure
```

#### Windows (via Chocolatey)
```bash
choco install allurecommandline -y
```

#### Linux (via Snap)
```bash
sudo snap install allure --classic
```

## Estrutura do Projeto

```
.
├── .env.testing
├── composer.json
├── phpunit.xml
├── .github/
│   └── workflows/
│       └── pest.yml
└── tests
    ├── Api
    │   └── Auth
    │       └── SimpleTest.php
    ├── Datasets
    │   └── Headers.php
    ├── Pest.php
    ├── Plugins
    │   └── CustomExpectations.php
    └── Support
        └── Env.php
```

## Descrição das Pastas
- `.env.testing` → Arquivo opcional usado para definir variáveis de ambiente específicas do ambiente de testes. Permite isolar credenciais e URLs de APIs sem afetar outros ambientes.

- `composer.json` → Define as dependências do projeto e scripts personalizados. É o ponto central de configuração do projeto em PHP, incluindo o Pest e outras bibliotecas utilizadas nos testes.

- `phpunit.xml` → Arquivo de configuração do PHPUnit, utilizado internamente pelo Pest. Controla parâmetros como diretórios de testes, relatórios e configurações de ambiente de execução.

- `.github/workflows/` → workflow(s) do GitHub Actions (pest.yml).

- `tests/Api/` → Contém os testes organizados por módulos da API. Cada pasta representa uma área funcional, como Auth, Users, Products, etc.

- `tests/Datasets/` → Reúne dados compartilhados entre testes, como cabeçalhos, tokens e payloads. Os datasets permitem escrever testes mais limpos e reutilizáveis.

- `tests/Plugins/` → Contém extensões e matchers personalizados para o Pest, tornando os testes mais expressivos (por exemplo, expect()->toHaveStatus(200)).

- `tests/Support/` → Funções auxiliares, configurações e utilitários, como o carregamento de variáveis de ambiente e helpers genéricos.

- `tests/Pest.php` → Arquivo principal de configuração do Pest, responsável por carregar plugins, datasets e hooks globais.

## Executando testes
Os comandos devem sempre ser executados na raiz do diretório do projeto.

### Sem relatório

#### Via Composer
```bash
# Executa os testes
composer test
```

#### Via Pest
```bash
# Executa os testes
./vendor/bin/pest
```

### Com relatório

#### Via Composer
```bash
# Executa os testes
composer test

# Cria o relatório e abre a interface web
composer test:allure
```

#### Via Pest e Allure
```bash
# Executa os testes
./vendor/bin/pest

# Cria o relatório
allure generate build/allure-results --clean -o build/allure-report

# Abre a interface web do relatório
allure open build/allure-report
```

## Considerações Finais
Este boilerplate foi pensado para ser simples, escalável e fácil de adaptar a qualquer projeto.

## Autor
Gercil Junio - Desenvolvedor Backend

- [📧 Gmail](mailto:gerciljunio@gmail.com)
- [💼 LinkedIn](https://www.linkedin.com/in/gercil)
- [🐙 GitHub](https://github.com/gerciljunio)