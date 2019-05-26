<?php
include('../conexion.php');
$id = $_GET['id'];
$cantidad = $_GET['cantidad'];

if ($cantidad > 0) {
	$query= "UPDATE productos set estado ='activo' WHERE id = '".$id."'";
	$consulta= mysqli_query($conexion,$query);
	if ($consulta) {
		echo '<script languaje="javascript">
		var mensaje ="El producto fue ACTIVADO correctamente";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php"
		</script>';
	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="El producto no se pudo ACTIVAR, intenta mas tarde.";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php"
		</script>';
	}
}
else {
	echo '<script languaje="javascript">
	var mensaje ="El producto no se puede ACTIVAR ya que no existen unidades.";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php"
	</script>';
}

?>
