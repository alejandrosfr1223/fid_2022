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
3. Modificar template **resources\views\vendor\adminlte\page.blade.php** para incorporar los scripts de Livewire:
    ```php
    ≡
    @section('adminlte_css')
        ≡
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    @stop
    ≡
    @section('adminlte_js')
        ≡
        @livewireScripts
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @stop
    ```
    + **Nota**: pegar los estilos **adminlte.min.css** de [AdminLTE](00soportes\Plantillas\AdminLTE-3.2.0) en **public\css**.
4. Instalar **Laravel Collective** para hacer formularios:
    + $ composer require laravelcollective/html
5. Instalar **Sweetalert2** para notificaciones:
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


## Seeders para prueba de roles y permisos
1. Crear seeder para roles y usuarios: 
	+ $ php artisan make:seeder RoleSeeder
    + $ php artisan make:seeder UserSeeder
2. Modificar seeder **database\seeders\RoleSeeder.php**:
    ```php
    ≡
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;

    class RoleSeeder extends Seeder
    {
        ≡
        public function run()
        {
            // Roles
            $rolAdministrador = Role::create(['name' => 'Administrador']);
            $rolOperador = Role::create(['name' => 'Operador']);
            $rolCliente = Role::create(['name' => 'Cliente']);

            // Permisos CRUD users
            Permission::create(['name' => 'admin.crud.users.index'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.users.create'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.users.edit'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.users.destroy'])->syncRoles($rolAdministrador);

            // Permisos CRUD rols
            Permission::create(['name' => 'admin.crud.roles.index'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.roles.create'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.roles.edit'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.roles.destroy'])->syncRoles($rolAdministrador);

            // Permisos CRUD permissions
            Permission::create(['name' => 'admin.crud.permissions.index'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.permissions.create'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.permissions.edit'])->syncRoles($rolAdministrador);
            Permission::create(['name' => 'admin.crud.permissions.destroy'])->syncRoles($rolAdministrador);

            // Permisos CRUD books
            Permission::create(['name' => 'admin.crud.books.index'])->syncRoles($rolAdministrador, $rolOperador);
            Permission::create(['name' => 'admin.crud.books.create'])->syncRoles($rolAdministrador, $rolOperador);
            Permission::create(['name' => 'admin.crud.books.edit'])->syncRoles($rolAdministrador, $rolOperador);
            Permission::create(['name' => 'admin.crud.books.destroy'])->syncRoles($rolAdministrador);
        }
    }
    ```
4. Modificar seeder **database\seeders\UserSeeder.php**:
    ```php
    ≡
    use App\Models\User;

    class UserSeeder extends Seeder
    {
        ≡
        public function run()
        {
            User::create([
                'name' => 'Pedro Bazó',
                'email' => 'bazo.pedro@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => date('Y-m-d H:i:s')
            ])->assignRole('Administrador');

            User::create([
                'name' => 'Prueba Operador',
                'email' => 'operador@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => date('Y-m-d H:i:s')
            ])->assignRole('Operador');

            User::create([
                'name' => 'Prueba cliente',
                'email' => 'cliente@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => date('Y-m-d H:i:s')
            ])->assignRole('Cliente');

            User::create([
                'name' => 'Prueba Sin Rol',
                'email' => 'sinrol@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);

            User::factory(99)->create();
        }
    }
    ```
5. Modificar seeder **database\seeders\DatabaseSeeder.php**:
    ```php
    ≡
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
    ≡
    ```
6. Restablecer base de datos: 
	+ $ php artisan migrate:fresh --seed
	+ **Nota**: Para correr los seeder sin resetear la base de datos:
		+ $ php artisan db:seed


## Personalización inicial del proyecto
1. Modificar modelo **app\Models\User.php**:
    ```php
    ≡
    use Illuminate\Support\Facades\Auth;

    class User extends Authenticatable
    {
        ≡
        // Permite incorporar una imagen de usuario
        // Se debe configurar en config\adminlte.php: 'usermenu_image' => true,
        public function adminlte_image(){
            //return 'https://picsum.photos/300/300'; /* Retorna una imagen aleatoria*/
            return Auth::user()->profile_photo_url;
        }

        // Permite incorporar alguna descripción del usuario
        // Se debe configurar en config\adminlte.php: 'usermenu_desc' => ' => true,
        public function adminlte_desc(){
            return 'Aquí la información';
        }

        // Permite incorporar el perfil
        // Se debe configurar en config\adminlte.php: 'usermenu_profile_url' => true,
        public function adminlte_profile_url(){
            return 'user/profile';
        }
    }
    ```
2. Adaptar la configuración del archivo **config\adminlte.php** al proyecto:
    ```php
    ≡
    return [
        ≡

        'title_postfix' => '| FID',
        ≡
        'logo' => '<b>FID</b>',
        'logo_img' => 'img/logos/logo-fid.png',
        'logo_img_class' => 'brand-image img-circle elevation-3',
        'logo_img_xl' => null,
        'logo_img_xl_class' => 'brand-image-xs',
        'logo_img_alt' => 'FID',
        ≡
        'usermenu_enabled' => true,
        'usermenu_header' => false,
        'usermenu_header_class' => 'bg-primary',
        'usermenu_image' => false,
        'usermenu_desc' => true,
        'usermenu_profile_url' => true,
        ≡
        'layout_fixed_sidebar' => true,
        'layout_fixed_navbar' => true,
        ≡
        'use_route_url' => false,
        'dashboard_url' => '/',
        'logout_url' => 'logout',
        'login_url' => 'login',
        'register_url' => 'register',
        'password_reset_url' => 'reset-password',
        'password_email_url' => '' /* 'password/email' */,
        'profile_url' => false,
        ≡
        'menu' => [
            // Navbar items:
            [
                'type'         => 'fullscreen-widget',
                'topnav_right' => true,
            ],

            /* Administración de usuarios */
            [
                'header' => 'ADMINISTRAR USUARIOS',
                'can'  => 'admin.crud.users.index',
            ],
            [
                'text' => 'Usuarios',
                'url'  => 'admin/users',
                'icon' => 'fas fa-fw fa-users',
                'can'  => 'admin.crud.users.index',
            ],
            [
                'text' => 'Roles',
                'url'  => 'admin/roles',
                'icon' => 'fas fa-fw fa-user-tag',
                'can'  => 'admin.crud.roles.index',
            ],
            [
                'text' => 'Permisos',
                'url'  => 'admin/permissions',
                'icon' => 'fas fa-fw fa-universal-access',
                'can'  => 'admin.crud.permissions.index',
            ],

            /* Administración de tablas */
            ['header' => 'ADMINISTRAR TABLAS'],
        ],
        ≡
    ]
    ```
    + **Iconos**: https://fontawesome.com/icons
	+ **Tutorial**: https://www.youtube.com/playlist?list=PLZ2ovOgdI-kWTCkbH749Ukvq7FMz5ahpP
3. Solicitar logos de la empresa en distintos formatos y ubicarlos en:
	+ public\favicon.ico
	+ public\img\logos\logo-fid.png
4. Ajustar la configuración de Jetstream en **config\jetstream.php**:
    ```php
    ≡
    'features' => [
        // Features::termsAndPrivacyPolicy(),
        Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],
    ≡
    ```
5. Crear un acceso directo (simbolic link) a **storage**:
    + $ php artisan storage:link
6. Agregar ruta raíz admin en **routes\admin.php**:
    ```php
    ≡
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use Spatie\Permission\Traits\HasRoles;

    Route::get('/', function () {
        if(Auth::user()->hasRole('Administrador')){
            return view('admin.crud.users.index');
        }else{
            if(Auth::user()->hasRole('Operador')){
                return view('admin.crud.books.index');
            } else {
                return view('dashboard');
            }
        }
    });
    ```

## Rutas para el mantenimiento de la aplicación
1. Crear controlador Maintenance:
	+ $ php artisan make:controller admin/MaintenanceController
2. Programar controlador **app\Http\Controllers\admin\MaintenanceController.php**:
    ```php
    ≡
    use Illuminate\Support\Facades\Artisan;
    use RealRashid\SweetAlert\Facades\Alert;

    class MaintenanceController extends Controller
    {
        public function index(){
            return view('admin.pages.maintenance');
        }

        public function key_generate(){
            Artisan::call('key:generate');
            Alert::success('!Una nueva llave para la aplicación se generó exitosamente!');
            return view('admin.pages.maintenance');
        }

        public function storage_link(){
            Artisan::call('storage:link');
            Alert::success('!El enlace directo a storage se generó exitosamente!');
            return view('admin.pages.maintenance');
        }

        public function cache_clear(){
            Artisan::call('cache:clear');
            Alert::success('!El caché de la aplicación se limpió exitosamente!');
            return view('admin.pages.maintenance');
        }

        public function config_cache(){
            Artisan::call('config:cache');
            Alert::success('!La caché de la configuración de la aplicación se limpió exitosamente!');
            return view('admin.pages.maintenance');
        }

        public function route_clear(){
            Artisan::call('route:clear');
            Alert::success('!Las rutas de la aplicación se limpiaron exitosamente!');
            return view('admin.pages.maintenance');
        }

        public function config_clear(){
            Artisan::call('config:clear');
            Alert::success('!La configuración de la aplicación se limpió exitosamente!');
            return view('admin.pages.maintenance');
        }

        public function view_clear(){
            Artisan::call('view:clear');
            Alert::success('!Las vistas de la aplicación se limpiaron exitosamente!');
            return view('admin.pages.maintenance');
        }

        public function migrate_fresh(){
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');
            Alert::success('!La base de datos se reestableció exitosamente!');
            return view('admin.pages.maintenance');
        }
    }
    ```
3. Crear grupo de rutas de mantenimiento en **routes\admin.php**:
    ```php
    ≡
    use App\Http\Controllers\admin\MaintenanceController;
    ≡
    // Grupo de rutas para realizar mantenimiento a la aplicación
    Route::group(['middleware' => ['auth', 'can:admin.crud.users.index'], 'as' => 'maintenance.'], function(){
        // Página principal
        Route::get('maintenance', [MaintenanceController::class, 'index']);
        // Generar llave: $ php artisan key:generate
        Route::get('key-generate', [MaintenanceController::class, 'key_generate'])->name('key-generate');
        // Enlace directo a storage: $ php artisan storage:link
        Route::get('storage-link', [MaintenanceController::class, 'storage_link'])->name('storage-link');
        // Limpiar caché: $ php artisan cache:clear
        Route::get('cache-clear', [MaintenanceController::class, 'cache_clear'])->name('cache-clear');
        // Limpiar caché de la configuración: $ php artisan config:cache
        Route::get('config-cache', [MaintenanceController::class, 'config_cache'])->name('config-cache');
        // Limpiar rutas: $ php artisan route:clear
        Route::get('route-clear', [MaintenanceController::class, 'route_clear'])->name('route-clear');
        // Limpiar configuración: $ php artisan config:clear
        Route::get('config-clear', [MaintenanceController::class, 'config_clear'])->name('config-clear');
        // Limpiar vistas: $ php artisan view:clear
        Route::get('view-clear', [MaintenanceController::class, 'view_clear'])->name('view-clear');
        // Reestablecer base de datos: $ php artisan migrate:fresh --seed
        Route::get('migrate-fresh', [MaintenanceController::class, 'migrate_fresh'])->name('migrate-fresh');
    });
    ```
4. Agregar menú para herramientas adminisitrativas en **config\adminlte.php**:
    ```php
    ≡
    'menu' => [
        ≡
        [
            'header' => 'HERRAMIENTAS ADMIN.',
            'can'  => 'admin.crud.users.index',
        ],
        [
            'text' => 'Mtto. app.',
            'url'  => 'admin/maintenance',
            'icon' => 'fas fa-fw fa-briefcase-medical',
            'can'  => 'admin.crud.users.index',
        ],
    ],
    ≡
    ```
5. Crear vista **resources\views\admin\pages\maintenance.blade.php**:
    ```php
    @extends('adminlte::page')

    @section('title', 'Mantenimiento de la aplicación')

    @section('content_header')

    @stop

    @section('content')
    <div class="p-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Mantenimiento de la aplicación</h3>
            </div>
            <div class="card-body m-2">
                <div class="row p-0 m-0">
                    <p style="color:red">
                        <strong>Nota: </strong>
                        El uso indebido de estos comandos puede causar fallas en la aplicación.
                    </p>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.key-generate') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">Key generate</button>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.storage-link') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">Storage Link</button>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.cache-clear') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">Cache clear</button>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.config-cache') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">Config cache</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.route-clear') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">Route clear</button>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.config-clear') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">Config clear</button>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.view-clear') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">View clear</button>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                        <form action="{{ route('admin.maintenance.migrate-fresh') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning w-60">Migrate fresh seed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('css')
    @stop

    @section('js')
    @stop
    ≡
    ```


## CRUD Users
1. Crear controlador User con todos sus recursos:
	+ $ php artisan make:controller admin/UserController -r
2. Programar controlador **app\Http\Controllers\admin\UserController.php**:
    ```php
    ≡
    use App\Models\User;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Traits\HasRoles;
    use RealRashid\SweetAlert\Facades\Alert;

    class UserController extends Controller
    {
        ≡
        public function index()
        {
            return view('admin.crud.users.index');
        }
        ≡
        public function create()
        {
            $roles = Role::all();
            $user = new User();
            $origen = 'create';
            return view('admin.crud.users.create', compact('roles', 'user', 'origen'));
        }
        ≡
        public function store(Request $request)
        {
            // Validación
            $request->validate([
                'name' => 'required|max:254',
                'password' => 'min:5',
                'email' => 'required|unique:users,email'
            ]);

            // Creando usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                // Comentar esta asignación cuando se decida activar la verificación de usuario
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);

            // Asignando roles seleccionados
            $roles = Role::all();
            foreach($roles as $role){
                if($request->input("role" . $role->id)){
                    $user->assignRole($role->name);
                }
            }

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha creado el usuario: ' . $request->name);

            // Redireccionar a la vista index
            return redirect()->route('admin.users.index');
        }
        ≡
        public function show(User $user)
        {
            $roles = Role::all();
            $permissions = Permission::all();
            $origen = 'show';
            return view('admin.crud.users.edit', compact('user', 'roles', 'permissions', 'origen'));
        }
        ≡
        public function edit(User $user)
        {
            $roles = Role::all();
            $permissions = Permission::all();
            $origen = 'edit';
            return view('admin.crud.users.edit', compact('user', 'roles', 'permissions', 'origen'));
        }
        ≡
        public function update(Request $request, User $user)
        {
            // Validación
            if($request->password){
                $request->validate([
                    'name' => 'required|max:254',
                    'password' => 'min:5',
                    'email' => 'email|required|unique:users,email,'.$user->id
                ]);
                $user->password = bcrypt($request->password);
            } else {
                $request->validate([
                    'name' => 'required|max:254',
                    'email' => 'email|required|unique:users,email,'.$user->id
                ]);
            }

            // Actualizando usuario
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            // Actualizando los roles del usuario
            $roles = Role::all();
            foreach($roles as $role){
                if($request->input("role" . $role->id)){
                    $user->assignRole($role->name);
                }else {
                    $user->removeRole($role->name);
                }
            }

            // Actualizando los permisos del usuario
            $permissions = Permission::all();
            foreach($permissions as $permission){
                if($request->input("permiso" . $permission->id)){
                    $user->givePermissionTo($permission->name);
                }else {
                    $user->revokePermissionTo($permission->name);
                }
            }

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha actualizado el usuario: ' . $request->name);

            // Redireccionar a la vista index
            return redirect()->route('admin.users.index');
        }
        ≡
        public function destroy(User $user)
        {
            $nombre = $user->name;
            $user->delete();
            Alert::info('¡Advertencia!', 'Se ha eliminado el usuario: ' . $nombre);
            return redirect()->route('admin.users.index');
        }
    }
    ```
3. Agregar el juego de rutas users en **routes\admin.php**:
    ```php
    ≡
    use App\Http\Controllers\admin\UserController;
    ≡
    Route::resource('users', UserController::class)->names('users')
        ->middleware('can:admin.crud.users.index');
    ```
4. Crear componente Livewire para el modelo User: 
	+ $ php artisan make:livewire admin/users-table
5. Programar controlador Livewire asociado al modelo Rols en **app\Http\Livewire\Admin\UsersTable.php**:
    ```php
    <?php

    namespace App\Http\Livewire\Admin;

    use App\Models\User;
    use Livewire\Component;
    use Livewire\WithPagination;

    class UsersTable extends Component
    {

        use WithPagination;

        protected $queryString = [
            'search' => ['except' => ''],
            'perPage' => ['except' => '15']
        ];

        public $search = '';
        public $perPage = '15';

        public function render()
        {
            $users = User::where('name','LIKE',"%$this->search%")
                ->orWhere('email','LIKE',"%$this->search%")
                ->orderBy('updated_at','DESC')
                ->paginate($this->perPage);
            return view('livewire.admin.users-table', compact('users'));
        }

        public function clear(){
            $this->search = '';
            $this->page = 1;
            $this->perPage = '15';
        }

        public function limpiar_page(){
            $this->reset('page');
        }
    }
    ```
6. Diseñar vista para la tabla Users en **resources\views\livewire\admin\crud\users-table.blade.php**:
    ```php
    <div>
        <div class="p-4">
            <div class="card">
                <div class="card-header">
                    <div class="row m-2">
                        <h2 class="card-title flex-1"><strong>Lista de usuarios</strong></h2>
                        <div class="card-tools flex-1">
                            <div class="input-group input-group-sm">
                                <input wire:model="search" type="text" class="form-control float-right" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-sm mx-3 flex" style="width: 140px">
                            <select wire:model="perPage" class="form-control float-right">
                                <option value="5">5 por pág. </option>
                                <option value="10">10 por pág.</option>
                                <option value="15">15 por pág.</option>
                                <option value="25">25 por pág.</option>
                                <option value="50">50 por pág.</option>
                                <option value="100">100 por pág.</option>
                            </select>
                            @if ($search !== '')
                            <div class="input-group-sm flex">
                                <button wire:click="clear" class="btn btn-secondary form-control float-right"><i class="far fa-window-close"></i></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @can('admin.crud.users.create')
                    <a href="{{ route('admin.users.create') }}" class="btn btn-secondary m-4">
                        Añadir usuario
                    </a>
                @endcan

                <div class="card-body table-responsive p-0">
                    @if ($users->count())
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Foto</th> {{-- ID --}}
                                <th>Nombre</th>
                                <th>e-mail</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                @can('admin.crud.users.edit')
                                <th class="text-center">Editar</th>
                                @endcan
                                @can('admin.crud.users.destroy')
                                <th class="text-center">Eliminar</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td title="{{ $user->id }}">
                                    <img
                                        src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                        onerror="this.onerror=null; this.src='/img/person.png'"
                                        alt="{{ 'Imagen de ' . $user->name }}"
                                        class="img-circle img-size-32 mr-2"
                                    >
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                @can('admin.crud.users.edit')
                                <td class="text-center">
                                    <a href="{{ route('admin.users.edit', $user) }}" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>
                                @endcan
                                @can('admin.crud.users.destroy')
                                <td class="text-center">
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            type="submit"
                                            title="Eliminar"
                                            style="color: red"
                                            onclick="return confirm('¿Está seguro que desea eliminar a este usuario?')"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-4">
                        {{ $users->links() }}
                    </div>
                    @else
                        <div class="m-4">
                            <p>No hay resultado para la búsqueda: <strong>{{ $search }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    ```
7. Diseñar las vistas para el CRUD Users:
    + resources\views\admin\crud\users\index.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Lista de usuarios')

        @section('content_header')

        @stop

        @section('content')
            @livewire('admin.users-table')
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\users\\_form.blade.php:
        ```php
        <div class="card-body m-4">
            <div class="row">
                <div class="col-sm-12 col-md-2 p-3">
                    <img
                        src="{{ asset('storage/' . $user->profile_photo_path) }}"
                        onerror="this.onerror=null; this.src='/img/person.png'"
                        alt="{{ 'Imagen de ' . $user->name }}"
                        class="img-circle"
                        width="150px"
                        class="mt-5"
                    >
                </div>
                <div class="col-sm-12 col-md-10 mb-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="name">Nombre del usuario</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Introduzca el nombre del usuario"
                                    value="{{ old('name', $user->name) }}"
                                >
                            </div>
                            @error('name')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Introduzca el e-mail del usuario"
                                    value="{{ old('email', $user->email) }}"
                                >
                            </div>
                            @error('email')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                @if($origen == 'edit')
                                <label for="name">Reasignar password</label>
                                @else
                                <label for="name">Asignar password</label>
                                @endif
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="Introduzca el password del usuario"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mb-0">
                    <div class="form-check">
                        <p><label>Roles del usuario</label></p>
                        <div class="m-4">
                            <div class="row">
                                @foreach ($roles as $role)
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    @if($origen == 'edit')
                                        @if ($user->hasRole($role->name))
                                        <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input" checked>
                                        @else
                                        <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                                        @endif
                                    @else
                                        <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                                    @endif
                                    <label for="{{ "role" . $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        @if($origen == 'edit')
                        <p><label>Permisos del usuario</label></p>
                        <div class="m-4">
                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    @if ($user->hasPermissionTo($permission->name))
                                    <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input" checked>
                                    @else
                                    <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input">
                                    @endif
                                    <label for="{{ "permiso" . $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        ```
    + resources\views\admin\crud\users\create.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Crear Usuario')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary">
                <div class="card-header m-4">
                    <h3 class="card-title">Crear usuario</h3>
                </div>
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    @include('admin.crud.users._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Crear usuario</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\users\edit.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Editar Usuario')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary m-2">
                <div class="card-header m-4">
                    <h3 class="card-title">Editar usuario</h3>
                </div>
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('put')

                    @include('admin.crud.users._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Actualizar usuario</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```


## CRUD Roles
1. Crear el modelo Rol:
    + $ php artisan make:model admin/Role
2. Establecer asignación masiva al modelo **app\Models\admin\Role.php**:
    ```php
    ≡
    class Role extends Model
    {
        ≡  
        protected $fillable = [
            'name',
        ];
    }
    ```
3. Crear controlador Role con todos sus recursos:
	+ $ php artisan make:controller admin/RoleController -r
4. Programar controlador **app\Http\Controllers\admin\RoleController.php**:
    ```php
    ≡
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Traits\HasRoles;
    use RealRashid\SweetAlert\Facades\Alert;

    class RoleController extends Controller
    {
        ≡
        public function index()
        {
            return view('admin.crud.roles.index');
        }
        ≡
        public function create()
        {
            $permissions = Permission::all();
            $role = new Role();
            $origen = 'create';
            return view('admin.crud.roles.create', compact('permissions', 'role', 'origen'));
        }
        ≡
        public function store(Request $request)
        {
            // Validación
            $request->validate([
                'name' => 'required|max:254|unique:roles,name'
            ]);

            // almacenando rol
            $role = Role::create(['name' => $request->name]);

            // Asignando permisos seleccionados al rol
            $permissions = Permission::all();
            foreach($permissions as $permission){
                if($request->input("permiso" . $permission->id)){
                    $role->givePermissionTo($permission->name);
                }
            }

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha creado el rol: ' . $request->name);

            // Redireccionar a la vista index
            return redirect()->route('admin.roles.index');
        }
        ≡
        public function show(Role $role)
        {
            $permissions = permission::all();
            $origen = 'show';
            return view('admin.crud.roles.edit', compact('role', 'permissions', 'origen'));
        }
        ≡
        public function edit(Role $role)
        {
            $permissions = permission::all();
            $origen = 'edit';
            return view('admin.crud.roles.edit', compact('role', 'permissions', 'origen'));
        }
        ≡
        public function update(Request $request, Role $role)
        {
            // Validación
            $request->validate([
                'name' => 'required|max:254|unique:roles,name,'.$role->name.',name'
            ]);

            // actualizando rol
            $role->name = $request->name;
            $role->save();

            // Actualizando permisos seleccionados al rol
            $permissions = Permission::all();
            foreach($permissions as $permission){
                if($request->input("permiso" . $permission->id)){
                    $role->givePermissionTo($permission->name);
                }else {
                    $role->revokePermissionTo($permission->name);
                }
            }

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha actualizado el rol a : ' . $request->name);

            // Redireccionar a la vista index
            return redirect()->route('admin.roles.index');
        }
        ≡
        public function destroy(Role $role)
        {
            $nombre = $role->name;
            $role->delete();
            Alert::info('¡Advertencia!', 'Se ha eliminado el rol: ' . $nombre);
            return redirect()->route('admin.roles.index');
        }
    }
    ```
5. Agregar el juego de rutas permissions en **routes\admin.php**:
    ```php
    ≡
    use App\Http\Controllers\admin\RoleController;
    ≡
    Route::resource('roles', RoleController::class)->names('roles')
        ->middleware('can:admin.crud.roles.index');
    ```
6. Crear componente Livewire para el modelo Role: 
	+ $ php artisan make:livewire admin/roles-table
7. Programar controlador Livewire asociado al modelo Roles en **app\Http\Livewire\Admin\RolesTable.php**:
    ```php
    <?php

    namespace App\Http\Livewire\Admin;

    use App\Models\admin\Role;
    use Livewire\Component;
    use Livewire\WithPagination;

    class RolesTable extends Component
    {
        use WithPagination;

        protected $queryString = [
            'search' => ['except' => ''],
            'perPage' => ['except' => '15']
        ];

        public $search = '';
        public $perPage = '15';

        public function render()
        {
            $roles = Role::where('name','LIKE',"%$this->search%")
                ->orderBy('updated_at','DESC')
                ->paginate($this->perPage);
            return view('livewire.admin.roles-table', compact('roles'));
        }

        public function clear(){
            $this->search = '';
            $this->page = 1;
            $this->perPage = '15';
        }

        public function limpiar_page(){
            $this->reset('page');
        }
    }
    ```
8. Diseñar vista para la tabla Roles en **resources\views\livewire\admin\crud\roles-table.blade.php**:
    ```php
    <div>
        <div class="p-4">
            <div class="card">
                <div class="card-header">
                    <div class="row m-2">
                        <h2 class="card-title flex-1"><strong>Roles de usuarios</strong></h2>
                        <div class="card-tools flex-1">
                            <div class="input-group input-group-sm">
                                <input wire:model="search" type="text" class="form-control float-right" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-sm mx-3 flex" style="width: 140px">
                            <select wire:model="perPage" class="form-control float-right">
                                <option value="5">5 por pág. </option>
                                <option value="10">10 por pág.</option>
                                <option value="15">15 por pág.</option>
                                <option value="25">25 por pág.</option>
                                <option value="50">50 por pág.</option>
                                <option value="100">100 por pág.</option>
                            </select>
                            @if ($search !== '')
                            <div class="input-group-sm flex">
                                <button wire:click="clear" class="btn btn-secondary form-control float-right"><i class="far fa-window-close"></i></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @can('admin.crud.roles.create')
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-secondary m-4">
                        Añadir rol
                    </a>
                @endcan

                <div class="card-body table-responsive p-0">
                    @if ($roles->count())
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Guard</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                @can('admin.crud.roles.edit')
                                <th class="text-center">Editar</th>
                                @endcan
                                @can('admin.crud.roles.destroy')
                                <th class="text-center">Eliminar</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>{{ $role->updated_at }}</td>
                                @can('admin.crud.roles.edit')
                                <td class="text-center">
                                    <a href="{{ route('admin.roles.edit', $role) }}" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>
                                @endcan
                                @can('admin.crud.roles.destroy')
                                <td class="text-center">
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            type="submit"
                                            title="Eliminar"
                                            style="color: red"
                                            onclick="return confirm('¿Está seguro que desea eliminar el rol?')"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-4">
                        {{ $roles->links() }}
                    </div>
                    @else
                        <div class="m-4">
                            <p>No hay resultado para la búsqueda: <strong>{{ $search }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    ```
9. Diseñar las vistas para el CRUD Roles:
    + resources\views\admin\crud\roles\index.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Roles de usuarios')

        @section('content_header')

        @stop

        @section('content')
            @livewire('admin.roles-table')
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\roles\\_form.blade.php:
        ```php
        <div class="card-body m-4">
            <div class="form-group">
                <label for="name">Nombre del rol</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="Introduzca el nombre del rol"
                    value="{{ old('name', $role->name) }}"
                >
            </div>
            @error('name')
                <div class="col-span-12 sm:col-span-12">
                    <small style="color:red">*{{ $message }}*</small>
                </div>
            @enderror
            <div class="form-check">
                <p><label>Permisos a asignarle el rol</label></p>
                <div class="m-4">
                    <div class="row">
                        @foreach ($permissions as $permission)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            @if($origen == 'edit')
                                @if ($role->hasPermissionTo($permission->name))
                                <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input" checked>
                                @else
                                <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input">
                                @endif
                            @else
                                <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input">
                            @endif
                            <label for="{{ "permiso" . $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        ```
    + resources\views\admin\crud\roles\create.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Crear Rol')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary">
                <div class="card-header m-4">
                    <h3 class="card-title">Crear rol</h3>
                </div>
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf

                    @include('admin.crud.roles._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Crear rol</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\roles\edit.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Editar Rol')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary m-2">
                <div class="card-header m-4">
                    <h3 class="card-title">Editar rol</h3>
                </div>
                <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                    @csrf
                    @method('put')

                    @include('admin.crud.roles._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Actualizar rol</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```


## CRUD Permisos
1. Crear el modelo Permission:
    + $ php artisan make:model admin/Permission
2. Establecer asignación masiva al modelo **app\Models\admin\Permission.php**:
    ```php
    ≡
    class Permission extends Model
    {
        ≡  
        protected $fillable = [
            'name',
        ];
    }
    ```
3. Crear controlador Permission con todos sus recursos:
	+ $ php artisan make:controller admin/PermissionController -r
4. Programar controlador **app\Http\Controllers\admin\PermissionController.php**:
    ```php
    ≡
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Traits\HasRoles;
    use RealRashid\SweetAlert\Facades\Alert;

    class PermissionController extends Controller
    {
        ≡
        public function index()
        {
            return view('admin.crud.permissions.index');
        }
        ≡
        public function create()
        {
            $permission = new Permission();
            $roles = Role::all();
            $origen = 'create';
            return view('admin.crud.permissions.create', compact('roles', 'permission', 'origen'));
        }
        ≡
        public function store(Request $request)
        {
            // Validación
            $request->validate([
                'name' => 'required|unique:permissions,name|max:254'
            ]);

            // Creando permiso
            $permission = Permission::create(['name' => $request->name]);

            // Asignando permisos a roles seleccionados
            $roles = Role::all();
            foreach($roles as $role){
                if($request->input("role" . $role->id)){
                    $roles->find($role->id)->givePermissionTo($permission);
                }
            }

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha creado el permiso: ' . $request->name);

            // Redireccionar a la vista index
            return redirect()->route('admin.permissions.index');
        }
        ≡
        public function show(Permission $permission)
        {
            $roles = Role::all();
            $origen = 'show';
            return view('admin.crud.permissions.edit', compact('permission', 'roles', 'origen'));
        }
        ≡
        public function edit(Permission $permission)
        {
            $roles = Role::all();
            $origen = 'edit';
            return view('admin.crud.permissions.edit', compact('permission', 'roles', 'origen'));
        }
        ≡
        public function update(Request $request, Permission $permission)
        {
            // Validación
            $request->validate([
                'name' => 'required|max:254|unique:permissions,name,'.$permission->name.',name'
            ]);

            // actualizando permiso
            $permission->name = $request->name;
            $permission->save();

            // Actualizando permisos a roles seleccionados
            $roles = Role::all();
            foreach($roles as $role){
                if($request->input("role" . $role->id)){
                    $roles->find($role->id)->givePermissionTo($permission);
                }else {
                    $roles->find($role->id)->revokePermissionTo($permission);
                }
            }

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha actualizado el permiso a: ' . $request->name);

            // Redireccionar a la vista index
            return redirect()->route('admin.permissions.index');
        }
        ≡
        public function destroy(Permission $permission)
        {
            $nombre = $permission->name;
            $permission->delete();
            Alert::info('¡Advertencia!', 'Se ha eliminado el permiso: ' . $nombre);
            return redirect()->route('admin.permissions.index');
        }
    }
    ```
5. Agregar el juego de rutas permissions en **routes\admin.php**:
    ```php
    ≡
    use App\Http\Controllers\admin\PermissionController;
    ≡
    Route::resource('permissions', PermissionController::class)->names('permissions')
        ->middleware('can:admin.crud.permissions.index');
    ```
6. Crear componente Livewire para el modelo Permission: 
	+ $ php artisan make:livewire admin/permissions-table
7. Programar controlador Livewire asociado al modelo Permission en **app\Http\Livewire\Admin\PermissionsTable.php**:
    ```php
    <?php

    namespace App\Http\Livewire\Admin;

    use App\Models\admin\Permission;
    use Livewire\Component;
    use Livewire\WithPagination;

    class PermissionsTable extends Component
    {
        use WithPagination;

        protected $queryString = [
            'search' => ['except' => ''],
            'perPage' => ['except' => '15']
        ];

        public $search = '';
        public $perPage = '15';

        public function render()
        {
            $permissions = Permission::where('name','LIKE',"%$this->search%")
                ->orderBy('updated_at','DESC')
                ->paginate($this->perPage);
            return view('livewire.admin.permissions-table', compact('permissions'));
        }

        public function clear(){
            $this->search = '';
            $this->page = 1;
            $this->perPage = '15';
        }

        public function limpiar_page(){
            $this->reset('page');
        }
    }
    ```
8. Diseñar vista para la tabla Permissions en **resources\views\livewire\admin\crud\permissions-table.blade.php**:
    ```php
    <div>
        <div class="p-4">
            <div class="card">
                <div class="card-header">
                    <div class="row m-2">
                        <h2 class="card-title flex-1"><strong>Permisos de usuarios</strong></h2>
                        <div class="card-tools flex-1">
                            <div class="input-group input-group-sm">
                                <input wire:model="search" type="text" class="form-control float-right" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-sm mx-3 flex" style="width: 140px">
                            <select wire:model="perPage" class="form-control float-right">
                                <option value="5">5 por pág. </option>
                                <option value="10">10 por pág.</option>
                                <option value="15">15 por pág.</option>
                                <option value="25">25 por pág.</option>
                                <option value="50">50 por pág.</option>
                                <option value="100">100 por pág.</option>
                            </select>
                            @if ($search !== '')
                            <div class="input-group-sm flex">
                                <button wire:click="clear" class="btn btn-secondary form-control float-right"><i class="far fa-window-close"></i></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @can('admin.crud.permissions.create')
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-secondary m-4">
                        Añadir permiso
                    </a>
                @endcan

                <div class="card-body table-responsive p-0">
                    @if ($permissions->count())
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Guard</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                @can('admin.crud.permissions.edit')
                                <th class="text-center">Editar</th>
                                @endcan
                                @can('admin.crud.permissions.destroy')
                                <th class="text-center">Eliminar</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>{{ $permission->updated_at }}</td>
                                @can('admin.crud.permissions.edit')
                                <td class="text-center">
                                    <a href="{{ route('admin.permissions.edit', $permission) }}" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>
                                @endcan
                                @can('admin.crud.permissions.destroy')
                                <td class="text-center">
                                    <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            type="submit"
                                            title="Eliminar"
                                            style="color: red"
                                            onclick="return confirm('¿Está seguro que desea eliminar el permiso?')"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-4">
                        {{ $permissions->links() }}
                    </div>
                    @else
                        <div class="m-4">
                            <p>No hay resultado para la búsqueda: <strong>{{ $search }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    ```
9. Diseñar las vistas para el CRUD Permisos:
    + resources\views\admin\crud\permissions\index.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Permisos de usuarios')

        @section('content_header')

        @stop

        @section('content')
            @livewire('admin.permissions-table')
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\permissions\\_form.blade.php:
        ```php
        <div class="card-body m-4">
            <div class="form-group">
                <label for="name">Nombre del permiso</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="Introduzca el nombre del permiso"
                    value="{{ old('name', $permission->name) }}"
                >
            </div>
            @error('name')
                <div class="col-span-12 sm:col-span-12">
                    <small style="color:red">*{{ $message }}*</small>
                </div>
            @enderror
            <div class="form-check">
                <p><label>Roles a asignarle el permiso</label></p>
                <div class="m-4">
                    <div class="row">
                        @foreach ($roles as $role)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            @if($origen == 'edit')
                                @if ($role->hasPermissionTo($permission->name))
                                <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input" checked>
                                @else
                                <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                                @endif
                            @else
                                <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                            @endif
                            <label for="{{ "role" . $role->id }}" class="form-check-label">{{ $role->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        ```
    + resources\views\admin\crud\permissions\create.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Crear Permiso')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary">
                <div class="card-header m-4">
                    <h3 class="card-title">Crear permiso</h3>
                </div>
                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf

                    @include('admin.crud.permissions._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Crear permiso</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\permissions\edit.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Editar Permiso')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary">
                <div class="card-header m-4">
                    <h3 class="card-title">Editar permiso</h3>
                </div>
                <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
                    @csrf
                    @method('put')

                    @include('admin.crud.permissions._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Actualizar permiso</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```


## CRUD Books
1. Crear el modelo Book con migración, controlador (con todos sus recursos) y seeder:
    + $ php artisan make:model Book -mcrs
2. Establecer los atributos de la migración Book en **database\migrations\2022_05_10_212414_create_books_table.php**:
    ```php
    ≡
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor')->nullable();
            $table->string('editorial')->nullable();
            $table->string('edicion')->nullable();              // Número de edición
            $table->string('paginas')->nullable();
            $table->string('isbn')->nullable();
            $table->string('enlace');                           // Enlace o url del documento
            $table->string('url_img_caratula')->nullable();     // URL de la imagen de la caratula del libro
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }
    ≡
    ```
3. Adaptar la configuración del archivo **config\adminlte.php** el menú libros:
    ```php
    ≡
    'menu' => [
        ≡
        /* Administración de tablas */
        ['header' => 'ADMINISTRAR TABLAS'],
        [
            'text' => 'Libros',
            'url'  => 'admin/books',
            'icon' => 'fas fa-fw fa-book',
            'can'  => 'admin.crud.books.index',
        ],
    ],
    ≡
    ```
4. Programar seeder **database\seeders\BookSeeder.php**:
    ```php
    ≡
    public function run()
    {
        Book::create([
            'titulo' => 'Trilogía sobre los primeros pobladores de Tunja',
            'autor' => 'Dra. Magdalena Corradine',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true'
        ]);

        Book::create([
            'titulo' => 'Obra ampliada sobre los llenerenses que pasaron a América',
            'autor' => 'Luis Garraín Villa',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true'
        ]);

        Book::create([
            'titulo' => 'Médicos coloniales venezolanos',
            'autor' => 'Dr. Manuel Hernández González',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true'
        ]);

        Book::create([
            'titulo' => 'Familiares y funcionarios del Santo Oficio en Venezuela',
            'autor' => 'Dr. Emanuel Amodio',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true'
        ]);

        Book::create([
            'titulo' => 'Contenido práctico-teórico del Derecho Genealogista',
            'autor' => 'Dr. Crisanto Bello',
            'enlace' => 'https://docs.google.com/spreadsheets/d/1_M5G5TjL4uG54XlvtzW30Qr9pIUmgxEl/edit?usp=sharing&ouid=104133285580700555053&rtpof=true&sd=true'
        ]);
    }
    ≡
    ```
5. Incluir seeder Book en **database\seeders\DatabaseSeeder.php**:
    ```php
    ≡
    public function run()
    {
        ≡
        $this->call(BookSeeder::class);
    }
    ≡
    ```
6. Reestablecer la base de datos:
    + $ php artisan migrate:fresh --seed
7. Establecer asignación masiva al modelo **app\Models\Book.php**:
    ```php
    ≡
    class Book extends Model
    {
        ≡  
        protected $fillable = [
            'titulo',
            'autor',
            'editorial',
            'edicion',
            'paginas',
            'isbn',
            'enlace',
            'url_img_caratula',
            'notas'
        ];
    }
    ```
8. Programar controlador **app\Http\Controllers\BookController.php**:
    ```php
    ≡
    use App\Models\Book;
    use RealRashid\SweetAlert\Facades\Alert;

    class BookController extends Controller
    {
        ≡
        public function index()
        {
            return view('admin.crud.books.index');
        }
        ≡
        public function create()
        {
            $book = new Book();
            return view('admin.crud.books.create', compact('book'));
        }
        ≡
        public function store(Request $request)
        {
            // Validación
            $request->validate([
                'titulo' => 'required|max:254',
                'enlace' => 'required'
            ]);

            // almacenando libro
            $book = Book::create($request->all());

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha creado el libro: ' . $request->titulo);

            // Redireccionar a la vista index
            return redirect()->route('admin.books.index');
        }
        ≡
        public function show(Book $book)
        {
            return view('admin.crud.books.edit', compact('book'));
        }
        ≡
        public function edit(Book $book)
        {
            return view('admin.crud.books.edit', compact('book'));
        }
        ≡
        public function update(Request $request, Book $book)
        {
            // Validación
            $request->validate([
                'titulo' => 'required|max:254',
                'enlace' => 'required'
            ]);

            // actualizando book
            $book->update($request->all());

            // Mensaje
            Alert::success('¡Éxito!', 'Se ha actualizado el libro: ' . $request->titulo);

            // Redireccionar a la vista index
            return redirect()->route('admin.books.index');
        }
        ≡
        public function destroy(Book $book)
        {
            $titulo = $book->titulo;
            $book->delete();
            Alert::info('¡Advertencia!', 'Se ha eliminado el libro: ' . $titulo);
            return redirect()->route('admin.books.index');
        }
    }
    ```
9.  Agregar el juego de rutas books en **routes\admin.php**:
    ```php
    ≡
    use App\Http\Controllers\BookController;
    ≡
    Route::resource('books', BookController::class)->names('books')
        ->middleware('can:admin.crud.books.index');
    ```
10. Crear componente Livewire para el modelo Book: 
	+ $ php artisan make:livewire admin/books-table
10. Programar controlador Livewire asociado al modelo Book en **app\Http\Livewire\Admin\BookTable.php**:
    ```php
    <?php

    namespace App\Http\Livewire\Admin;

    use App\Models\Book;
    use Livewire\Component;
    use Livewire\WithPagination;

    class BooksTable extends Component
    {
        use WithPagination;

        protected $queryString = [
            'search' => ['except' => ''],
            'perPage' => ['except' => '15']
        ];

        public $search = '';
        public $perPage = '15';

        public function render()
        {
            $books = Book::where('titulo','LIKE',"%$this->search%")
                ->orWhere('autor','LIKE',"%$this->search%")
                ->orWhere('editorial','LIKE',"%$this->search%")
                ->orWhere('isbn','LIKE',"%$this->search%")
                ->orWhere('notas','LIKE',"%$this->search%")
                ->orderBy('updated_at','DESC')
                ->paginate($this->perPage);
            return view('livewire.admin.books-table', compact('books'));
        }

        public function clear(){
            $this->search = '';
            $this->page = 1;
            $this->perPage = '15';
        }

        public function limpiar_page(){
            $this->reset('page');
        }
    }
    ```
11. Diseñar vista para la tabla Books en **resources\views\livewire\admin\crud\books-table.blade.php**:
    ```php
    <div>
        <div class="p-4">
            <div class="card">
                <div class="card-header">
                    <div class="row m-2">
                        <h2 class="card-title flex-1"><strong>Lista de libros</strong></h2>
                        <div class="card-tools flex-1">
                            <div class="input-group input-group-sm">
                                <input wire:model="search" type="text" class="form-control float-right" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-sm mx-3 flex" style="width: 140px">
                            <select wire:model="perPage" class="form-control float-right">
                                <option value="5">5 por pág. </option>
                                <option value="10">10 por pág.</option>
                                <option value="15">15 por pág.</option>
                                <option value="25">25 por pág.</option>
                                <option value="50">50 por pág.</option>
                                <option value="100">100 por pág.</option>
                            </select>
                            @if ($search !== '')
                            <div class="input-group-sm flex">
                                <button wire:click="clear" class="btn btn-secondary form-control float-right"><i class="far fa-window-close"></i></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @can('admin.crud.books.create')
                    <a href="{{ route('admin.books.create') }}" class="btn btn-secondary m-4">
                        Añadir libro
                    </a>
                @endcan

                <div class="card-body table-responsive p-0">
                    @if ($books->count())
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Tapa</th> {{-- ID --}}
                                <th>Titulo / Autor</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                @can('admin.crud.books.edit')
                                <th class="text-center">Editar</th>
                                @endcan
                                @can('admin.crud.books.destroy')
                                <th class="text-center">Eliminar</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td title="{{ $book->id }}">
                                    <img
                                        src="{{ $book->url_img_caratula }}"
                                        onerror="this.onerror=null; this.src='/img/caratula.jpg'"
                                        alt="{{ 'Caratula de ' . $book->titulo }}"
                                        class="img-size-32 mr-2"
                                    >
                                </td>
                                <td>
                                    <p class="m-0">{{ $book->titulo }}</p>
                                    <small><strong>{{ $book->autor }}</strong></small>
                                </td>
                                <td>{{ $book->created_at }}</td>
                                <td>{{ $book->updated_at }}</td>
                                @can('admin.crud.books.edit')
                                <td class="text-center">
                                    <a href="{{ route('admin.books.edit', $book) }}" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>
                                @endcan
                                @can('admin.crud.books.destroy')
                                <td class="text-center">
                                    <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            type="submit"
                                            title="Eliminar"
                                            style="color: red"
                                            onclick="return confirm('¿Está seguro que desea eliminar a este libro?')"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-4">
                        {{ $books->links() }}
                    </div>
                    @else
                        <div class="m-4">
                            <p>No hay resultado para la búsqueda: <strong>{{ $search }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    ```
12. Diseñar las vistas para el CRUD Books:
    + resources\views\admin\crud\books\index.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Lista de libros')

        @section('content_header')

        @stop

        @section('content')
            @livewire('admin.books-table')
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\books\\_form.blade.php:
        ```php
        <div class="card-body m-4">
            <div class="row">
                <div class="col-sm-12 col-md-2 mb-3">
                    <img
                        src="{{ $book->url_img_caratula }}"
                        onerror="this.onerror=null; this.src='/img/caratula.jpg'"
                        alt="{{ 'Caratula de ' . $book->titulo }}"
                        width="150px"
                        class="mt-5"
                    >
                </div>
                <div class="col-sm-12 col-md-10 mb-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="titulo">Título del libro</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="titulo"
                                    placeholder="Introduzca el título del libro"
                                    value="{{ old('titulo', $book->titulo) }}"
                                >
                            </div>
                            @error('titulo')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="autor"
                                    placeholder="Introduzca el autor del libro"
                                    value="{{ old('autor', $book->autor) }}"
                                >
                            </div>
                            @error('autor')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="enlace">URL del libro</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    name="enlace"
                                    placeholder="Introduzca la URL del libro"
                                    value="{{ old('enlace', $book->enlace) }}"
                                >
                            </div>
                            @error('enlace')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="url_img_caratula">URL de la caratula</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    name="url_img_caratula"
                                    placeholder="Introduzca la URL de la caratula del libro"
                                    value="{{ old('url_img_caratula', $book->url_img_caratula) }}"
                                >
                            </div>
                            @error('url_img_caratula')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="editorial">Editorial</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="editorial"
                                    placeholder="Introduzca la editorial del libro"
                                    value="{{ old('editorial', $book->editorial) }}"
                                >
                            </div>
                            @error('editorial')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="edicion">Edición</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="edicion"
                                    placeholder="Introduzca el edición del libro"
                                    value="{{ old('edicion', $book->edicion) }}"
                                >
                            </div>
                            @error('edicion')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="isbn"
                                    placeholder="Introduzca el ISBN del libro"
                                    value="{{ old('isbn', $book->isbn) }}"
                                >
                            </div>
                            @error('isbn')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 mb-0">
                            <div class="form-group">
                                <label for="paginas">Páginas</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="paginas"
                                    placeholder="Introduzca el número de páginas del libro"
                                    value="{{ old('paginas', $book->paginas) }}"
                                >
                            </div>
                            @error('paginas')
                                <div class="col-span-12 sm:col-span-12">
                                    <small style="color:red">*{{ $message }}*</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="notas">Notas</label>
                        <textarea class="form-control" name="notas" rows="3" placeholder="Escriba comentarios acerca del libro">{{ old('notas', $book->notas) }}</textarea>
                    </div>
                    @error('isbn')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        ```
    + resources\views\admin\crud\books\create.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Añadir libro')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary">
                <div class="card-header m-4">
                    <h3 class="card-title">Añadir libro</h3>
                </div>
                <form action="{{ route('admin.books.store') }}" method="POST">
                    @csrf

                    @include('admin.crud.books._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Añadir libro</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```
    + resources\views\admin\crud\books\edit.blade.php:
        ```php
        @extends('adminlte::page')

        @section('title', 'Editar libro')

        @section('content_header')

        @stop

        @section('content')
        <div class="p-4">
            <div class="card card-primary m-2">
                <div class="card-header m-4">
                    <h3 class="card-title">Editar libro</h3>
                </div>
                <form action="{{ route('admin.books.update', $book) }}" method="POST">
                    @csrf
                    @method('put')

                    @include('admin.crud.books._form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Actualizar libro</button>
                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
        @stop

        @section('js')
        @stop
        ```


## Establecer Google Drive como unidad de almacenamiento por defecto





    ```php
    ≡
    ≡
    ```











## Creación de enlaces simbólicos (symbolic link)
1. Crear enlace simbólico en Windows 10
	+ Ejecutar **C:\Windows\System32\cmd.exe como administrador**
	+ $ Mklink/D C:\xampp\htdocs\sefar\public\doc C:\xampp\htdocs\universalsefar.com\documentos
	+ $ Mklink/D C:\xampp\htdocs\sefar\storage\app\public\doc C:\xampp\htdocs\universalsefar.com\documentos 
		+ **Lógica**: Mklink /D "ruta donde queremos crear el enlace" "ruta de origen de archivos"
1. Crear enlace simbólico en el hosting
	+ En el cPanel ir a **Trabajos de cron**.
	+ Ubicarse en **Añadir nuevo trabajo de cron** y luego **Configuración común**, y seleccionar **Una vez por mínuto(* * * * *)**.
	+ En **Comando:** escribir:
		* ln -s /home/pxvim6av41qx/public_html/documentos /home/pxvim6av41qx/public_html/app.universalsefar.com/public/doc
	+ Presionar **Añadir nuevo trabajo de cron** y esperar a que se ejecute la tarea.
	+ Borrar tarea una vez creado el enlace en **Trabajos de cron actuales**.
	+ Repetir el procedimiento pero ahora para:
		* ln -s /home/pxvim6av41qx/public_html/documentos /home/pxvim6av41qx/public_html/app.universalsefar.com/storage/app/public/doc


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


## Crear modelo:
1. Diferentes formas para crear modelos:
	+ Crear solo el modelo
		- $ php artisan make:model Model
	+ Crear el modelo con migración:
		- $ php artisan make:model Model -m
	+ Crear el modelo con migración y controlador:
		- $ php artisan make:model Model -mc
	+ Crear el modelo con migración, controlador y seeder:
		- $ php artisan make:model Model -mcs
	+ Crear el modelo con migración, controlador, seeder y factory:
		- $ php artisan make:model Model -mcsf
	+ Crear el modelo con migración con todo:
		- $ php artisan make:model Model -a


## Temporal


    ```php
    ≡
    ≡
    ```


