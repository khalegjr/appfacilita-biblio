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


um empréstimo por livro, alterar para vários livros por empréstimo
migrar funções

seta a data de empréstimo automaticamente now
adiciona 1 semana pra devolução


## Preparar Ambiente

cp .env.example .env

alterar variáveis de ambiente, se desejar

docker-compose up -d --build

docker-compose exec laravel.test composer install

docker-compose down --remove-orphans

./vendor/bin/sail up -d

./vendor/bin/sail npm install

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan migrate --seed

http://localhost
Porta padrão 80
APP_PORT

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
