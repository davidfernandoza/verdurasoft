<?php
include('../conexion.php');
$email = $_POST['email'];
$password = $_POST['password'];

$query= "SELECT * FROM usuarios WHERE email = '$email' AND estado = 'activo';";
$consulta = mysqli_query($conexion, $query);

if ($consulta->num_rows != 0) {
  $consulta = mysqli_fetch_array($consulta);
  $hash_BD = $consulta['password'];

  if (password_verify($password, $hash_BD)) {
    session_start();
    session_destroy();
    session_start();
  	$_SESSION['id_usuario'] = $consulta['id'];
    $_SESSION['nombres'] = $consulta['nombre'];
    $_SESSION['apellidos'] = $consulta['apellido'];
    echo '<script languaje="javascript">
      var mensaje ="Bienvenido ' . $consulta['nombre'] . ' ' . $consulta['apellido'] .'";
      alert(mensaje);
      window.location.href= "../../"
      </script>';
  }
  else {
    echo '<script languaje="javascript">
      var mensaje ="Credenciales incorrectas";
      alert(mensaje);
      window.location.href= "../../public/views/login/login.usuario.php"
      </script>';
  }
}
else {
  echo '<script languaje="javascript">
    var mensaje ="Credenciales incorrectas.";
    alert(mensaje);
    window.location.href= "../../public/views/login/login.usuario.php"
    </script>';
}
?>
