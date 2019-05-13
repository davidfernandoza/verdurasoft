<?php
include('../conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$contador = 0;
$destinoFoto = '';


if ($password == $confirPassword) {

	$opciones = [  'cost' => 12, ];
	$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

	$query = "INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `direccion`, `telefono`, `estado`) VALUES ('$id', '$nombre', '$apellido', '$email', '$password', '$direccion', '$telefono', 'activo')";

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
	?>
	