<?php
include('../conexion.php');
<<<<<<< HEAD
$factura = $_GET['factura'];

$query= "UPDATE compras set estado ='inactivo' WHERE factura = '".$factura."'";
=======
$id = $_GET['id'];

$query= "UPDATE compras set estado ='inactivo' WHERE id = '".$id."'";
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
$consulta= mysqli_query($conexion,$query);
if ($consulta) {
	echo '<script languaje="javascript">
	var mensaje ="La compra fue ELIMINADA correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';
}
else {
	echo '<script languaje="javascript">
	var mensaje ="La compra no se pudo ELIMINAR, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';
}
?>
