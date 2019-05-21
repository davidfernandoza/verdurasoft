<?php
include('../conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
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
?>
