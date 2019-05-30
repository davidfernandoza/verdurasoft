<?php
require '../phpMailer/SendEmail.php';
$SendEmail = new SendEmail;

// Quien envia el mensaje
$nombreFrom = $_POST['nombre_from'];
$emailFrom = $_POST['email_from'];

// Quien resive el mensaje
$nombreSend = $_POST['nombre_send'];
$emailSend = $_POST['email_send'];

$mensaje = $_POST['mensaje'];
$asunto = $_POST['asunto'];

$respuesta = $SendEmail->email($nombreFrom, $emailFrom, $nombreSend, $emailSend, $mensaje, $asunto);

if ($respuesta == 200) {
  echo '<script languaje="javascript">
  var mensaje ="Mensaje enviado correctamente. Habra una respuesta en tu correo en un plazo de 24 horas.";
  alert(mensaje);
  window.location.href= "../../"
  </script>';
}
else{
  echo '<script languaje="javascript">
  var mensaje ="Problemas al enviar el mensaje, intenta mas tarde.";
  alert(mensaje);
  window.location.href= "../../"
  </script>';
}

 ?>
