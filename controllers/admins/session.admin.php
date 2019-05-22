<?php
include('../conexion.php');
$id = $_POST['id'];
$password = $_POST['password'];


$query= "SELECT * FROM admins WHERE id = '$id' AND estado = 'activo';";
$consulta = mysqli_query($conexion, $query);

if ($consulta->num_rows > 0){
  $consulta = mysqli_fetch_row($consulta);
  $hash_BD = $consulta[5];
  if (password_verify($password, $hash_BD)) {
    session_start();
    session_destroy();
  	session_start();
  	$_SESSION['ident'] = $id;

   echo '<script languaje="javascript">
		window.location.href= "../../admin/views/index.php#mostrar"
		</script>';
  }
	else {
    echo '<script languaje="javascript">
    var mensaje ="Credenciales incorrectas.";
    alert(mensaje);
    window.location.href= "../../admin/index.php"
    </script>';

  }
}
else {
  echo '<script languaje="javascript">
    var mensaje ="Credenciales incorrectas.";
    alert(mensaje);
    window.location.href= "../../admin/index.php"
    </script>';

}
?>
