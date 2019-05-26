<?php
include('../conexion.php');
$id = $_GET['id'];

$query= "UPDATE productos set estado ='inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
if ($consulta) {
echo '<script languaje="javascript">
	var mensaje ="El producto fue ELIMINADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php"
	</script>';
}
else {
	echo '<script languaje="javascript">
	var mensaje ="El producto no se pudo ELIMINAR, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php"
	</script>';
}

?>
