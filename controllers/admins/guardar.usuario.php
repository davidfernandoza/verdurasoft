<?php
include('./../conexion.php');
$cc = $_POST['cc'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


// validar correo o cc existente.
$query_validator = "SELECT * FROM usuarios WHERE email = '$email' or cc = '$cc'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows != 0) {
	echo '<script languaje="javascript">
	var mensaje ="El usuario ya existe en nuestra base de datos.";
	alert(mensaje);
	window.location.href= "../../admin/views/user.php"
	</script>';
}
else {

		// Encriptar password
		$opciones = [  'cost' => 12, ];
		$password = password_hash($cc, PASSWORD_BCRYPT, $opciones);

		$query= "INSERT INTO usuarios (id, cc, nombre, apellido, email, password, direccion, telefono, estado)VALUES('0', $cc, '$nombre', '$apellido', '$email' , '$password', '$direccion' , '$telefono', 'activo');";

		$consulta = mysqli_query($conexion, $query);

		if ($consulta) {
			echo '<script languaje="javascript">
			var mensaje ="Usuario creado correctamente";
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
		}
		else{
			echo '<script languaje="javascript">
			var mensaje ="Hubo un problema al crear el usuario, intentalo mas tarde.";
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
		}
}

?>
