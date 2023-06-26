# Liberfly - Teste de API RESTfull

## Requisitos

- Docker: ^20.10.5
- docker-compose: ^1.25.0
- composer: ^2.0.9

## Como rodar localmente

### Iniciando o sistema

- `docker-compose build`

- `docker-compose up -d`

Após finalizado, importe as dependências:

- `composer run autoload-dump`

Rode as migrations

- `composer run migrations`

Crie alguns voos (são gerados 3 por vez)

- `composer run flights-generate`

Gere o token para gerar tokens

- `composer run jwt-generate`

### Acesso

Após alguns segundos a aplicação já está rodando em <http://localhost>

## Testes

Tive problemas com o banco nessa etapa e os testes não rodaram... :\

## Documentação

A documentação da api está disponível em <http://localhost/api/documentation>

## Etapas:

Para cada endpoint siga a doc, mas siga a sequencia de:

- Criar um usuário: (endpoint sem autenticação)

POST <http://localhost/api/user>

- Fazer a chamada para recuperar o Token e passar como Bearer para outras requisições (endpoint sem autenticação)

POST <http://localhost/api/login>

- Passe o token que recebeu na resposta anterior como header Authorization sendo do tipo Bearer e pode fazer as chamadas para

GET <http://localhost/api/flight>
GET <http://localhost/api/flight/{id}>