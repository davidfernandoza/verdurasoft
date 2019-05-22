<?php
include('../conexion.php');
$id = $_GET['id'];

$query= "UPDATE compras set estado ='inactivo' WHERE id = '".$id."'";
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
