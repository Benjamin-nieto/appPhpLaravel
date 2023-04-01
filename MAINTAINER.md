## NOTAS DE DESARROLLADOR.

Realizar /login
Realizar /consume con login y con token

usar .env para poner user password y secret


## Requerimients instalar JWT tymon

- https://jwt-auth.readthedocs.io/en/develop/laravel-installation/
``` 
composer require tymon/jwt-auth

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

php artisan make:controller AuthController
```

## Migraciones base de datos.


Para crear las migraciones usamos este ejemplo de guia. 
https://www.youtube.com/watch?v=xG-u2ffa04Y

generador de migraciones: https://laravelarticle.com/laravel-migration-generator-online

Commands:
```bash

php artisan make:migration create_tbl_alarmas_table 
php artisan make:migration create_tbl_categoria_table
php artisan make:migration create_tbl_cliente_table
php artisan make:migration create_tbl_cliente_interes_table
php artisan make:migration create_tbl_pedido_table
php artisan make:migration create_tbl_pedido_detalles_table
php artisan make:migration create_tbl_productos_table
php artisan make:migration create_tbl_productos_cat_table
php artisan make:migration create_tbl_roles_table 
php artisan make:migration create_tbl_usuarios_table


restaurar: php artisan migrate
borrar: php artisan migrate:rollback
restaurar: php artisan migrate:reset

```