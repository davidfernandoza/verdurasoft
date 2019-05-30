<?php
include('../conexion.php');
$email = $_POST['email'];
$password = $_POST['password'];

$query= "SELECT * FROM usuarios WHERE email = '$email' AND estado = 'activo';";
$consulta = mysqli_query($conexion, $query);

if ($consulta->num_rows != 0) {
<<<<<<< HEAD
  $consulta = mysqli_fetch_array($consulta);
  $hash_BD = $consulta['password'];
=======
  $consulta = mysqli_fetch_row($consulta);
  $hash_BD = $consulta[4];
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772

  if (password_verify($password, $hash_BD)) {
    session_start();
    session_destroy();
    session_start();
<<<<<<< HEAD
  	$_SESSION['id_usuario'] = $consulta['id'];
    $_SESSION['nombres'] = $consulta['nombre'];
    $_SESSION['apellidos'] = $consulta['apellido'];
    echo '<script languaje="javascript">
      var mensaje ="Bienvenido ' . $consulta['nombre'] . ' ' . $consulta['apellido'] .'";
=======
  	$_SESSION['id_usuario'] = $consulta[0];
    $_SESSION['nombres'] = $consulta[1];
    $_SESSION['apellidos'] = $consulta[2];
    echo '<script languaje="javascript">
      var mensaje ="Bienvenido ' . $consulta[1] . ' ' . $consulta[2] .'";
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
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
