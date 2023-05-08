### Executando o projeto

- Clone o projeto:
```sh
git clone git@github.com:tiagofrancafernandes/Test-dev-PHP-Laravel-Fullstack.git

cd ./Test-dev-PHP-Laravel-Fullstack
```

- Instale as dependências do composer
```sh
composer install
```

- Faça a copia do `.env.example` para `.env`

- Gere a chave da aplicação

```sh
php artisan key:generate
```

- Ajuste os campos `DB_*`

```sh
# Como tem docker no projeto, pode deixar assim:
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

- Execute as migrations

```sh
php artisan migrate --step --seed
```

Com isso foi criado o usuário abaixo:
```sh
admin@mail.com # Email
power@123 # Senha
```

- Instale as dependencias do JS e execute...
```sh
Faça o build/watch
npm run dev #watch
npm run build #build
```

- Agora é só servir a aplicação:
```sh
php artisan serve
```

*Done!*
----

# DESAFIO VAGA FULLSTACK PHP


## Objetivo:
> Criar uma aplicação web em PHP com acesso restrito, que exiba uma listagem de livros com as opções de ver os detalhes, editar, deletar e criar um livro, e também exiba o clima atual da sua região.

## Entrega

* O prazo para realização do teste é de 3 dias.
* Após o término da prova, colocar o código em algum repositório público (github, gitlab, bitbucket.. ) e então informar nas respostas o caminho onde está a prova para avaliação respondendo o email.

## Funcionalidades:

### 1) Tela de Login
* A tela inicial deve ser a de login;
* Não deve ser possível acessar outras telas sem realizar o login;

### 2) CRUD de Livros
* *Listagem* de livros com *paginação* e *filtragem*;
* *Adição* e *Edição* de Livros;
    - Dados do Livro
        - Título;
        - Descrição;
        - Autor;
        - Número de Páginas;
        - Data de Cadastro;
* *Exclusão* de um livro.

### 3) Clima da região
* Integração com API externa para exibir o clima de uma determinada região;
* Mostrar apenas o Clima atual.
    - API https://hgbrasil.com/status/weather. Consultar documentação https://console.hgbrasil.com/documentation/weather.


## Requisitos:
* Linguagem de programação em PHP;
* Banco de dados *relacional*;
* Usar um *Framework Laravel*;
* **_Não_** usar *CMS* de mercado (Wordpress, Joomla...);
* Dados de acesso em MOCK ou usar Migrations;
* README estruturado com descrição e orientações sobre o projeto;
* Disponibilizar o projeto em repositório público para (github, gitlab, bitbucket.. );
* Design Responsivo.


## Diferenciais _(e não obrigatórios)_
* Aplicação rodando com Docker;
* Testes unitários;
* Uso de Migrations;

## Critérios de Avaliação:
* Cuidados com estruturação de código;
* Falhas de Sintaxe;
* Validações e cumprimento das regras de negócio;
* Cuidados com design (UI/UX, responsividade e CSS);
* Interface organizada e amigável;
* Componentização;
* Cumprimento de Funcionalidades e Requisitos;
* Compromisso com o prazo de entrega.

> *Importante:*
>
> caso não consiga finalizar completamente o desafio dentro do prazo estipulado, não deixe de enviar seu código para nossa avaliação. Envie e comunique o que você desenvolveu e o que ficou faltando.

----

## Activity Control

* Auth
    - laravel/ui (blade) [ok]
    - seeder [ok]
* Sempre exigir auth
    - exceto para
        - login
        - register
        - recovery pass
* CRUD de livros
    - migration [ok]
    - factory [ok]
    - model [ok]
    - seeder [ok]
    - Controller
        - CRUD [ok]
    - Routes
        - CRUD Books [ok]
            - index [ok]
            - show [ok]
            - form (create/edit) [ok]
            - destroy [ok]
            - store [ok]
            - update [ok]
            - validations (store, update) [ok]
                - title -> `required|string|min:3|max:100`
                - description -> `required|string|min:3|max:1000`
                - author_id -> `required|exists:\App\Models\Author,id`
                - page_count -> `required|integer|min:1`
    - [TODO]
        - Clima da região [TODO] <=== WIP
        - Add Bootstrap CSS dependency [ok]
        - Show confirm message on delete item [ok]
        - Show message validation error on input [ok]
        - Automated tests [WIP]
            - For auth [ok]
                - Login [ok]
                - Register [ok]
            - For books CRUD [TODO]
                - List [TODO]
                - Edit [TODO]
                - Update [TODO]
                - Delete [TODO]
                - Show [TODO]
        - Dynamic pagination (via form/links) [TODO]
