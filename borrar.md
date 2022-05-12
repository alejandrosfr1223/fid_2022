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

