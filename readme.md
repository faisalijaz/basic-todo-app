
## About Laravel Basic Todo App

build a simple task list we can use to track all of the tasks we want to accomplish

- Task Management

## Getting Started

git clone  https://github.com/faisalijaz/basic-todo-app.git

### Prerequisites

- PHP 7.0 or higher
- LAMPP, XAMPP or MAMP
- Composer
- Laravel 5.8


### Installing

Copy git repo by 

```
git clone  https://github.com/faisalijaz/basic-todo-app.git
```

Configure your laravel app and create .env file after that run
```
composer install
```

In order to run migrations 
```
php artisan migrate
```

In order to create admin user run
`Email: testadmin@gmail.com`
`Password: 12345678`

```
php artisan db:seed
```


create virtual host or run app by
```
php artisan serve
```

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
