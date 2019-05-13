<?php
// cunado se redireccione  para la pagina de Inicio del administrador, por favor agragar a la url #mostrar tal cual esta ahi porfis att Nicol
include('../conexion.php');
$id = $_POST['id'];
$password = $_POST['password'];
$query= "SELECT * FROM admins WHERE id = '$id';";
$consulta = mysqli_query($conexion, $query);
if ($consulta){
  $consulta = mysqli_fetch_row($consulta);
  $hash_BD = $consulta[5];
  if (password_verify($password, $hash_BD)) {
  	session_start();
  	$_SESSION['ident'] = $id;
   echo '<script languaje="javascript">
		window.location.href= "../../admin/views/index.php#mostrar"
		</script>';
  }
	else {
    echo '<script languaje="javascript">
    var mensaje ="Contraseña incorrecta";
    alert(mensaje);
    window.location.href= "../../admin/index.php"
    </script>';

  }
}
else {
  echo '<script languaje="javascript">
    var mensaje ="El administrador no existe";
    alert(mensaje);
    window.location.href= "../../admin/index.php"
    </script>';

}
?>
