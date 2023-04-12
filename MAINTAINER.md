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

1. Alter table.
```bash
php artisan make:migration alter_table_tbl_cliente --table=tbl_cliente

```

2. Rename column.

```bash

php artisan make:migration rename_column_in_tbl_cliente --table=tbl_cliente

```

3. doctrine/dbal permite hacer cambios en los tipos de datos de en una columna existente con datos.

```bash
composer require doctrine/dbal

## crear archivo migracion para update.

php artisan make:migration update_property_in_tbl_alarmas
```

## Modelos 

Creacion de modelos con laravel.
```
php artisan make:model Categoria

php artisan make:model Alarma

php artisan make:model Producto 

php artisan make:model PedidoDetalle

php artisan make:model Pedido

php artisan make:model Cliente

php artisan make:model ClienteInteres

php artisan make:model ProductoCategoria 

php artisan make:model Rol

php artisan make:model Usuario
```

## Seeders

Referencia: https://www.youtube.com/watch?v=zNTF3U2Hsq0

```bash
## crear seeders expecifico
php artisan make:seeder CategorySeeder


## ejecutar seeders 

php artisan db:seed

## 
php artisan migrate:fresh --seed
```

## Rutas

```
php artisan route:list
```

## Middleware

Crear middleware JwtMiddleware.

```
php artisan make:middleware JwtMiddleware
```
## Controller

```
php artisan make:controller Auth/Auth
php artisan make:controller Auth/AuthController

```

## Request

```
php artisan make:request Auth/LoginRequest
```