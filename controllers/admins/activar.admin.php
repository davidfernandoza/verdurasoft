<?php
include('../conexion.php');
$id = $_GET['id'];

$query= "UPDATE admins set estado ='activo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
if ($consulta) {
echo '<script languaje="javascript">
	var mensaje ="El administrador fue ACTIVADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/admin.php"
	</script>';
}
else {
	echo '<script languaje="javascript">
	var mensaje ="El administrador no se pudo ACTIVAR, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/admin.php"
	</script>';
}

?>
