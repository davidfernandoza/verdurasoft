<?php
include('../conexion.php');
$id = $_GET['id'];



$query= "UPDATE admins set estado ='Inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="El administrador fue ELIMINADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/admin.php"
	</script>';

?>
