# Biblioteca virtual
Este es un software de una aplicacion de biblioteca virtual


## Configuracion
Para poder configurar esta aplicacion debes editar los siguientes ficheros:

- phplibraries/database.php --> Deberas introducir los datos de tu database
- html/API/.htaccess --> Poner la ruta absulata al .htpasswd adjunto o al que quieras usar
- html/API/admintools/.htaccess --> Poner la ruta absulata al .htpasswd adjunto o al que quieras usar

## Usuarios predeterminados
Los usuarios predeterminados la API son estos:

- Para la base de la API apiuse:apiuse
- Para las admintools aminapiuse:adminapiuse

El usuario para la parte administrativa predeterminado es:

- admin:admin

## Recomendaciones de seguridad
Recomendamos cambiar los usuarios default y sus contraseñas, ademas de configurar los nuevos tokens en phplibraries/apiaccess.php los tokens son el usuario y la contraseña codificados en base64 ejemplo `apiuse:apiuse` es `YXBpdXNlOmFwaXVzZQ==`

## Autores
- Ignacio Martinez
- Camilo Garatejo
