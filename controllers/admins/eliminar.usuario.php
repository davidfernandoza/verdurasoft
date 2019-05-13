<?php
include('../conexion.php');
$id = $_GET['id'];



$query= "UPDATE usuarios set estado ='Inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="El usuario fue ELIMINADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php"
	</script>';

?>
