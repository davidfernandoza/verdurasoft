<?php
include('../conexion.php');
$id = $_POST['id'];
$id_usuario = $_POST['id_usuario'];
$id_producto = $_POST['id_producto'];
$factura = $_POST['factura'];
$cantidad = $_POST['cantidad'];
$valor = $_POST['valor'];

$query = "INSERT INTO `compras` (`id`, `usuarios_id`, `productos_id`, `factura`, `cantidad`, `valor`, `estado`) VALUES (null, '$id_usuario', '$id_producto', '$factura', '$cantidad', '$valor', 'activo')";

$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="La compra fue agregada correctamente ";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';

?>
