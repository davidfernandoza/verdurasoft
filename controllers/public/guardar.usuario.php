<?php
include('./../conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


// validar correo existente.
$query_validator = "SELECT * FROM usuarios WHERE email = '$email'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows != 0) {
	echo '<script languaje="javascript">
	var mensaje ="El correo ya esta en uso, busca otro.";
	alert(mensaje);
	window.location.href= "../../public/views/login/registro.usuario.php"
	</script>';
}
else {
	if ($password == $confirPassword) {

		// Encriptar password
		$opciones = [  'cost' => 12, ];
		$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

		$query= "INSERT INTO usuarios (id, nombre, apellido, email, password, direccion, telefono, estado)VALUES('0', '$nombre', '$apellido', '$email' , '$password', '$direccion' , '$telefono', 'activo');";

		$consulta = mysqli_query($conexion, $query);

		if ($consulta) {
			echo '<script languaje="javascript">
			var mensaje ="Usuario creado correctamente";
			alert(mensaje);
			window.location.href= "../../public/views/login/login.usuario.php"
			</script>';
		}
		else{
			echo '<script languaje="javascript">
			var mensaje ="Hubo un problema al crear el usuario, intentalo mas tarde.";
			alert(mensaje);
			window.location.href= "../../"
			</script>';
		}
	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="Las contraseñas no coinciden.";
		alert(mensaje);
		window.location.href= "../../public/views/login/registro.usuario.php"
		</script>';
	}
}

?>
