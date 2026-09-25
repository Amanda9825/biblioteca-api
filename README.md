# Biblioteca API

API REST desenvolvida em Laravel para gerenciamento de uma biblioteca.

O projeto foi desenvolvido para a disciplina de Desenvolvimento Web III e disponibiliza operações de cadastro, consulta, atualização e exclusão para autores, categorias, livros e usuários.

## API pública

A API está disponível em:

https://biblioteca-api-wg3j.onrender.com

## Tecnologias utilizadas

- PHP 8.4
- Laravel 13
- MySQL (desenvolvimento local)
- PostgreSQL (produção - Neon)
- Laravel Sanctum
- REST API
- JSON
- Composer
- Postman
- Git
- GitHub
- Render
- Neon

## Funcionalidades

A API possui os seguintes recursos:

- Cadastro e gerenciamento de autores
- Cadastro e gerenciamento de categorias
- Cadastro e gerenciamento de livros
- Cadastro e gerenciamento de usuários
- Autenticação de usuários utilizando Laravel Sanctum
- Relacionamento entre livros, autores e categorias
- Respostas no formato JSON
- Operações GET, POST, PUT e DELETE
- Persistência de dados em banco de dados relacional
- Migrations para criação e atualização da estrutura do banco

## Estrutura dos recursos

### Autores

| Método | Endpoint | Descrição |
|---|---|---|
| GET | `/api/autores` | Lista todos os autores |
| GET | `/api/autores/{id}` | Consulta um autor |
| POST | `/api/autores` | Cadastra um autor |
| PUT | `/api/autores/{id}` | Atualiza um autor |
| DELETE | `/api/autores/{id}` | Exclui um autor |

### Categorias

| Método | Endpoint | Descrição |
|---|---|---|
| GET | `/api/categorias` | Lista todas as categorias |
| GET | `/api/categorias/{id}` | Consulta uma categoria |
| POST | `/api/categorias` | Cadastra uma categoria |
| PUT | `/api/categorias/{id}` | Atualiza uma categoria |
| DELETE | `/api/categorias/{id}` | Exclui uma categoria |

### Livros

| Método | Endpoint | Descrição |
|---|---|---|
| GET | `/api/livros` | Lista todos os livros |
| GET | `/api/livros/{id}` | Consulta um livro |
| POST | `/api/livros` | Cadastra um livro |
| PUT | `/api/livros/{id}` | Atualiza um livro |
| DELETE | `/api/livros/{id}` | Exclui um livro |

Ao consultar os livros, a API também retorna os dados relacionados ao autor e à categoria.

Exemplo de cadastro de livro:

```json
{
    "titulo": "Dom Casmurro",
    "isbn": "978-85-01-00002-8",
    "autor_id": 1,
    "categoria_id": 1
}
```

### Usuários

Os endpoints de usuários são protegidos por autenticação utilizando Laravel Sanctum.

| Método | Endpoint | Descrição |
|---|---|---|
| GET | `/api/usuarios` | Lista os usuários autenticados |
| GET | `/api/usuarios/{id}` | Consulta um usuário |
| POST | `/api/usuarios` | Cadastra um usuário |
| PUT | `/api/usuarios/{id}` | Atualiza um usuário |
| DELETE | `/api/usuarios/{id}` | Exclui um usuário |

### Login

Para autenticação, a API disponibiliza:

| Método | Endpoint | Descrição |
|---|---|---|
| POST | `/api/login` | Realiza o login e gera um token de acesso |

Exemplo:

```json
{
    "email": "usuario.teste@gmail.com",
    "senha": "123456"
}
```

O token retornado no login deve ser enviado nas requisições protegidas utilizando o cabeçalho:

```text
Authorization: Bearer SEU_TOKEN
```

## Banco de dados

O projeto utiliza banco de dados relacional.

No desenvolvimento local foi utilizado MySQL.

No ambiente de produção foi utilizado PostgreSQL através do serviço Neon.

A estrutura do banco é criada utilizando Laravel Migrations.

Principais entidades:

- autores
- categorias
- livros
- usuarios
- personal_access_tokens

A tabela `livros` possui relacionamentos com `autores` e `categorias`.

## Autenticação

A autenticação da API utiliza Laravel Sanctum.

As rotas de usuários são protegidas pelo middleware:

```text
auth:sanctum
```

Usuários não autenticados recebem uma resposta HTTP `401`.

## Testes

A API foi desenvolvida e testada utilizando Postman.

Foram realizados testes das operações:

- GET
- POST
- PUT
- DELETE
- Login
- Autenticação com Bearer Token
- Relacionamento entre livros, autores e categorias

## Como executar o projeto localmente

Clone o repositório:

```bash
git clone https://github.com/Amanda9825/biblioteca-api.git
```

Entre na pasta:

```bash
cd biblioteca-api
```

Instale as dependências:

```bash
composer install
```

Configure o arquivo `.env` com os dados do banco de dados.

Execute as migrations:

```bash
php artisan migrate
```

Inicie o servidor:

```bash
php artisan serve
```

A API ficará disponível localmente em:

```text
http://127.0.0.1:8000
```

## Deploy

A aplicação foi publicada utilizando Render.

O banco de dados de produção utiliza PostgreSQL hospedado no Neon.

URL pública:

https://biblioteca-api-wg3j.onrender.com

## Repositório

Código-fonte disponível no GitHub:

https://github.com/Amanda9825/biblioteca-api