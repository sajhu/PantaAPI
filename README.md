PantaAPI
========

![alt tag](http://wheels.comoj.com/panta.png)

El servidor de Panta, expone servicios REST al público


Base del Protocolo
El protocolo funciona mediante peticiones REST por HTTP en GET. En todo caso las respuestas están codificadas en objetos Json. La respuesta está en tipo MIME application/json codificado en UTF-8.
Todos los objetos respuesta tienen el atributo entero response que identifica el código de estado

Parámetros básicos

Estos parámetros deben ser utilizados en todos los pedidos realizados, de lo contrario se retornará error AUTH_REQUIRED.
	userId: 		código subrrogado de identificación del usuario actual.
	userSecret: 	token de sesión utilizado para autenticar

En las distintas opciones de parámetros ofrecidas, la opción por defecto se encuentra en negrilla.
