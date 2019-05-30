<?php
include('../conexion.php');
$id = $_GET['id'];

<<<<<<< HEAD
$query= "UPDATE usuarios set estado ='inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
if ($consulta) {
=======


$query= "UPDATE usuarios set estado ='Inactivo' WHERE id = '".$id."'";
$consulta= mysqli_query($conexion,$query);
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
echo '<script languaje="javascript">
	var mensaje ="El usuario fue ELIMINADO correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php"
	</script>';
<<<<<<< HEAD
}
else {
	echo '<script languaje="javascript">
	var mensaje ="El usuario no se pudo ELIMINAR, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php"
	</script>';
}
=======
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772

?>
