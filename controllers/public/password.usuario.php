<?php
require '../phpMailer/SendEmail.php';
require '../conexion.php';
$SendEmail = new SendEmail;


$email = $_POST['email'];
$query = "SELECT * FROM usuarios WHERE email = '$email' AND estado = 'activo'";
$consulta = mysqli_query($conexion, $query);
if ($consulta->num_rows != 0) {
  $consulta = mysqli_fetch_array($consulta);
  $password_num = rand();
  $opciones = [  'cost' => 12, ];
  $password = password_hash($password_num, PASSWORD_BCRYPT, $opciones);

  $query = "UPDATE usuarios SET password = '$password' WHERE email = '$email'";
  $consulta_update = mysqli_query($conexion, $query);

  if ($consulta_update) {

    // Quien envia el mensaje
    $nombreFrom = 'VerduraSoft';
    $emailFrom = 'verdurasoft@gmail.com';

    // Quien resive el mensaje
    $nombreSend = $consulta['nombre'].' '.$consulta['apellido'];
    $emailSend = $consulta['email'];


    $mensaje = 'Ten un caluroso saludo de VerduraSoft tu distribuidor de verduras online, por lo que hemos notado se te ha olvidado la contraseña ¿cierto?. No hay ningún problema, se te restauro la contraseña olvidada por otra temporal. Puedes iniciar sesión con tu correo: <strong>"'.$consulta['email'].'"</strong> y esta contraseña: <strong>"'.$password_num.'"</strong>. <br> <strong>NO OLVIDES CAMBIAR DE CONTRASEÑA CUANDO ESTÉS DENTRO DE VERDURASOFT.</strong>';
    $asunto = 'Restablecimiento de password: ';

    $respuesta = $SendEmail->email($nombreFrom, $emailFrom, $nombreSend, $emailSend, $mensaje, $asunto);

    if ($respuesta == 200) {
      echo '<script languaje="javascript">
      var mensaje ="Contraseña enviada a su correo exitosamente.";
      alert(mensaje);
      window.location.href= "../../public/views/login/login.usuario.php"
      </script>';
    }
    else{
      echo '<script languaje="javascript">
      var mensaje ="Hubo un problema al enviar la contraseña a su correo, intenta mas tarde.";
      alert(mensaje);
      window.location.href= "../../public/views/login/password.usuario.php"
      </script>';
    }
  }
}
else{
  echo '<script languaje="javascript">
  var mensaje ="El usuario no existe en nuestra base de datos.";
  alert(mensaje);
  window.location.href= "../../public/views/login/password.usuario.php"
  </script>';
}

?>
