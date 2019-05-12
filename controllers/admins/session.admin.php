<?php
// cunado se redireccione  para la pagina de Inicio del administrador, por favor agragar a la url #mostrar tal cual esta ahi porfis att Nicol




include('../conexion.php');
$email = $_POST['email'];
$password = $_POST['password'];

$query= "SELECT * FROM admins WHERE email = '$email';";
$consulta = mysqli_query($conexion, $query);

if ($consulta){
  $consulta = mysqli_fetch_row($consulta);
  $hash_BD = $consulta[5];

  if (password_verify($password, $hash_BD)) {
    echo '¡La contraseña es válida!';
  }
	else {
    echo 'La contraseña no es válida.';
  }
}
else {
  echo 'El administrador no existe';
}
?>
