<?php
include('../conexion.php');
$id = $_GET['id'];



$query= "UPDATE compras set estado ='Inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="La compra fue ELIMINADA correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';

?>
