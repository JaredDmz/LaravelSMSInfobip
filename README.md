# Infobip envío de SMS Wrapper para Laravel 5.*
Configurar y utilizar de forma sencilla el envío de SMS´s a través de [Infobip](https://www.infobip.com/es).

Solicite este paquete en su composer.json y actualice el compositor o simplemente copia y pega lo siguiente:

    composer require JaredDmz/LaravelSMSInfobip

## Installation
Después de actualizar el editor, agregue el Proveedor de servicios a la matriz de proveedores en config/app.php

    JaredDmz/LaravelSMSInfobip\SMSIProvider::class,
    
Opcionalmente puedes usar la fachada para un código más corto. Añade esto a tus fachadas:

    'SMSI' => JaredDmz/LaravelSMSInfobip\SMSIFacade::class,
    
 ## Uso
__1. Crea 2 nuevas variables globales al final del archivo .env__:
Aquí agregarás tus datos de sesión al portal Infobip para loguearte con la API:

      SMS_USERNAME=''
      SMS_PASSWORD=''

Simplemente llama la fachada en tu archivo PHP y envía 2 parámetros de tipo String, número de teléfono y el mensaje.

      use SMSI;
      
      ...
      
      SMSI::enviar('+520000000000','Hola, gusto en saludarte.');
      
## Respuestas
Para facilitar el uso de este Wrapper y asegurar que el SMS fue enviado, el llamado del mismo te devolverá una respuesta de tipo array de la siguiente forma en caso de ser positivo:

    [
      estatus => 'si',
      mensaje => 'El SMS fue enviado correctamente.'
    ];
    
Ó bien, en caso de ser negativo:

    [
      estatus => 'no',
      mensaje => 'Erorr, al tratar de hacer...'
    ];
Use try, catch en caso de ser necesario para un trato más adecuado de los errores.

### License
Este repositorio está bajo la licencia [MIT license](http://opensource.org/licenses/MIT).
