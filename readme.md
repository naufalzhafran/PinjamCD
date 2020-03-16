# PinjamCD API

RESTFul API for CD rental bussiness. It use lumen laravel framework and build with composer.

### Requirement
PHP >= 7.0
Mysql >= 5.6
Composer >= 1.10

## Run API
```bash
composer install
php artisan migrate // Migrate the database after setting the .env
php -S localhost:8000 -t public
```

## Documentation
To use the API, fill the .env file first with enviroment setting. Just use .env.example for reference.

### Authentication
This API has 2 role for the user, admin and normal user. To assign admin on the user, you must edit directly on the database.

Some API must use token to access it. You can get the token by login with email and password.


The complete API documentation is on this link :
[https://documenter.getpostman.com/view/8006078/SzS2yoxK?version=latest#authentication](https://documenter.getpostman.com/view/8006078/SzS2yoxK?version=latest#authentication)

