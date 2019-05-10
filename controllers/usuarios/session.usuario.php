<?php
include('../conexion.php');
$email = $_POST['email'];
$password = $_POST['password'];

$query= "SELECT * FROM usuarios WHERE email = '$email';";
$consulta = mysqli_query($conexion, $query);

if ($consulta){
  $consulta = mysqli_fetch_row($consulta);
  var_dump($consulta[4]);
  $hash_BD = $consulta[4];

  if (password_verify($password, $hash_BD)) {
    echo '¡La contraseña es válida!';
  }
  else {
    echo 'La contraseña no es válida.';
  }
}
else {
  echo 'El usuario no existe';
}
?>
