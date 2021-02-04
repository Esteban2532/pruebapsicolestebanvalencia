## Descripcion

Proyecto de reserva de boletas.

## PUNTOS IMPORTANTES.

# Backend

-Leer el README del servidor para configurar y iniciar
-Configurar las variables de entorno de la máquina
-Se configuro con JWT para controlar el acceso a las rutas.


-Rutas publicas
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');
    Route::get('tickets', 'TicketController@index');

-Rutas Privadas
   Route::get('user/{user}', 'UserController@show');
    Route::get('tickets/{ticket}', 'TicketController@show');
    Route::post('compra', 'RecordController@store');

    -


# FRONTED
   -Leer el README del fromtend para configurar y iniciar
   -Se configuro el acceso a rutas protegidas ddel servidor y se guarda en localstorage el token y el usuario.

  -El aplicativo inicia mostrando los eventos.
  -Debe estar registrado para poder ingresar a ver el evento y comprarlo
  -Se cuenta con un login y un módulo de registro para realizar la operación anterior.



  ---Usuario creado en script
   correo: jesteval2532@gmail.com
   contraseña: 123456789






