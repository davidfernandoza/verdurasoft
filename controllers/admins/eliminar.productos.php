<?php
include('../conexion.php');
$id = $_GET['id'];

<<<<<<< HEAD
$query= "UPDATE productos set estado ='inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
if ($consulta) {
=======


$query= "UPDATE productos set estado ='Inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
echo '<script languaje="javascript">
	var mensaje ="El producto fue ELIMINADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php"
	</script>';
<<<<<<< HEAD
}
else {
	echo '<script languaje="javascript">
	var mensaje ="El producto no se pudo ELIMINAR, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php"
	</script>';
}
=======
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772

?>
