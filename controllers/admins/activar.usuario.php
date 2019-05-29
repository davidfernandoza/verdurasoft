<?php
include('../conexion.php');
$id = $_GET['id'];

$query= "UPDATE usuarios set estado ='activo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
if ($consulta) {
echo '<script languaje="javascript">
	var mensaje ="El usuario fue activado correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php"
	</script>';
}
else {
	echo '<script languaje="javascript">
	var mensaje ="El usuario no se pudo activar, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php"
	</script>';
}

?>
