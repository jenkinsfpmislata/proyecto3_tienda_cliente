<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
       <?php   
error_reporting(0);
$contacto = $_POST['contacto'];
$subject= $_POST['subject'];
$mensaje = $_POST['mensaje'];

$header .= "X-Mailer: PHP/" . phpversion() . " rn";
$header .= "Mime-Version: 1.0 rn";
$header .= "Content-Type: text/plain";

$mensaje = "Tipo de contacto : " . $contacto . " rn";
$mensaje .= "Su e-mail es : " . $subject. " rn";
$mensaje .= "Mensaje :" .$mensaje."rn";
$mensaje .= "Enviado el ; " . date('d/m/Y', time());

$para = 'platas21@gmail.com';
$asunto = 'Formulario enviado pagina web Banco';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("location:index.html");

?>
    </body>
</html>