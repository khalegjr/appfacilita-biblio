# AppFacilita - Biblio

## Sobre

Projeto teste para AppFacilita, desenvolvido em **Laravel 9**, com **PHP 8.2**,
**Pest** como ambiente de testes, **MySQL 8.0** e **Tailwindcss** como framework
CSS do frontend.


## Features

O frontend não foi finalizado, apenas uma parte foi feita para demonstração.

Nem todas as possibilidades de teste foram cobertas por falta de tempo.

Faltou setar um mutator para formatar atributos de data.

Seguindo o ciclo do TDD, e também por falta de tempo, não foram feitas melhorias
de código.

As features solicitadas:

- CRUD dos usuários da biblioteca;
- CRUD de livros;
- Classificação de livros por gênero
- Empréstimo de livro
- Alteração de status de livro e de empréstimos


Algumas decisões devido a limitações de escopo e tempo:

- Um empréstimo por livro (alterar para vários livros por empréstimo)
- Seta a data de empréstimo automaticamente com data da criação do empréstimo
- Adiciona 1 semana pra devolução


## Preparar Ambiente

Para rodar o projeto com **Docker** pode seguir os seguintes passos, após clonar e entrar na pasta do projeto:

- preparar ambiente **Docker**

```bash
cp .env.example .env

# alterar variáveis de ambiente, se desejar

docker-compose up -d --build

docker-compose exec laravel.test composer install

docker-compose down --remove-orphans
```


- Opcionalmente, se estiver em um ambiente _Linux_ ou _WSL2_, pode criar um atalho
no bash para facilitar o uso do pacote `sail` do **Laravel**:
```bash
alias sail="./vendor/bin/sail"
```


- A porta padrão do projeto é a `80`, para alterar basta adicionar a variável
`APP_PORT` no arquivo `.env` e setar a porta desejada. Após isso, para rodar a
aplicação:

```bash
sail up -d

sail npm install

sail artisan key:generate

sail artisan migrate --seed
```
