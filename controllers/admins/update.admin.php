<?php
include('../conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$telefono = $_POST['telefono'];

if ($password == $confirPassword) {


	$opciones = [  'cost' => 12, ];
	$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

	$query= "UPDATE admins set nombre ='".$nombre."', apellido='".$apellido."', email='".$email."', password='".$password."', telefono='".$telefono."' WHERE id = '".$id."'";
	$consulta= mysqli_query($conexion,$query);
	echo '<script languaje="javascript">
		var mensaje ="El administrador fue ACTUALIZADO correctamente";
		alert(mensaje);
		window.location.href= "../../admin/views/index.php"
		</script>';
}
else {
	echo '<script languaje="javascript">
	var mensaje ="Las contraseñas no coinciden";
	alert(mensaje);
	window.location.href= "../../views/index.php"
	</script>';
	}

?>
