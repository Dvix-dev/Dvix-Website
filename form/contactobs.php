<?php
/*
 *  Configuración
 */

// Dirección de correo que aparerá en el De
$from = 'Servidor AWS <XXX@francisperea.org>';

// Dirección de correo a la que enviar los mensajes
$sendTo = 'Francis Perea <XXX@iesjuandelacierva.edu.es>';

// Asunto de los correos
$subject = 'Mensaje del Formulario de Contacto';

// Nombres de los campos y su descripción para colocar en el cuerpo del correo
// nombre de la variable => Texto del correo
$fields = array('nombre' => 'Nombre', 'apellido' => 'Apellido', 'tipo' => 'Tipo', 'email' => 'Email', 'mensaje' => 'Mensaje'); 

// Mensaje si todo Ok
$okMessage = <<<PAGINAOK
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mensaje enviado</title>
  </head>
 
  <body>
    <h1>Mensaje enviado correctamente. Gracias. Nos pondremos en contacto lo antes posible</h1>
    <a class="btn btn-primary" href="http://XXX.duckdns.org/contacto/indexbs.html">Volver</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
PAGINAOK;

// Mensaje si algo falla
$errorMessage = <<<PAGINAMAL
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Error de envío</title>
  </head>
 
  <body>
    <h1>Lo sentimos pero tu mensaje no  se ha podido enviar. Vuelve a intentarlo pasados unos minutos.</h1>
    <a class="btn btn-primary" href="http://XXX.duckdns.org/contacto/indexbs.html">Volver</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
PAGINAMAL;

/*
 *  Envío
 */

try
{

    if(count($_POST) == 0) throw new \Exception('Formulario vacío');
            
    $emailText = "Tienes un nuevo mensaje a través del formulario de correo\n=============================\n";

    foreach ($_POST as $key => $value) {
        // Si ha llegado un campo desde el formulario, incluirlo en el correo
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // Cabeceras del correo
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    // Enviar el correo y presenta mensaje de resultado
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}
    echo $responseArray['message'];
    
?> 


