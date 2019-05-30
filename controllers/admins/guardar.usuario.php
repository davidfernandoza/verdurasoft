<?php
<<<<<<< HEAD
include('./../conexion.php');
$cc = $_POST['cc'];
=======
include('../conexion.php');
$id = $_POST['id'];
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
<<<<<<< HEAD


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
=======
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$contador = 0;
$destinoFoto = '';


$sqli = "SELECT * from usuarios where email = '$email'";
$result = $conexion->query($sqli);
$fila = mysqli_num_rows($result);
if ($fila != 0){
		echo '<script languaje="javascript">
		var mensaje ="El correo ya se encuentra registrado, prueba con otro";
		alert(mensaje);
		window.location.href= "../../admin/views/user.php"
		</script>';
}
else{
	$sqli_id = "SELECT * from usuarios where id = '$id'";
	$result_id = $conexion->query($sqli_id);
	$fila_id = mysqli_num_rows($result_id);
	if ($fila_id != 0){
			echo '<script languaje="javascript">
			var mensaje ="El número de cédula ya se encuentra registrado";
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
		}
<<<<<<< HEAD
		else{
			echo '<script languaje="javascript">
			var mensaje ="Hubo un problema al crear el usuario, intentalo mas tarde.";
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
		}
}

?>
=======
	
	else{

	if ($password == $confirPassword) {

		$opciones = [  'cost' => 12, ];
		$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

		$query = "INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `direccion`, `telefono`, `estado`) VALUES (0, '$nombre', '$apellido', '$email', '$password', '$direccion', '$telefono', 'activo')";

		$consulta= mysqli_query($conexion,$query);
		echo '<script languaje="javascript">
			var mensaje ="El usuario fue creado correctamente ";
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="Las contraseñas no coinciden";
		alert(mensaje);
		window.location.href= "../../admin/views/user.php"
		</script>';
		}
	}
}
		?>
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
