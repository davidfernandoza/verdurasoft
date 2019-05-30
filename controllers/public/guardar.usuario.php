<?php
include('./../conexion.php');
<<<<<<< HEAD
$cc = $_POST['cc'];
=======
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


// validar correo existente.
<<<<<<< HEAD
$query_validator = "SELECT * FROM usuarios WHERE email = '$email' or cc = '$cc'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows != 0) {
	echo '<script languaje="javascript">
	var mensaje ="El usuario ya existe en nuestra base de datos.";
=======
$query_validator = "SELECT * FROM usuarios WHERE email = '$email'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows != 0) {
	echo '<script languaje="javascript">
	var mensaje ="El correo ya esta en uso, busca otro.";
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
	alert(mensaje);
	window.location.href= "../../public/views/login/registro.usuario.php"
	</script>';
}
else {
	if ($password == $confirPassword) {

		// Encriptar password
		$opciones = [  'cost' => 12, ];
		$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

<<<<<<< HEAD
		$query= "INSERT INTO usuarios (id, cc, nombre, apellido, email, password, direccion, telefono, estado)VALUES('0', $cc, '$nombre', '$apellido', '$email' , '$password', '$direccion' , '$telefono', 'activo');";
=======
		$query= "INSERT INTO usuarios (id, nombre, apellido, email, password, direccion, telefono, estado)VALUES('0', '$nombre', '$apellido', '$email' , '$password', '$direccion' , '$telefono', 'activo');";
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772

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
