<?php
include('../conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$valor = $_POST['valor'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];

$query= "UPDATE `productos` SET `nombre` = '".$nombre."', `descripcion` = '".$descripcion."', `cantidad` = '".$cantidad."', `valor` = '".$valor."', `estado` = '".$estado."' WHERE `productos`.`id` = '".$id."' ";
$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="El producto fue ACTUALIZADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php";
	</script>';


?>
