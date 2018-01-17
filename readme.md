

##Rutas y controlador
las rutas se crean en /routes/web.php

al final de todo estan las rutas del frontend

Route::get('/checkout', 'HomeController@checkout')->name('frontend.checkout');

[Route::get] ---> Nueva ruta y su metodo. puede ser get o post

['/checkout'] --> El prfijo de la url

['HomeController@checkout']  ---> El controlador que se encarga de atender la peticion.
[->name('frontend.checkout')]  --> El nombre amigable que se le puede darle para luego usar en vistas o funciones como url('frontend.checkout')



#Configurar el archivo .env  
(hay un env.example que podes usar de guia y luego se renombra a .env)

para la base de datos es algo asi:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=nombre-de-tu-bd
DB_USERNAME=root
DB_PASSWORD=112358

##Generar Key

php artisan key:generate
Sino vas a recibir un msg tipo: No application encryption key has been specified.

##Generar la base de datos:
php artisan migrate

##Seed
Para crear un usar admin y roles de user para el backend y front:

php artisan db:seed

##Correr servidor local
Luego con php artisan serve ya se podria probar en localhost:8000



[Gabriel Hubermann | Hubermann.com | hubermann@gmail.com](hubermann.com).










