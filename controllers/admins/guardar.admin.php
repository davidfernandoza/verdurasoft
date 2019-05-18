<?php
include('../conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirPassword = $_POST['confirPassword'];
$telefono = $_POST['telefono'];
$estado = $_POST['estado'];
$contador = 0;
$destinoFoto = '';

if ($password == $confirPassword) {

	// subir foto:
	if ($_FILES['foto']['name'] != '') {

		$fotoOriginal = $_FILES['foto']['name'];
		$nombreFoto = strtolower(rand().$fotoOriginal);
		$cd = $_FILES['foto']['tmp_name'];
		$ruta = "../../admin/img/avatar/".$fotoOriginal;
		$destinoFoto = "img/avatar/".$nombreFoto;
		$resultado = @move_uploaded_file($cd, $ruta);
		if (!empty($resultado)){
			rename($ruta, "../../admin/".$destinoFoto);
		}
		else{
			$contador = 1;
			$destinoFoto = "img/avatar/defecto.png";
		}
	}
	else {
		$destinoFoto = "img/avatar/defecto.png";
	}

	$opciones = [  'cost' => 12, ];
	$password = password_hash($password, PASSWORD_BCRYPT, $opciones);

	$query= "INSERT INTO admins(id, foto, nombre, apellido, email, password, telefono, estado)
	VALUES('$id', '$destinoFoto', '$nombre', '$apellido', '$email', '$password', '$telefono', '$estado');";
	$consulta= mysqli_query($conexion,$query);

	if ($contador == 0) {
		echo '<script languaje="javascript">
		var mensaje ="El administrador fue creado correctamente";
		alert(mensaje);
		window.location.href= "../../admin/views/admin.php"
		</script>';
	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="Problemas al subir la foto, creacion de administrador sin avatar asociado.";
		alert(mensaje);
		window.location.href= "../../admin/views/admin.php"
		</script>';
	}
}
else {
	echo '<script languaje="javascript">
	var mensaje ="Las contraseñas no coinciden";
	alert(mensaje);
	window.location.href= "../../admin/views/admin.php"
	</script>';
}
?>
