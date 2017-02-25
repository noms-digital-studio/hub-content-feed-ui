# Ministry of Justice Content Platform Frontend

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

Build and run local:
----
```
npm install
gulp
composer install
composer run-script post-root-package-install
composer run-script post-create-project-cmd
php artisan serve
```
Application http://localhost:8000/

Environment variables required by the application
----
```
APP_URL - The transport, host, port and context path that the 'Hub Content Feed' Restful API service is running on. Default to http://localhost
```

```
APP_KEY - Encryption key required by Laravel. 
See https://devcenter.heroku.com/articles/getting-started-with-laravel#setting-a-laravel-encryption-key
```