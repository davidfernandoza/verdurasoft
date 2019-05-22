<?php
session_start();
include('./../conexion.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];



$query_validator = "SELECT * FROM usuarios WHERE email = '$email'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows != 0) {
	$consulta_validator = mysqli_fetch_array($consulta_validator);
	if ($consulta_validator['id'] != $id) {

		echo '<script languaje="javascript">
		var mensaje ="El correo ya esta en uso, busca otro.";
		alert(mensaje);
		window.location.href= "../../public/views/login/editar.usuario.php?id='.$id.'"
		</script>';
	}
}
else {
	if ($password == $confirPassword) {

		$opciones = [  'cost' => 12, ];
		$password = password_hash($password, PASSWORD_BCRYPT, $opciones);
		$query= "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email', password = '$password', direccion = '$direccion', telefono = '$telefono', estado = 'activo' WHERE id ='$id';";

		$consulta = mysqli_query($conexion,$query);
		if ($consulta) {
			$_SESSION['nombres'] = $nombre;
			$_SESSION['apellidos'] = $apellido;
			echo '<script languaje="javascript">
			var mensaje ="Usuario editado correctamente.";
			alert(mensaje);
			window.location.href= "../../"
			</script>';
		}
		else {
			echo '<script languaje="javascript">
			var mensaje ="Problemas al editar el usuario, intentalo mas tarde.";
			alert(mensaje);
			window.location.href= "../../public/views/login/editar.usuario.php?id='.$id.'"
			</script>';
		}

	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="Las contraseñas no coinciden.";
		alert(mensaje);
		window.location.href= "../../public/views/login/editar.usuario.php?id='.$id.'"
		</script>';
	}
}
?>
