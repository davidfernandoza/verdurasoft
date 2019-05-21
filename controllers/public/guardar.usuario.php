<?php
include('./../conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


$sqli = "SELECT * from usuarios where email = '$email'";
$result = $conexion->query($sqli);
$fila = mysqli_num_rows($result);
if ($fila != 0){
		echo '<script languaje="javascript">
		var mensaje ="El correo ya se encuentra registrado, prueba con otro";
		alert(mensaje);
		window.location.href= "../../public/views/login/registro.usuario.php"
		</script>';
}
else{
	if ($password == $confirPassword) {

		$opciones = [  'cost' => 12, ];
		$password = password_hash($password, PASSWORD_BCRYPT, $opciones);
		$query= "INSERT INTO usuarios (id, nombre, apellido, email, password, direccion, telefono, estado)VALUES('0', '$nombre', '$apellido', '$email' , '$password', '$direccion' , '$telefono', 'activo');";

		$consulta= mysqli_query($conexion,$query);

		echo '<script languaje="javascript">
		var mensaje =" usuario creado correctamente";
		alert(mensaje);
		window.location.href= "../../public/views/login/login.usuario.php"
		</script>';

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
