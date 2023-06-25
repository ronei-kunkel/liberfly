# Liberfly - Teste de API RESTfull

## Requisitos

- Docker: ^20.10.5
- docker-compose: ^1.25.0
- composer: ^2.0.9

## Como rodar localmente

### Iniciando o sistema

Nessa etapa, pode ser que o sistema demore alguns segundos para ser carregado após ser acessado, mas é por conta do composer que está verificando as dependências do projeto e as instalando caso necessário

- `docker-compose build`

Aqui demorará um tempo, pois é necessário buildar a imagem por conta da extensão pdo que precisa ser instalada para ser possível acessar o banco pela aplicação

- `docker-compose up -d`

Se quiser acompanhar o que o composer está fazendo e saber quando terminará a execução, ao invés de rodar o segundo comando, rode o comando a seguir:

- `docker-compose up -d && docker logs --tail=0 -f Liberfly-composer`

### Acesso

Após alguns segundos a aplicação já está rodando em <http://localhost>

## Testes

Para rodar os testes é necessário que o container esteja ativo, pois eles são executados dentro do próprio ambiente, para evitar que sejam executados com uma versão diferente da que o sistema está rodando de fato.

Para isso basta apneas estar na raíz do projeto e rodar o comando:

- `composer run tests`
