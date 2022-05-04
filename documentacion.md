# Proyecto FID: Formación, Investigación y Documentación
+ URL local:
+ URL prueba:
+ URL producción:
+ Figma: https://www.figma.com/proto/qAREYzpdkJtjdE262QOCwb/CDS?node-id=79%3A2&scaling=min-zoom&page-id=2%3A2&starting-point-node-id=79%3A2
+ Repositorio GitHub: https://github.com/alejandrosfr1223/fid_2022

## Consideraciones previas
+ https://rbwebme.com/instalar-laravel-en-windows-10
+ Instalar [Node.js](https://nodejs.org/es)
+ Instalar [XAMPP](https://www.apachefriends.org) o [Laragon](https://laragon.org)
+ Instalar [Composer](https://getcomposer.org/download)
+ Ejecutar en C:\xampp\htdocs:
    + $ composer global require "laravel/installer"


## Creación del proyecto Laravel - Jetstream
1. Crear proyecto **fid_2022**:
    + $ laravel new fid_2022 --jet
    + Seleccionar **livewire**.
    + No trabajaremos con equipos:
        - Will your application use teams? (yes/no) [no]: no
2. Instalar Node Package Manager y compilar sus dependencias:
    + $ npm install
    + $ npm run dev
3. Crear un dominio local: **fid_2022.test**.
    + [Guía de Coders Free para crear un dominio local](https://codersfree.com/blog/como-generar-un-dominio-local-en-windows-xampp)
4. Crear base de datos **fid_2022** en **MySQL** (Cotejamiento: **utf8_general_ci**).
5. Establecer juego de caracteres en base de datos en **config\database.php**:
    ```php
    ≡
    'mysql' => [
        ≡
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        ≡
    ],
    ≡
    ```
6. Hacer coincidir los parámetros de base de datos y de dominio del proyecto en **.env** en caso de ser necesario:
    ```env
    APP_NAME="FID"
    ≡
    APP_URL=http://fid_2022.test
    ≡
    DB_DATABASE=fid_2022
    ≡
    ```
7. Ejecutar migraciones:
    + $ php artisan migrate


## Creación del esqueleto del proyecto
1. Crear archivo de rutas **routes\admin.php** para administrar el módulo de administración (**admin**):
    ```php
    <?php

    use Illuminate\Support\Facades\Route;
    ```
2. Crear archivo de rutas **routes\formation.php** para administrar el módulo de formación (**formation**):
    ```php
    <?php

    use Illuminate\Support\Facades\Route;
    ``` 
3. Crear archivo de rutas **routes\investigation.php** para administrar el módulo de formación (**investigation**):
    ```php
    <?php

    use Illuminate\Support\Facades\Route;
    ``` 
4. Crear archivo de rutas **routes\documentation.php** para administrar el módulo de documentación (**documentation**):
    ```php
    <?php

    use Illuminate\Support\Facades\Route;
    ``` 
5. Crear archivo de rutas **routes\diffusion.php** para administrar el módulo de difusión (**diffusion**):
    ```php
    <?php

    use Illuminate\Support\Facades\Route;
    ```
6. Registrar los nuevos archivos de rutas en el provider **app\Providers\RouteServiceProvider.php**:
    ```php
    ≡
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web', 'auth')
                ->name('admin.')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->name('formation.')
                ->prefix('formation')
                ->group(base_path('routes/formation.php'));

            Route::middleware('web')
                ->name('investigation.')
                ->prefix('investigation')
                ->group(base_path('routes/investigation.php'));

            Route::middleware('web')
                ->name('documentation.')
                ->prefix('documentation')
                ->group(base_path('routes/documentation.php'));

            Route::middleware('web')
                ->name('diffusion.')
                ->prefix('diffusion')
                ->group(base_path('routes/diffusion.php'));
        });
    }
    ≡
    ```
7. Crear estructura los directorios del proyecto para las **vistas**:
    + resources\views\admin
    + resources\views\formation
    + resources\views\investigation
    + resources\views\documentation
    + resources\views\diffusion
8. Crear estructura los directorios del proyecto para los **modelos**:
    + app\Models\admin
    + app\Models\formation
    + app\Models\investigation
    + app\Models\documentation
    + app\Models\diffusion
9. Estructura los directorios del proyecto para los **controladores**:
    + app\Http\Controllers\admin
    + app\Http\Controllers\formation
    + app\Http\Controllers\investigation
    + app\Http\Controllers\documentation
    + app\Http\Controllers\diffusion


## Instalación de dependencias principales
+ [Laravel Permission](https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage)
+ [Laravel AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE)
+ [Plantilla AdminLTE](https://adminlte.io/themes/v3/index.html)
+ [Documentación Laravel Collective](https://laravelcollective.com/docs/6.x/html)
+ [Sweetalert2](https://sweetalert2.github.io)
+ [Bootstrap GitHub](https://github.com/twbs/bootstrap)
+ [Bootstrap npm](https://www.npmjs.com/package/bootstrap)
1. Instalación de **Laravel Permission** para la implementación de un sistema de roles y permisos:
    + $ composer require spatie/laravel-permission
    + Publicar las vistas de Laravel Permission:
        + $ php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    + Ejecutar las migraciones:
        + $ php artisan migrate
    + Implementar el trait **HasRoles** en el modelo **User**:
        ```php
        ≡
        use Spatie\Permission\Traits\HasRoles;

        class User extends Authenticatable
        {
            ≡
            use HasRoles;
            ≡
        }
        ```
2. Integración de plantilla **AdminLTE** para el panel administrativo:
	+ $ composer require jeroennoten/laravel-adminlte
    + $ php artisan adminlte:install
    + Publicar vista de AdminLTE:
        + $ php artisan adminlte:install --only=main_views
        + **Nota 1**: En **resources\views\vendor\adminlte\page.blade.php** es de donde se extienden las plantillas.
        + **Nota 2**: Modelo de uso de la plantilla AdminLTE:6. Diseñar vista inicial **resources\views\admin\index.blade.php**:
            ```php
            @extends('adminlte::page')

            @section('title', 'Sistemas de roles y permisos | Soluciones++')

            @section('content_header')
                <h1>Sistemas de roles y permisos</h1>
            @stop

            @section('content')
                <p>Sistemas de roles y permisos</p>
            @stop

            @section('css')
                {{-- ARCHIVOS CSS REQUERIDOS POR LA APLICACIÓN --}}
            @stop

            @section('js')
                {{-- ARCHIVOS JS REQUERIDOS POR LA APLICACIÓN --}}
            @stop
            ```
        + **Nota 3**: Crear vista para pruebas igual a la anterior con el nombre **resources\views\admin\layouts\test.blade.php**.
3. Instalar **Laravel Collective** para hacer formularios:
    + $ composer require laravelcollective/html
4. Instalar **Sweetalert2** para notificaciones:
    + $ php artisan adminlte:plugins install
    + Modificar en **config\adminlte.php**:
        ```php
        ≡
        'Sweetalert2' => [
            'active' => true,   /* Activamos para todas las vistas de la plantilla Sweetalert2 */
            'files' => [
                [
                    'type' 		=> 'js',
                    'asset' 	=> true,
                    'location' 	=> 'vendor/sweetalert2/sweetalert2.all.min.js',
                ],
            ],
        ],
        ≡
        ```
    + Agregamos la siguiente instrucción al archivo **resources\js\app.js**:
        ```js
        ≡
        window.Swal = require('sweetalert2');
        ```
    + $ npm install sweetalert2
	+ $ npm run dev
5. Instalar Bootstrap:
    + $ npm install bootstrap
7. Instalar Font Awesome:
    + $ npm i font-awesome


## Adaptación del proyecto al español
+ [Documentación Laravel Lang](https://github.com/laravel-lang/lang)
+ [Documentación Laravel-AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Translations)
1. Pasar AdminLTE a español:
    + $ php artisan adminlte:install --only=translations
2. Pasar Laravel a español:
    + $ composer require laravel-lang/lang --dev
3. Copiar directorio: **vendor\laravel-lang\lang\locales\es** y pegarlo en: **lang**.
    + **Nota**: realizar todas las traducciones en **lang\es\es.json**.
4. Configurar a español **config\app.php**:
    ```php
    ≡
    'locale' => 'es',
    ≡
    ```













## Comandos git comunes
1. Clonar repositorio:
    + $ git clone https://github.com/alejandrosfr1223/fid_2022
2. Realizar commit:
    + $ git add .
    + $ git commit -m "Creación del proyecto Laravel - Jetstream"
    + $ git push -u origin admin


## Comandos Git
+ Crear repositorio local:
    + $ git init
+ Agregar cambios al staging:
    + $ git add .
+ Realizar confirmación de los cambios (empaquetar los cambios):
    + $ git commit -m "Antes de iniciar"
+ Crear rama principal
    + $ git branch -M main
+ Enlazar repositorio Local con proyecto GitHub
    + $ git remote add origin https://github.com/petrix12/fid_2022.git
+ Sincronizar de Local a GitHub:
    + $ git push -u origin main
+ Sincronizar de GitHub a Local:
    + $ git pull --rebase origin
+ Configuración de email:
    + $ git config --global user.email "bazo.pedro@gmail.com"
+ Configuración del nombre de usuario:
    + $ git config --global user.name "Pedro Bazó"
+ Verificar los datos guardados de configuración:
    + $ git config --global -e  (muestra el resultado en el editor de texto predeterminado)
    + $ git config --global -l  (muestra el resultado en la misma terminal)
    + $ git config user.name    (muestra el nombre de usuario)
    + $ git config user.email   (muestra el eamil de usuario)
+ Listar la configuración inicial de Git:
    + $ git config --list
+ Verificar modificaciones en repositorio:
    + $ git status
+ Sacar un archivo del staging:
    + $ git reset HEAD archivo.txt
+ Regresar todo al commit anterior (se perderán todos los cambios): 
    + $ git checkout .
+ Ver todos los commits:
    + $ git log
    + $ git show
+ Volver a un commit determinado:
    + $ git checkout 0e26441c67500daa2b3cc16a101f8994e57c6dff
+ Crear una rama:
    + $ git branch nueva_rama
+ Ver en que rama estamos:
    + $ git branch
+ Cambiar de rama:
    + $ git branch otra_rama
+ Unir una rama con la principal:
    + $ git merge rama_a_unir
+ Eliminar una rama:
    + $ git branch -d rama_a_eliminar
+ Traer las actualizaciones desde GitHub:
    + git pull origin main


## Instrucciones básicas Laravel-permission
+ **Documentación**: https://spatie.be/docs/laravel-permission/v4/introduction
+ Crear un rol:
    + Role::create(['name' => 'admin']);
+ Asignar un rol a un usuario:
    + $user = User::find(1);
    + $user->assignRole('admin');
+ Crear un permiso:
    + Permission::create(['name' => 'universal']);
+ Asignar un permiso a un rol:
    + $role = Role::find(1);
    + $role->givePermissionTo('universal');
+ Asignar un permiso a un usuario:
    + $user = User::find(2);
    + $user->givePermissionTo('universal');
+ Revocar permiso a un usuario:
    + $user->revokePermissionTo('universal');
+ Revocar rol a un usuario:
    + $user->removeRole('writer');
+ Conocer si el usuario X tiene el rol “admin”:
    + $user->hasRole('admin');
+ Conocer si el usuario X tiene el permiso “universal”:
    + $user->hasPermissionTo("universal");
+ Lista de roles que posee el usuario X:
    + $user->getRoleNames();
+ Lista de permisos que posee el usuario X:
    + $user->getAllPermissions();




## Temporal


    ```php
    ≡
    ≡
    ```


