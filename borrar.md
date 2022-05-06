pedro.j.bazo.c@gmail.com
*Xiphos*33*

## Personalizar el proyecto
1. Agregar a la cabecera del modelo **User**:
	>
		use Illuminate\Support\Facades\Auth;
1. Agregar los siguientes métodos a la clase **User**:
	>
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
1. Adaptar la configuración del archivo **config\adminlte.php** al proyecto.
	##### **Iconos**: https://fontawesome.com/icons
	##### **Tutorial**: https://www.youtube.com/playlist?list=PLZ2ovOgdI-kWTCkbH749Ukvq7FMz5ahpP
	>
		≡
		≡
1. Crear archivo de estilos propios del proyecto **public\css\sefar.css**
	>
		≡
		≡
1. Agregar los estilos **public\css\sefar.css** en la sección del estilos de los archivos **archivo resources\views\layouts\guest.blade.php** y **resources\views\layouts\app.blade.php**
	>
		<link rel="stylesheet" href="{{ asset('css/sefar.css') }}">
1. Ubicar un fabicon de la empresa, darle el nombre de **favicon.ico** y pegarlo en:
	+ public\
1. Ubicar un logo de la empresa, darle el nombre de **LogoSefar.png** y pegarlo en:
	+ public\vendor\adminlte\dist\img\
1. Crear **resources\views\layouts\logos\logo_sm.blade.php**
	>
		<img src="{{ asset('vendor\adminlte\dist\img\LogoSefar.png') }}" alt="Logo Sefar" width="50" height="50">
1. Crear **resources\views\layouts\logos\logo.blade.php**
	>
		<img src="{{ asset('vendor\adminlte\dist\img\LogoSefar.png') }}" alt="Logo Sefar" width="100" height="100">
1. Crear vista **resources\views\inicio.blade.php** para la ruta **inicio**
	>
		≡
		≡
1. Modificar la ruta de inicio en **routes\web.php**
	>
		// Vista inicio
		Route::get('/', function () {
			return view('inicio');
		})->name('inicio')->middleware('auth');
1. Adaptar todos los **archivos resources\views\auth** a las características del proyecto
	+ resources\views\auth\confirm-password.blade.php
		>
			≡
			≡
	+ resources\views\auth\forgot-password.blade.php
		>
			≡
			≡
	+ resources\views\auth\login.blade.php
		>
			≡
			≡
	+ resources\views\auth\register.blade.php
		>
			≡
			≡
	+ resources\views\auth\reset-password.blade.php
		>
			≡
			≡
	+ resources\views\auth\two-factor-challenge.blade.php
		>
			≡
			≡
	+ resources\views\auth\verify-email.blade.php
		>
			≡
			≡
1. Modificar **app\Providers\RouteServiceProvider.php**
	#### Cambiar:
	>
		public const HOME = '/dashboard';
	#### por:
	>
		public const HOME = '/';

	### Commit --:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "Proyecto personalizado"
	
## ___________________________________________________________________

 

## Perfil de usuario
1. Rediseñar plantilla **resources\views\profile\update-profile-information-form.blade.php**
	>
						≡
						@if ($this->user->profile_photo_path)
							<x-jet-secondary-button type="button" class="mt-2 cfrSefar ctaSefar" wire:click="deleteProfilePhoto">
								{{ __('Remove Photo') }}
							</x-jet-secondary-button>
						@endif
						≡
				@endif
				≡
			</x-slot>

			<x-slot name="actions">
				≡
				<x-jet-button wire:loading.attr="disabled" wire:target="photo" class="cfrSefar">
					{{ __('Save') }}
				</x-jet-button>
			</x-slot>
		</x-jet-form-section>
1. Rediseñar plantilla **resources\views\profile\update-password-form.blade.php**
	>
				≡
				<x-jet-button class="cfrSefar">
					{{ __('Save') }}
				</x-jet-button>
			</x-slot>
		</x-jet-form-section>
1. Rediseñar plantilla **resources\views\profile\two-factor-authentication-form.blade.php**
	>		
		≡
		@if (! $this->enabled)
			<x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
				<x-jet-button type="button" wire:loading.attr="disabled" class="cfrSefar">
					{{ __('Enable') }}
				</x-jet-button>
			</x-jet-confirms-password>
		@else
		≡
1. Rediseñar plantilla **resources\views\profile\logout-other-browser-sessions-form.blade.php**
	>	
		≡
        <div class="flex items-center mt-5">
            <x-jet-button wire:click="confirmLogout" wire:loading.attr="disabled" class="cfrSefar">
                {{ __('Log Out Other Browser Sessions') }}
            </x-jet-button>

            <x-jet-action-message class="ml-3" on="loggedOut">
                {{ __('Done.') }}
            </x-jet-action-message>
        </div>
		≡
1. Rediseñar plantilla **resources\views\navigation-menu.blade.php**
	>
		<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
			<!-- Primary Navigation Menu -->
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="flex justify-between h-16">
					<div class="flex">
						<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
							<div class="block px-2 py-4 text-xl ctvSefar">
								<strong>{{ Auth::user()->name }}</strong>
							</div>
						</div>
					</div>

					<div class="hidden sm:flex sm:items-center sm:ml-6">
						<!-- Teams Dropdown -->
						@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
							<div class="ml-3 relative">
								<x-jet-dropdown align="right" width="60">
									<x-slot name="trigger">
										<span class="inline-flex rounded-md">
											<button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
												{{ Auth::user()->currentTeam->name }}

												<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
												</svg>
											</button>
										</span>
									</x-slot>

									<x-slot name="content">
										<div class="w-60">
											<!-- Team Management -->
											<div class="block px-4 py-2 text-xs text-gray-400">
												{{ __('Manage Team') }}
											</div>

											<!-- Team Settings -->
											<x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
												{{ __('Team Settings') }}
											</x-jet-dropdown-link>

											@can('create', Laravel\Jetstream\Jetstream::newTeamModel())
												<x-jet-dropdown-link href="{{ route('teams.create') }}">
													{{ __('Create New Team') }}
												</x-jet-dropdown-link>
											@endcan

											<div class="border-t border-gray-100"></div>

											<!-- Team Switcher -->
											<div class="block px-4 py-2 text-xs text-gray-400">
												{{ __('Switch Teams') }}
											</div>

											@foreach (Auth::user()->allTeams() as $team)
												<x-jet-switchable-team :team="$team" />
											@endforeach
										</div>
									</x-slot>
								</x-jet-dropdown>
							</div>
						@endif

						<!-- Settings Dropdown -->
						<div class="ml-3 relative">
							<x-jet-dropdown align="right" width="48">
								<x-slot name="trigger">
									@if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
										<button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
											<img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
										</button>
									@else
										<span class="inline-flex rounded-md">
											<button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
												{{ Auth::user()->name }}

												<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
												</svg>
											</button>
										</span>
									@endif
								</x-slot>

								<x-slot name="content">
									<div class="border-t border-gray-100"></div>        
								</x-slot>
							</x-jet-dropdown>
						</div>
					</div>

					<!-- Hamburger -->
					<div class="-mr-2 flex items-center sm:hidden">
						<button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
							<svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
								<path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
								<path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
				</div>
			</div>

			<!-- Responsive Navigation Menu -->
			<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

				<!-- Responsive Settings Options -->
				<div class="pt-4 pb-1 border-t border-gray-200">
					<div class="flex items-center px-4">
						@if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
							<div class="flex-shrink-0 mr-3">
								<img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
							</div>
						@endif

						<div>
							<div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
							<div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
1. Rediseñar vista para el perfil de usuario **resources\views\profile\show.blade.php**
	>
		@extends('adminlte::page')

		@section('title', 'Usuario')

		@section('content_header')
			{{-- <h1>Perfil de usuario</h1> --}}
		@stop

		@section('content')
		<x-app-layout>
			<div>
				<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
					@if (Laravel\Fortify\Features::canUpdateProfileInformation())
						@livewire('profile.update-profile-information-form')

						<x-jet-section-border />
					@endif

					@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
						<div class="mt-10 sm:mt-0">
							@livewire('profile.update-password-form')
						</div>

						<x-jet-section-border />
					@endif

					@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
						<div class="mt-10 sm:mt-0">
							@livewire('profile.two-factor-authentication-form')
						</div>

						<x-jet-section-border />
					@endif

					<div class="mt-10 sm:mt-0">
						@livewire('profile.logout-other-browser-sessions-form')
					</div>

					@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
						<x-jet-section-border />

						<div class="mt-10 sm:mt-0">
							@livewire('profile.delete-user-form')
						</div>
					@endif
				</div>
			</div>
		</x-app-layout>
		@stop

		@section('css')
			<link rel="stylesheet" href="/css/admin_custom.css">
		@stop

		@section('js')

		@stop

	### Commit --:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "Perfil de usuario"

## ___________________________________________________________________


## Integrar Sweetalert
##### https://realrashid.github.io/sweet-alert/
1. Ejecutar: 
	>
		$ composer require realrashid/sweet-alert
1. Agregar a **config\app.php** en **providers**
	>
		≡
		'providers' => [
			≡
			/*
			* Package Service Providers...
			*/
			RealRashid\SweetAlert\SweetAlertServiceProvider::class,
			≡
		],
		≡
1. Agregar a **config\app.php** en **aliases**
	>
    	≡
		'aliases' => [
			≡
			'Alert' => RealRashid\SweetAlert\Facades\Alert::class,
			≡
		],
		≡
	##### **Nota**: agregar a la cabecer del controlador a utilizar:
	>
    	use RealRashid\SweetAlert\Facades\Alert;

	##### **Nota**: insertar en la sección content de resources\views\layouts\app.blade.php
	>
		@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
		Nota: si falla, reemplazar por: @include('sweetalert::alert')


	### Para integrar Sweetalert2
	##### https://sweetalert2.github.io
	1. Ejecutar:
		>
			$ php artisan adminlte:plugins install
	1. Modificar en **config\adminlte.php**
		>
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

	1. Ejecutar:
		>
			$ npm install sweetalert2
	1. Agregamos la siguiente instrucción al archivo **resources\js\app.js**
		>
			window.Swal = require('sweetalert2');	
	1. Ejecutamos:
		>
			$ npm run dev		
		##### **Nota**: para usarlo:
		+ Incluir en la vista luego de la sección @section('title', '***')
			>
				@section('plugins.Sweetalert2', true)
		+ Incluir el siguiente script al final de la vista para verificar que esta funcionando:
			>
				@section('js')
					<script>
						Swal.fire(
							'Good job!',
							'You clicked the button!',
							'success'
						)
					</script>
				@stop

	### Commit 9:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "Integración Sweetalert"

## ___________________________________________________________________


## Verificación de email con Jetstream
##### https://dev.to/devscamp/segundo-post-de-prueba-4jf1
1. Modificar el archivo **config/fortify.php**
	>
		'features' => [
			Features::registration(),
			Features::resetPasswords(),
			Features::emailVerification(),
			Features::updateProfileInformation(),
			Features::updatePasswords(),
			Features::twoFactorAuthentication([
				'confirmPassword' => true,
        ]),
	##### Se descomentó:
	>
		// Features::emailVerification(),
1. En el modelo **User** implementar la interface **MustVerifyEmail**
	>
		class User extends Authenticatable implements MustVerifyEmail
1. Ingresar en Mailtrap (https://mailtrap.io).
1. Configurar .env con las credenciales de Mailtrap.
	>
		MAIL_MAILER=smtp
		MAIL_HOST=smtp.mailtrap.io
		MAIL_PORT=2525
		MAIL_USERNAME=7c67f786972696
		MAIL_PASSWORD=8f37b2d25228ba
		MAIL_ENCRYPTION=tls
1. Modificar variable de entorno en **.env**
	+ Cambiar **MAIL_FROM_ADDRESS=null** por **MAIL_FROM_ADDRESS=app.web@sefarvzla.com**
1. Modificar la ruta raiz en **routes\web.php**
	>
		Route::get('/', [Controller::class, 'index'])->name('inicio')->middleware(['auth', 'verified']);
1. Publicar los archivos de las notificaciones:
	>
		$ php artisan vendor:publish --tag=laravel-notifications
	##### Ahora en **resources\views\vendor\notifications\email.blade.php**, ahí podremos editar la plantilla de email.
1. Para personalizar estilos del email:
	>
		$ php artisan vendor:publish --tag=laravel-mail
	##### Ahora en "resources/views/vendor/mail/html/themes/default.css" podremos personalizar los estilos de CSS.
1. Modificar el archivo de estilo **resources\views\vendor\mail\html\themes\default.css**
	>
		≡
		.button-primary {
			background-color: rgb(121,22,15);
			border-bottom: 8px solid #2d3748;
			border-left: 18px solid #2d3748;
			border-right: 18px solid #2d3748;
			border-top: 8px solid #2d3748;
		}
		≡
		.button-success {
			background-color: rgb(121,22,15);
			border-bottom: 8px solid rgb(121,22,15);
			border-left: 18px solid rgb(121,22,15);
			border-right: 18px solid rgb(121,22,15);
			border-top: 8px solid rgb(121,22,15);
		}
		≡
1. Modificar plantilla **resources\views\vendor\mail\html\header.blade.php**
	>
		<tr>
			<td class="header">
				<a href="{{ $url }}" style="display: inline-block;">
					@if (trim($slot) === 'Laravel')
						<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
					@else
						<img src="https://app.universalsefar.com/vendor/adminlte/dist/img/LogoSefar.png" alt="Logo Sefar" width="100" height="100">
						<hr>
						{{ $slot }}
					@endif
				</a>
			</td>
		</tr>

	### Commit --:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "Verificación de email"

## ___________________________________________________________________


## CRUD Permisos
1. Crear grupo de rutas en **routes\web.php**
	>
		// Grupo de rutas CRUD
		Route::group(['middleware' => ['auth'], 'as' => 'crud.'], function(){
		});
1. Crear modelo Permission:
	>
		$ php artisan make:model Permission
1. Programar modelo Permission: **app\Models\Permission.php**
	>
		<?php

		namespace App\Models;

		use Illuminate\Database\Eloquent\Factories\HasFactory;
		use Illuminate\Database\Eloquent\Model;

		class Permission extends Model
		{
			use HasFactory;
			
			protected $fillable = [
				'name',
			];
		}
1. Crear controlador Permission:
	>
		$ php artisan make:controller PermissionController -r
1. Programar el controlador Permission **app\Http\Controllers\PermissionController.php**
	>
		≡
		≡
1. Agregar ruta de permisos al grupo de rutas CRUD:
	>
		Route::resource('permissions', PermissionController::class)->names('permissions')
			->middleware('can:crud.permissions.index');
	##### Nota: añadir a la cabecera:
	>
		use App\Http\Controllers\PermissionController;
1. Crear componente Livewire para Tabla Permissions: 
	>
		$ php artisan make:livewire crud/permissions-table
1. Programar controlador para la tabla Permissions: **app\Http\Livewire\Crud\PermissionsTable.php**
	>
		≡
		≡
1. Diseñar vista para la tabla Permissions: **resources\views\livewire\crud\permissions-table.blade.php**
	>
		≡
		≡
1. Programar controlador Permission: **app\Http\Controllers\PermissionController.php**
	>
		≡
		≡
1. Diseñar las vistas para el CRUD Permisos:
	- resources\views\crud\permissions\index.blade.php
		>
			≡
			≡
	- resources\views\crud\permissions\create.blade.php
		>
			≡
			≡
	- resources\views\crud\permissions\edit.blade.php
		>
			≡
			≡

	### Commit --:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "CRUD Permisos"

## ___________________________________________________________________


## CRUD Roles
1. Crear modelo Role:
	>
		$ php artisan make:model Role
1. Programar modelo Role: **app\Models\Role.php**
	>
		<?php

		namespace App\Models;

		use Illuminate\Database\Eloquent\Factories\HasFactory;
		use Illuminate\Database\Eloquent\Model;

		class Role extends Model
		{
			use HasFactory;

			protected $fillable = [
				'name',
			];    
		}
1. Crear controlador Role:
	>
		$ php artisan make:controller RoleController -r
1. Programar el controlador Role **app\Http\Controllers\RoleController.php**
	>
		≡
		≡
1. Agregar ruta de roles al grupo de rutas CRUD:
	>
		Route::resource('roles', RoleController::class)->names('roles')
			->middleware('can:crud.roles.index');
	##### Nota: añadir a la cabecera:
	>
		use App\Http\Controllers\RoleController;
1. Crear componente Livewire para Tabla Roles: 
	>
		$ php artisan make:livewire crud/roles-table
1. Programar controlador para la tabla Roles: **app\Http\Livewire\Crud\RolesTable.php**
	>
		≡
		≡
1. Diseñar vista para la tabla Roles: **resources\views\livewire\crud\roles-table.blade.php**
	>
		≡
		≡
1. Programar controlador Role: **app\Http\Controllers\RoleController.php**
	>
		≡
		≡
1. Diseñar las vistas para el CRUD Roles:
	- resources\views\crud\roles\index.blade.php
		>
			≡
			≡
	- resources\views\crud\roles\create.blade.php
		>
			≡
			≡
	- resources\views\crud\roles\edit.blade.php
		>
			≡
			≡

	### Commit --:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "CRUD Roles"

## ___________________________________________________________________


## CRUD Usuarios
1. Agregar el campo **passport** como campo de asignación masiva en el modelo **User**: **app\Models\User.php**
	>
		≡
		protected $fillable = [
			'name',
			'email',
			'password',
			'passport',
		];
		≡
1. Crear controlador User:
	>
		$ php artisan make:controller UserController -r
1. Programar el controlador User **app\Http\Controllers\UserController.php**
	>
		≡
		≡
1. Agregar ruta de usuarios al grupo de rutas CRUD:
	>
		Route::resource('users', UserController::class)->names('users')
			->middleware('can:crud.users.index');
	##### Nota: añadir a la cabecera:
	>
		use App\Http\Controllers\UserController;
1. Crear componente Livewire para Tabla Users: 
	>
		$ php artisan make:livewire crud/users-table
1. Programar controlador para la tabla Users: **app\Http\Livewire\Crud\UsersTable.php**
	>
		≡
		≡
1. Diseñar vista para la tabla Users: **resources\views\livewire\crud\users-table.blade.php**
	>
		≡
		≡
1. Programar controlador User: **app\Http\Controllers\UserController.php**
	>
		≡
		≡
1. Diseñar las vistas para el CRUD Usuarios:
	- resources\views\crud\users\index.blade.php
		>
			≡
			≡
	- resources\views\crud\users\create.blade.php
		>
			≡
			≡
	- resources\views\crud\users\edit.blade.php
		>
			≡
			≡

	### Commit 13:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "CRUD Usuarios"

## ___________________________________________________________________


## CRUD Miscelaneos
1. Crear modelo Miscelaneo junto con su migración y controlador y los métodos para el CRUD.
	>
		$ php artisan make:model Miscelaneo -m -c -r
1. Preparar migración para la tabla **miscelaneos** en **database\migrations\2021_06_13_204842_create_miscelaneos_table.php**
	>
		≡
		public function up()
		{
			Schema::create('miscelaneos', function (Blueprint $table) {
				$table->id();
				$table->string('id_bd',4)->nullable();      // id correspondiente en la tabla bd
				$table->string('titulo');                   // Título
				$table->string('autor')->nullable();        // Autor(es)
				$table->string('publicado')->nullable();    // Publicado en
				$table->string('editorial')->nullable();    // Ciudad / Editorial
				$table->string('volumen')->nullable();      // Año / Número / Volumen
				$table->string('paginacion')->nullable();   // Paginación
				$table->string('isbn')->nullable();         // ISBN / ISSN
				$table->text('claves')->nullable();         // Palabras claves
				$table->string('enlace');                   // Enlace o url del documento
				$table->text('notas')->nullable();          // Notas
				$table->string('material')->nullable();     // Tipo de material:    - Artículo de publicación periódica
															//                      - Capítulo de libro
															//                      - Material genealógico
															//                      - Informes de Sefar
															//                      - Otros
				$table->string('catalogador')->nullable();  // Nombre o email del usuario que creo el documento
				$table->timestamps();
			});
		}
		≡

1. Establecer permisos en los seeders para el CRUD Miscelaneos en **database\seeders\RoleSeeder.php**
	>   
		≡ 
		public function run()
		{
			≡        
			Permission::create(['name' => 'crud.miscelaneos.index'])->syncRoles($rolAdministrador,$rolGenealogista,$rolDocumentalista);
			Permission::create(['name' => 'crud.miscelaneos.create'])->syncRoles($rolAdministrador,$rolGenealogista,$rolDocumentalista);
			Permission::create(['name' => 'crud.miscelaneos.edit'])->syncRoles($rolAdministrador,$rolGenealogista,$rolDocumentalista);
			Permission::create(['name' => 'crud.miscelaneos.destroy'])->syncRoles($rolAdministrador);
			≡
		}
		≡
1. Reestablecer base de datos: 
	>
		$ php artisan migrate:fresh --seed		
1. Establecer campos de asignación masiva en el modelo **Miscelaneo** en **app\Models\Miscelaneo.php**
	>
		≡
		class Miscelaneo extends Model
		{
			use HasFactory;

			protected $fillable = [
				'titulo',
				'autor',
				'publicado',
				'editorial',
				'volumen',
				'paginacion',
				'isbn',
				'notas',
				'enlace',
				'claves',
				'material',
				'catalogador',
			];
		}
1. Agregar ruta miscelaneos al grupo de rutas CRUD:
	>
		Route::resource('miscelaneos', MiscelaneoController::class)->names('miscelaneos')
				->middleware('can:crud.miscelaneos.index');
	##### Nota: añadir a la cabecera:
	>
		use App\Http\Controllers\MiscelaneoController;
1. Crear componente Livewire para Tabla Miscelaneos: 
	>
		$ php artisan make:livewire crud/miscelaneos-table
1. Programar controlador para la tabla Miscelaneos: **app\Http\Livewire\Crud\MiscelaneosTable.php**
	>
		≡
		≡
1. Diseñar vista para la tabla Miscelaneos: **resources\views\livewire\crud\miscelaneos-table.blade.php**
	>
		≡
		≡
1. Programar controlador Miscelaneo: **app\Http\Controllers\MiscelaneoController.php**
	>
		≡
		≡
1. Diseñar las vistas para el CRUD Miscelaneos:
	- resources\views\crud\miscelaneos\index.blade.php
		>
			≡
			≡
	- resources\views\crud\miscelaneos\create.blade.php
		>
			≡
			≡
	- resources\views\crud\miscelaneos\edit.blade.php
		>
			≡
			≡
1. Editar **config\adminlte.php** para añadir los menú para ingresar al CRUD Miscelaneos.
	>
		≡
		≡

	### Commit --:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "CRUD Miscelaneos"


## Crear rutas de mantenimiento de la aplicación
1. Agregar las siguientes rutas en **routes\web.php** para poder realizarle mantenimiento a la aplicación cuando se encuentre en producción:
	>
		// RUTAS PARA EL MANTENIMIENTO DE LA APLICACIÓN EN PRODUCCIÓN
		// Ruta para ejecutar en producción: $ php artisan key:generate
		Route::get('key-generate', function(){
			Artisan::call('key:generate');
		});

		// Ruta para ejecutar en producción: $ php artisan storage:link
		Route::get('storage-link', function(){
			Artisan::call('storage:link');
		});

		// Ruta para ejecutar en producción: $ php artisan config:cache
		Route::get('config-cache', function(){
			Artisan::call('config:cache');
		});

		// Ruta para ejecutar en producción: $ php artisan cache:clear
		Route::get('cache-clear', function(){
			Artisan::call('cache:clear');
		});

		// Ruta para ejecutar en producción: $ php artisan route:clear
		Route::get('route-clear', function(){
			Artisan::call('route:clear');
		});

		// Ruta para ejecutar en producción: $ php artisan config:clear
		Route::get('config-clear', function(){
			Artisan::call('config:clear');
		});

		// Ruta para ejecutar en producción: $ php artisan view:clear
		Route::get('view-clear', function(){
			Artisan::call('view:clear');
		});	

	### Commit XX:
	+ Ejecutar:
		>
			$ git add .
	+ Crear repositorio:
		>
			$ git commit -m "Rutas para mantenimiento de la app"

## Subir proyecto local a GitHub
	##### https://github.com/
1. Ejecutar:
	> 
		$ npm run production
		$ composer dumpautoload
		$ php artisan key:generate
1. Creamos un nuevo repositorio **público** con el nombre **AppSefarUniversal** en la página de GitHub.
	##### Las opciones de **Initialize this repository with** las dejamos sin marcar.
1. Ejecutamos en local:
	>
		$ git add .
		$ git commit -m "Ajustes finales"
		$ git remote add origin https://github.com/petrix12/AppSefarUniversal.git
		$ git push -u origin master

## Configurar GitHub con el hosting de GoDaddy
1. Ingresar al cPanel con https://a2plcpnl0082.prod.iad2.secureserver.net:2083/
	###### pxvim6av41qx / Cisco2019!
1. En la sección **ARCHIVOS** ir a **Git™ Version Control**
1. Crear repositorio ingresando los siguientes parámetros:
	+ Clone URL: https://github.com/petrix12/AppSefarUniversal.git
	+ Repository Path: public_html/app.universalsefar.com
	+ Repository Name: AppSefarUniversal
1. Copiar del proyecto local a la carpeta del hosting **public_html/app.universalsefar.com** los siguientes directorios:
	+ node_modules
	+ public/storage
	+ vendor
1. Copiar y pegar el archivo **.env** del local al hosting.
1. Cambiar las siguientes variables de entorno al archivo **.env**
	>
		APP_NAME="App Sefar Universal"
		APP_ENV=production
		APP_KEY=base64:LsfuS5WhYfAe/FWDLdrzXFWacnFB4EgNIHBHo8ZzOSk=
		APP_DEBUG=false
		APP_URL=https://app.universalsefar.com

		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=sefar
		DB_USERNAME=pxvim6av41qx
		DB_PASSWORD="L5=Rj#8lW}YuK"

		ONIDEX_CONNECTION=mysql
		ONIDEX_HOST=127.0.0.1
		ONIDEX_PORT=3306
		ONIDEX_DATABASE=onidex
		ONIDEX_USERNAME=pxvim6av41qx
		ONIDEX_PASSWORD="L5=Rj#8lW}YuK"

		MAIL_MAILER=smtp
		MAIL_HOST=universalsefar.com
		MAIL_PORT=587
		MAIL_USERNAME=app@universalsefar.com
		MAIL_PASSWORD=Madrid2021!
		MAIL_ENCRYPTION=null
		MAIL_FROM_ADDRESS=app@universalsefar.com
		MAIL_FROM_NAME="${APP_NAME}"

1. Para configurar Laravel (AppSefar) con Gmail (info@sefarvzla.com)
	>
		MAIL_MAILER=smtp
		MAIL_HOST=smtp.gmail.com
		MAIL_PORT=465
		MAIL_USERNAME=info@sefarvzla.com
		MAIL_PASSWORD=tmizoofcenmauman
		MAIL_ENCRYPTION=ssl
		MAIL_FROM_ADDRESS=info@sefarvzla.com
		MAIL_FROM_NAME="${APP_NAME}"

		MAIL_MAILER=smtp
		MAIL_HOST=smtp.gmail.com
		MAIL_PORT=465
		MAIL_USERNAME=info@sefarvzla.com
		MAIL_PASSWORD=tmizoofcenmauman
		MAIL_ENCRYPTION=ssl
		MAIL_FROM_ADDRESS=info@sefarvzla.com
		MAIL_FROM_NAME="${APP_NAME}"
		
	Luego direccionar
	>
		https://app.universalsefar.com/config-clear
1. Direccionar las siguientes rutas:
	>
		https://app.universalsefar.com/storage-link
	##### Esta acción simula la instrucción artisan **$ php artisan storage:link** para crear un enlace simbólico de public a storage. Verifique que no exista carpeta o acceso directo en **public** con el nombre **storage**, de ser así, elimínelo.
		https://app.universalsefar.com/config-cache
	##### Esta acción simula la instrucción artisan **php artisan config:cache** para borrar la caché de la configuración anterior.
	
	### **Nota**: De aquí en adelante, cada vez que se realicen cambios en local se deberán seguir los siguientes pasos para que se reflejen en producción:
	+ En local ejecutar:
		>
			$ git add .
			$ git commit -m "Descripción de los cambios"
			$ git push -u origin master
	+ En el cPanel:
		- Ingresar al cPanel con https://a2plcpnl0082.prod.iad2.secureserver.net:2083/
			###### pxvim6av41qx / Cisco2019!
		- En la sección **ARCHIVOS** ir a **Git™ Version Control**.
		- Administrar el repositorio **AppSefarUniversal**.
		- Ir a la pestaña **Pull or Deploy**.
		- Presionar el botón **Update from Remote**.



# **Notas de interes**

## Regresar a un commit anterior
1. Ver historia de commit:
	>
		$ git log --pretty=oneline
1. Seleccionar el commit al cual queremos regresar:
	>
		$ git reset --hard <commit-id>

## Para limpiar el cache
1. Ejecutar:
	>
		$ php artisan config:cache 
		$ php artisan cache:clear

## Preparando proyecto para producción
1. Limpiar el caché de la Aplicación.
 	$ php artisan cache:clear 
2. Limpiar las rutas de la Aplicación.
 	$ php artisan route:clear  
3. Limpiar las configuraciones de la Aplicación.
 	$ php artisan config:clear 
4. Limpiar las vistas de la Aplicación.
 	$ php artisan view:clear

## Crear helper personalizado
1. Crear helper **app\helper\sefar.php**
	>
		≡
		≡
1. Modificar **composer.json** para agregar el helper **app\helper\sefar.php**
	>
		≡
		"autoload": {
			"psr-4": {
				"App\\": "app/",
				"Database\\Factories\\": "database/factories/",
				"Database\\Seeders\\": "database/seeders/"
			},	
			"files": [
				"app/helper/sefar.php"
			]
		},
		≡
1. Ejecutar:
	>
		$ composer dump-autoload
1. Configurar **config\adminlte.php** para crear un menú para pruebas:
	>
		≡
		≡
1. Crear archivo de estilo **public\css\prueba_flex.css**
	>
		≡
		≡
1. Si no se reflejan los cambios ejecutar:
	>
		$ php artisan config:cache

## Configuración de conexión a MySQL Hosting
1. Configuración de **.env**:
	>
		≡
		DB_CONNECTION=mysql
		DB_HOST=107.180.2.195
		DB_PORT=3306
		DB_DATABASE=universalsefar
		DB_USERNAME=pxvim6av41qx
		DB_PASSWORD="L5=Rj#8lW}YuK"
		≡
	IP pública:
	+ https://www.cual-es-mi-ip.net

## Colores Sefar:
+ Rojo: R:121 G:22 B:15
+ Verde: R:22 G:43 B:27
+ Amarillo: R:247 G:176 B:52
+ Gris: R:63 G:61 B:61

## Tablas a reponer al restaurar base de datos:
+ agclientes
+ books
+ families
+ libraries

## Para publicar y personalizar páginas de errores http. 
+ $ php artisan vendor:publish --tag=laravel-errors
+ **Nota**: las vistas para manejar los errores se ubicaran en **resources\views\errors**.


## Incluir destinatarios en las notificaciones:
1. Archivos a modificar para incluir destinatarios en las notificaciones:
	+ Registro: app\Actions\Fortify\CreateNewUser.php
	+ Actualización: app\Http\Controllers\ClienteController.php


## Clonar el repositorio AppSefarUniversal desde GitHub
1. Clonar repositorio en local:
	+ $ git clone https://github.com/petrix12/AppSefarUniversal.git
	**Nota 1**: En mi caso el repositorio lo clonaré en **C:\xampp\htdocs** y luego cambiaré el nombre de **AppSefarUniversal** a **sefar**.
	**Nota 2**: Para este ejercicio se está utilizando **XAMPP** como entorno de desarrollo, en caso de utilizar otro entorno como **Laragon** o **WAMPServer** realizar las modificaciones correspondiente a cada caso.
2. Ejecutar una terminal en el proyecto recién creado y ejecutar los siguientes comandos desde esa ruta.
3. Instalar dependencias de **PHP** y **NPM**:
	+ $ composer install
	+ $ npm install
	**Nota**: en caso de presentarse vulnerabilidades ejecutar (**Revisar esta solución más a fonndo**):
	+ $ npm install -g npm@latest		(para actualizar NPM)
	+ $ npm cache clean --force			(borrar la cache de NPM)
	+ $ npm set audit false				(desactivar las auditorias de NPM)
4. En caso de no tener creada las bases de datos **sefar** y **onidex** en MySQL, entonces proceder a crearlas (juego de caracteres a utilizar para ambas: **utf8_general_ci**) y seguir los siguientes pasos:
	+ $ php artisan migrate:fresh --seed
	+ Importar a la base de datos **sefar** en local la estructura de la tabla **agclientes** desde la base de datos **sefar** del servidor de producción ya que esta tabla no se creará. En caso de querer traerte el proyecto completo entonces exportarla con sus datos.
	+ Importar a la base de datos **onidex** en local la estructura de la tabla **agclientes** desde la base de datos **sefar** del servidor de producción ya que esta tabla no se creará. En caso de querer traerte el proyecto completo entonces exportarla con sus datos.
5. Copiar la siguiente ruta de acceso relativa del servidor de producción al local:
	+ storage\app\public
	**Nota**: en caso de pretender instalar el proyecto vacio, entonces traerse solo la estructura de directorios.
6. En caso de no tener un host virtual creado para nuestro proyecto, seguir los siguientes pasos:
	1. Ejecutar el bloc de notas como administrador.
    2. Abrir el archivo: **C:\Windows\System32\drivers\etc\hosts**.
    3. En la parte final del archivo escribir:
		```
		127.0.0.1     sefar.test
		```
    4. Guardar y cerrar.
    5. Editar con el bloc de notas el archivo: **C:\xampp\apache\conf\extra\httpd-vhosts.conf**.
    6. Ir al final del archivo y anexar lo siguiente:
        + Si nunca has creado un virtual host agregar:
			```conf
			<VirtualHost *>
				DocumentRoot "C:\xampp\htdocs"
				ServerName localhost
			</VirtualHost>
			```
			**Nota**: Esta estructura se agregará una única vez.
        + Luego agregar:
			```conf
			<VirtualHost *>
			DocumentRoot "C:\xampp\htdocs\sefar\public"
			ServerName sefar.test
			<Directory "C:\xampp\htdocs\sefar\public">
				Options All
				AllowOverride All
				Require all granted
			</Directory>
			</VirtualHost>
        	```
    7. Guardar y cerrar.
    8. Apagar y encender el servidor Apache.
    **Nota 1**: ahora podemos ejecutar nuestro proyecto en el navegador introduciendo la siguiente dirección: http://sefar.test
    **Nota 2**: En caso de que no funcione el enlace, cambiar en el archivo **C:\xampp\apache\conf\extra\httpd-vhosts.conf** el segmento de código **<VirtualHost \*>** por **<VirtualHost *:80>**.
7. Crear el archivo de variables de entorno **.env** en la raíz del proyecto:
	```
	APP_NAME="App Sefar Universal"
	APP_ENV=local
	APP_KEY=
	APP_DEBUG=true
	APP_URL=http://sefar.test

	LOG_CHANNEL=stack
	LOG_LEVEL=debug

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=sefar
	DB_USERNAME=root
	DB_PASSWORD=

	ONIDEX_CONNECTION=mysql
	ONIDEX_HOST=127.0.0.1
	ONIDEX_PORT=3306
	ONIDEX_DATABASE=onidex
	ONIDEX_USERNAME=root
	ONIDEX_PASSWORD=

	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	QUEUE_CONNECTION=sync
	SESSION_DRIVER=database
	SESSION_LIFETIME=120

	MEMCACHED_HOST=127.0.0.1

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_MAILER=smtp
	MAIL_HOST=smtp.mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=7c67f786972696
	MAIL_PASSWORD=8f37b2d25228ba
	MAIL_ENCRYPTION=tls
	MAIL_FROM_ADDRESS=app.web@sefarvzla.com
	MAIL_FROM_NAME="${APP_NAME}"

	AWS_ACCESS_KEY_ID=
	AWS_SECRET_ACCESS_KEY=
	AWS_DEFAULT_REGION=us-east-1
	AWS_BUCKET=

	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=
	PUSHER_APP_CLUSTER=mt1

	MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
	MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

	VAR_TMP='inicial'
	```
7. Generar clave para la variable de entorno **APP_KEY**:
	+ $ php artisan key:generate
8. Generar acceso directo (enlace simbólico) de public a storage:
	+ $ php artisan storage:link
