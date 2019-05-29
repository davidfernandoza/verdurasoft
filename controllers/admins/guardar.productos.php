<?php
include('../conexion.php');
$codigo = $_POST['id'];
$admin_id = $_POST['admin_id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$valor = $_POST['valor'];
$cantidad = $_POST['cantidad'];
$estado = 'activo';
$destinoFoto = '';
$contador = 0;

if ($cantidad <= 0) {
	$estado = 'inactivo';
}

$query_validator = "SELECT * FROM productos WHERE codigo = '$codigo' OR nombre = '$nombre'";
$consulta_validator = mysqli_query($conexion, $query_validator);
if ($consulta_validator->num_rows == 0) {


	// Validacion de foto
	if ($_FILES['foto']['name'] != '') {
		if($_FILES['foto']['type'] == "image/jpg" || $_FILES["foto"]["type"] == "image/png" || $_FILES['foto']['type'] == "image/jpeg"){
			$fotoOriginal = $_FILES['foto']['name'];
			$nombreFoto = strtolower(rand().$fotoOriginal);
			$cd = $_FILES['foto']['tmp_name'];
			$ruta = "../../admin/img/productos/".$fotoOriginal;
			$destinoFoto = "img/productos/".$nombreFoto;
			$resultado = @move_uploaded_file($cd, $ruta);
			if (!empty($resultado)){
				rename($ruta, "../../admin/".$destinoFoto);
			}
			else{
				$destinoFoto = "img/productos/defecto/defecto.jpg";
				$contador = 1;
			}
		}
		else {
			$destinoFoto = "img/productos/defecto/defecto.jpg";
			$contador = 1;
		}
	}
	else {
		$destinoFoto = "img/productos/defecto/defecto.jpg";
	}

	$query = "INSERT INTO `productos` (`id`, `codigo`, `admins_id`, `foto`, `nombre`, `descripcion`, `cantidad`, `valor`, `estado`) VALUES (NULL, '$codigo', '$admin_id', '$destinoFoto', '$nombre', '$descripcion', '$cantidad', '$valor', '$estado')";

	$consulta = mysqli_query($conexion,$query);
	if ($consulta) {
		if ($contador == 0) {
			echo '<script languaje="javascript">
			var mensaje ="El producto fue creado correctamente.";
			alert(mensaje);
			window.location.href= "../../admin/views/productos.php"
			</script>';
		}
		else {
			echo '<script languaje="javascript">
			var mensaje ="Problemas al subir la foto, creacion de producto sin foto asociada."
			alert(mensaje);
			window.location.href= "../../admin/views/productos.php"
			</script>';
		}
	}
	else{
		echo '<script languaje="javascript">
		var mensaje ="Hubo un problema al crear el producto, Intenta mas tarde.";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php"
		</script>';
	}
}
else {
	echo '<script languaje="javascript">
	var mensaje ="Ya que existe el producto en base de datos";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php"
	</script>';
}

?>
