Panta API
========

![alt tag](http://wheels.comoj.com/panta.png)

El servidor de Panta, expone servicios REST al público


Base del Protocolo
------------------
El protocolo funciona mediante peticiones REST por HTTP en GET. En todo caso las respuestas están codificadas en objetos Json. La respuesta está en tipo MIME application/json codificado en UTF-8.
Todos los objetos respuesta tienen el atributo entero response que identifica el código de estado

Parámetros básicos
------------------

Estos parámetros deben ser utilizados en todos los pedidos realizados, de lo contrario se retornará error AUTH_REQUIRED.
- `userId`: 		código subrrogado de identificación del usuario actual.
- `userSecret`: 	token de sesión utilizado para autenticar

En las distintas opciones de parámetros ofrecidas, la opción por defecto se encuentra en negrilla.

Peticiones
==========
Las peticiones retornarán un objeto JSON con el resultado de la consulta o un objeto de estado con el código de error.

Lista de Rutas
--------------
Permite solicitar una lista completa de las rutas disponibles
`http://panta.co/api/trips/[params]`
`http://wheels.comoj.com/api/trips.php?userId=1&time=1600`

_Parámetros Opcionales_
- `time` _Permite filtrar por la hora del viaje. Retorna todos los viajes a partir de ese momento. En formato militar, concatenando los 4 dígitos de la hora en un número en formato_ `HHMM`.
- `hashtag` _Permite filtrar por publicaciones que contengan el/los hashtags pedidos._
	- `valor` un hashtag para filtrar, no debe llevar el carácter #
	- `valor1,[..],valorN` filtro AND de los valores dados separados por coma

- `date` _fecha en que se están pidiendo los viajes, restringido a uno o dos días._
	- `today` el día actual según el horario del servidor
	- `tomorrow` el día siguiente según horario del servidor
	- `both` los viajes para el día actual y el siguiente
	- `AAAA/MM/DD` especificar una fecha en específico en el orden de MySQL
