<?php
include('../conexion.php');
$id = $_POST['id'];
$usuarios_id = $_POST['usuarios_id'];
$productos_id = $_POST['productos_id'];
$factura = $_POST['factura'];
$cantidad = $_POST['cantidad'];
$valor = $_POST['valor'];
$estado = $_POST['estado'];

$query= "UPDATE `compras` SET `usuarios_id` = '".$usuarios_id.", `productos_id` = '".$productos_id."', `factura` = '".$factura."', `cantidad` = '".$cantidad."', `valor` = '".$valor."', `estado` = '".$estado."' WHERE `compras`.`id` = '".$id."' ";

$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="La compra fue ACTUALIZADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php";
	</script>';


?>
