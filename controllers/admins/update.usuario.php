<?php
<<<<<<< HEAD
include('./../conexion.php');

$id = $_POST['id'];
$cc = $_POST['cc'];
=======
include('../conexion.php');
$id = $_POST['id'];
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
<<<<<<< HEAD

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


=======
$estado = $_POST['estado'];

$sqli_igual = "SELECT email from usuarios WHERE id = '$id'";
$consulta2 = mysqli_query($conexion, $sqli_igual);
$mostrar = mysqli_fetch_array($consulta2);
if ($email != $mostrar['email'] )
{


	$sqli = "SELECT * from usuarios where email = '$email'";
	$result = $conexion->query($sqli);
	$fila = mysqli_num_rows($result);
	if ($fila != 0){
			echo '<script languaje="javascript">
			var mensaje ="El correo ya se encuentra registrado, prueba con otro";
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
	}
	else{
		

		$query= "UPDATE `usuarios` SET `nombre` = '".$nombre."', `apellido` = '".$apellido."', `direccion` = '".$direccion."', `email` = '".$email."', `telefono` = '".$telefono."', `estado` = '".$estado."' WHERE `usuarios`.`id` = '".$id."' ";
		$consulta= mysqli_query($conexion,$query);
		echo '<script languaje="javascript">
		var mensaje ="El usuario fue ACTUALIZADO correctamente";
		alert(mensaje);
		window.location.href= "../../admin/views/user.php";
		</script>';


	}
}
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
?>
