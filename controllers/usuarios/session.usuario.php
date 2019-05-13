<?php
include('../conexion.php');
$email = $_POST['email'];
$password = $_POST['password'];

$query= "SELECT * FROM usuarios WHERE email = '$email';";
$consulta = mysqli_query($conexion, $query);

if ($consulta){
  $consulta = mysqli_fetch_row($consulta);
  $hash_BD = $consulta[4];

  if (password_verify($password, $hash_BD)) {
    session_start();
  	$_SESSION['id_usuario'] = $consulta[0];
    $_SESSION['nombres'] = $consulta[1];
    $_SESSION['apellidos'] = $consulta[2];
    echo '<script languaje="javascript">
      var mensaje ="Bienvenido ' . $consulta[1] . ' ' . $consulta[2] .'";
      alert(mensaje);
      window.location.href= "../../public/views/carrito/carrito.php"
      </script>';
  }
  else {
    echo '<script languaje="javascript">
      var mensaje ="La contraseña no es válida.";
      alert(mensaje);
      window.location.href= "../../public/views/login/login.usuario.php"
      </script>';
  }
}
else {
  echo '<script languaje="javascript">
    var mensaje ="El usuario no existe";
    alert(mensaje);
    window.location.href= "../../public/views/login/login.usuario.php"
    </script>';
}
?>
