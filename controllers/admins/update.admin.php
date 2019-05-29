<?php
include('../conexion.php');

$cc = $_POST['cc'];
$new_cc = $_POST['cc_new'];
$id = $_POST['id'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$hash_BD =$_POST['password_db'];
$telefono = $_POST['telefono'];
$foto = $_POST['foto_old'];
$contador = 0;

// Validacion de nueva cedula
if ($new_cc != $cc) {
	$sql_id = "SELECT * FROM admins WHERE cc = '$new_cc'";
	$consulta_id = mysqli_query($conexion, $sql_id);
	if ($consulta_id->num_rows != 0) {
		echo '<script languaje="javascript">
		var mensaje ="La cédula ya se esta usando, prueba con otra.";
		alert(mensaje);
		window.location.href= "../../admin/views/auth/editar.admin.php?id='.$id.'"
		</script>';
	}
}

// Validación de correo
$sql_email = "SELECT * FROM admins WHERE email = '$email'";
$consulta_email = mysqli_query($conexion, $sql_email);
if ($consulta_email->num_rows != 0) {
	$consulta_email = mysqli_fetch_array($consulta_email);
	if ($consulta_email['id'] != $id) {
		echo '<script languaje="javascript">
		var mensaje ="El correo ya esta en uso, busca otro.";
		alert(mensaje);
		window.location.href= "../../admin/views/auth/editar.admin.php?id='.$id.'"
		</script>';
	}
}

if (password_verify($password, $hash_BD)) {

	// subir foto:
	if ($_FILES['foto']['name'] != '') {
		if($_FILES['foto']['type'] == "image/jpg" || $_FILES["foto"]["type"] == "image/png" || $_FILES['foto']['type'] == "image/jpeg" ){

			$fotoOriginal = $_FILES['foto']['name'];
			$nombreFoto = strtolower(rand().$fotoOriginal);
			$cd = $_FILES['foto']['tmp_name'];
			$ruta = "../../admin/img/avatar/".$fotoOriginal;
			$destinoFoto = "img/avatar/".$nombreFoto;
			$resultado = @move_uploaded_file($cd, $ruta);
			if (!empty($resultado)){

				// renombra la nueva foto
				rename($ruta, "../../admin/".$destinoFoto);

				// Elimina la foto vieja
				if ($foto != 'img/avatar/defecto/defecto.png') {
					unlink('../../admin/'.$foto);
				}
			}
			else{
				$contador = 1;
				$destinoFoto = $foto;
			}
		}
		else{
			$contador = 1;
			$destinoFoto = $foto;
		}
	}
	else {
		$destinoFoto = $foto;
	}

	$query= "UPDATE admins SET cc = '$new_cc', foto = '$destinoFoto', nombre ='".$nombre."', apellido='".$apellido."', email='".$email."', telefono='".$telefono."' WHERE id = '".$id."'";
	$consulta = mysqli_query($conexion, $query);
	if ($consulta) {
		if ($contador == 0) {
			echo '<script languaje="javascript">
			var mensaje ="El administrador fue actualizado correctamente";
			alert(mensaje);
			window.location.href= "../../admin/views/"
			</script>';
		}
		else {
			echo '<script languaje="javascript">
			var mensaje = "Problemas al subir la foto, edicion de administrador sin avatar asociado.";
			alert(mensaje);
			window.location.href= "../../admin/views/"
			</script>';
		}
	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="Hubo un problema al actualizar el administrador, intenta mas tarde.";
		alert(mensaje);
		window.location.href= "../../admin/views/auth/editar.admin.php?id='.$id.'"
		</script>';
	}
}
else {
	echo '<script languaje="javascript">
	var mensaje ="Contraseña incorrecta.";
	alert(mensaje);
	window.location.href= "../../admin/views/auth/editar.admin.php?id='.$id.'"
	</script>';
}
?>
