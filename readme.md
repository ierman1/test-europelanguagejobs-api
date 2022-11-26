# Test Europe Language Jobs 
## API

Las rutas definidas por esta API son:

<pre>
(GET) /dogs -> Devuelve una lista con todos los perros.
(GET) /dogs/{id} -> Devuelve todos los datos de un perro concreto.
(POST) /dogs -> Inserta un perro en la base de datos.

(GET) /breeds -> Devuelve una lista con todas las razas de perros.
</pre>

La aplicación tiene un set de datos de prueba ejecutando: <pre>php artisan db:seed</pre>

Es necesario ejectuar el siguiente comando para crear un symbolic link entre la carpeta public y storage: <pre>php artisan storage:link</pre>

La versión de cliente se encuentra [aquí](https://github.com/ierman1/test-europelanguagejobs-client)
