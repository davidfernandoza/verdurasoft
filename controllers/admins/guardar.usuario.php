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
			alert(mensaje);
			window.location.href= "../../admin/views/user.php"
			</script>';
		}
	
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
