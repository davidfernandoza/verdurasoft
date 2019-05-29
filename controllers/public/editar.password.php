<?php
include('./../conexion.php');

$id = $_POST['id'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$password_old = $_POST['password_old'];

// Validador de correo
$query_validator = "SELECT * FROM usuarios WHERE id = '$id'";
$consulta_validator = mysqli_query($conexion, $query_validator);
$consulta_validator = mysqli_fetch_array($consulta_validator);
if (!password_verify($password_old, $consulta_validator['password'])) {
	echo '<script languaje="javascript">
	var mensaje ="La contraseña actual es incorrecta.";
	alert(mensaje);
	window.location.href= "../../public/views/login/editar.password.php?id='.$id.'"
	</script>';
}
else {

	if ($password == $confirPassword) {

		$opciones = [  'cost' => 12, ];
		$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

		$query= "UPDATE usuarios SET password = '$password' WHERE id ='$id';";

		$consulta = mysqli_query($conexion,$query);
		if ($consulta) {
			echo '<script languaje="javascript">
			var mensaje ="Contraseña cambiada correctamente.";
			alert(mensaje);
			window.location.href= "../../"
			</script>';
		}
		else {
			echo '<script languaje="javascript">
			var mensaje ="Problemas al editar la contraseña, intentalo mas tarde.";
			alert(mensaje);
			window.location.href= "../../public/views/login/editar.password.php?id='.$id.'"
			</script>';
		}

	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="La nueva contraseña no coincide con la confirmación.";
		alert(mensaje);
		window.location.href= "../../public/views/login/editar.password.php?id='.$id.'"
		</script>';
	}
}

?>
