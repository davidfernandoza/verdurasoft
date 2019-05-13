<?php
include('../conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$estado = $_POST['estado'];

$query= "UPDATE `usuarios` SET `nombre` = '".$nombre."', `apellido` = '".$apellido."', `direccion` = '".$direccion."', `email` = '".$email."', `telefono` = '".$telefono."', `estado` = '".$estado."' WHERE `usuarios`.`id` = '".$id."' ";
$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="El usuario fue ACTUALIZADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php";
	</script>';


?>
