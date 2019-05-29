<?php
include('../conexion.php');
$cc = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$contador = 0;
$destinoFoto = '';

$sqli = "SELECT * from admins where email = '$email'";
$result = $conexion->query($sqli);
$fila = mysqli_num_rows($result);
if ($fila != 0){
	echo '<script languaje="javascript">
	var mensaje ="El correo ya se encuentra registrado, prueba con otro";
	alert(mensaje);
	window.location.href= "../../admin/views/admin.php"
	</script>';
}
else{
	$sqli_id = "SELECT * from admins where cc = '$cc'";
	$result_id = $conexion->query($sqli_id);
	$fila_id = mysqli_num_rows($result_id);
	if ($fila_id != 0){
		echo '<script languaje="javascript">
		var mensaje ="El número de cédula ya se encuentra registrado, prueba con otro";
		alert(mensaje);
		window.location.href= "../../admin/views/admin.php"
		</script>';
	}
	else{

		// subir foto:
		if ($_FILES['foto']['name'] != '') {
			if($_FILES['foto']['type'] == "image/jpg" || $_FILES["foto"]["type"] == "image/png" || $_FILES['foto']['type'] == "image/jpeg"){

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
					$destinoFoto = "img/avatar/defecto/defecto.png";
				}
			}
			else{
				$contador = 1;
				$destinoFoto = "img/avatar/defecto/defecto.png";
			}
		}
		else {
			$destinoFoto = "img/avatar/defecto/defecto.png";
		}

		$opciones = [  'cost' => 12, ];
		$password = password_hash($cc, PASSWORD_BCRYPT, $opciones);

		$query= "INSERT INTO admins(id, cc, foto, nombre, apellido, email, password, telefono, estado)
		VALUES(NULL,'$cc', '$destinoFoto', '$nombre', '$apellido', '$email', '$password', '$telefono', 'activo');";
		$consulta = mysqli_query($conexion,$query);
		if ($consulta) {
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
			var mensaje ="Hubo un problema al crear el administrador, intenta mas tarde.";
			alert(mensaje);
			window.location.href= "../../admin/views/admin.php"
			</script>';
		}
	}
}

?>
