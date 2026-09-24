# Biblioteca API

API REST desenvolvida em Laravel para gerenciamento de uma biblioteca.

O projeto foi desenvolvido para a disciplina de Desenvolvimento Web III e disponibiliza operações de cadastro, consulta, atualização e exclusão para autores, categorias, livros e usuários.

## Tecnologias utilizadas

- PHP 8.4
- Laravel 13
- MySQL
- Laravel Sanctum
- REST API
- JSON
- Composer
- Postman
- Git
- GitHub

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