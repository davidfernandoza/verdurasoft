<?php
include('./../conexion.php');

$id = $_POST['id'];
$cc = $_POST['cc'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

// Validador de correo
$query_validator = "SELECT * FROM usuarios WHERE email = '$email'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows != 0) {
	$consulta_validator = mysqli_fetch_array($consulta_validator);

	if ($consulta_validator['id'] != $id) {
		echo '<script languaje="javascript">
		var mensaje ="El correo ya esta en uso, busca otro.";
		alert(mensaje);
		window.location.href= "../../admin/views/user.php"
		</script>';
	}

}

// validador de cc
$query_validator = "SELECT * FROM usuarios WHERE cc = '$cc'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows != 0) {
	$consulta_validator = mysqli_fetch_array($consulta_validator);
	if ($consulta_validator['id'] != $id) {
		echo '<script languaje="javascript">
		var mensaje ="La Cédula o Nit ya esta en uso, busca otro.";
		alert(mensaje);
		window.location.href= "../../admin/views/user.php"
		</script>';
	}

}


		$query= "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email', direccion = '$direccion', telefono = '$telefono', estado = 'activo' WHERE id ='$id';";

		$consulta = mysqli_query($conexion,$query);
		if ($consulta) {
			echo '<script languaje="javascript">
			var mensaje ="Usuario editado correctamente.";
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
		}
		else {
			echo '<script languaje="javascript">
			var mensaje ="Problemas al editar el usuario, intentalo mas tarde.";
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
		}


?>
