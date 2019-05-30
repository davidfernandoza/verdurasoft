<?php
include('../conexion.php');
$id = $_POST['id'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$password_old =$_POST['password_old'];
$hash_BD =$_POST['password_db'];

if (password_verify($password_old, $hash_BD)) {
	
	if ($confirPassword == $password) {
		$opciones = [  'cost' => 12, ];
		$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

		$query= "UPDATE admins SET password = '$password' WHERE id = '".$id."'";
		$consulta = mysqli_query($conexion, $query);
		if ($consulta) {
			echo '<script languaje="javascript">
			var mensaje ="La contraseña fue cambiada correctamente.";
			alert(mensaje);
			window.location.href= "../../admin/views/"
			</script>';
		}
		else {
			echo '<script languaje="javascript">
			var mensaje ="Hubo un problema al cambiar la contraseña, intenta mas tarde.";
			alert(mensaje);
			window.location.href= "../../admin/views/auth/editar.password.php?id='.$id.'"
			</script>';
		}
	}
	else{
		echo '<script languaje="javascript">
		var mensaje ="La nueva contraseña no coincide con la confirmación.";
		alert(mensaje);
		window.location.href= "../../admin/views/auth/editar.password.php?id='.$id.'"
		</script>';
	}
}
else {
	echo '<script languaje="javascript">
	var mensaje ="Contraseña actual incorrecta.";
	alert(mensaje);
	window.location.href= "../../admin/views/auth/editar.password.php?id='.$id.'"
	</script>';
}
?>
