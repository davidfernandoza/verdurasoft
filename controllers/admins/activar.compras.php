<?php
include('../conexion.php');
$factura = $_GET['factura'];

$query= "UPDATE compras set estado ='activo' WHERE factura = '".$factura."'";
$consulta= mysqli_query($conexion,$query);
if ($consulta) {
	echo '<script languaje="javascript">
	var mensaje ="La compra fue activada correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';
}
else {
	echo '<script languaje="javascript">
	var mensaje ="La compra no se pudo activar, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';
}
?>
