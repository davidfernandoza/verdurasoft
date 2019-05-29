<?php
include('../conexion.php');
$id = $_POST['id'];

$codigo = $_POST['codigo'];
$codigo_old = $_POST['codigo_old'];

$new_nombre = $_POST['nombre'];
$nombre = $_POST['nombre_old'];

$descripcion = $_POST['descripcion'];
$valor = $_POST['valor'];
$cantidad = $_POST['cantidad'];
$foto = $_POST['foto_old'];
$estado = 'activo';
$contador = 0;

// Validador de cantidad.
if ($cantidad <= 0) {
	$estado = 'inactivo';
}

// Validacion de nuevo id
if ($codigo != $codigo_old) {
	$sql_id = "SELECT * FROM productos WHERE codigo = '$codigo'";
	$consulta_id = mysqli_query($conexion, $sql_id);
	if ($consulta_id->num_rows != 0) {
		echo '<script languaje="javascript">
		var mensaje ="El codigo del producto ya existen en base de datos.";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php"
		</script>';
	}
}

// Validacion de nuevo nombre
if ($new_nombre != $nombre) {
	$sql_nombre = "SELECT * FROM productos WHERE nombre = '$new_nombre'";
	$consulta_nombre = mysqli_query($conexion, $sql_nombre);
	if ($consulta_nombre->num_rows != 0) {
		echo '<script languaje="javascript">
		var mensaje ="El nombre del producto ya existen en base de datos.";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php"
		</script>';
	}
}

// Subir foto
if ($_FILES['foto']['name'] != '') {
	if($_FILES['foto']['type'] == "image/jpg" || $_FILES["foto"]["type"] == "image/png" || $_FILES['foto']['type'] == "image/jpeg" ){

		$fotoOriginal = $_FILES['foto']['name'];
		$nombreFoto = strtolower(rand().$fotoOriginal);
		$cd = $_FILES['foto']['tmp_name'];
		$ruta = "../../admin/img/productos/".$fotoOriginal;
		$destinoFoto = "img/productos/".$nombreFoto;
		$resultado = @move_uploaded_file($cd, $ruta);
		if (!empty($resultado)){

			// Renombrar nueva foto
			rename($ruta, "../../admin/".$destinoFoto);

			// Elimina la foto vieja
			if ($foto != 'img/productos/defecto/defecto.jpg') {
				unlink('../../admin/'.$foto);
			}
		}
		else{
			$destinoFoto = $foto;
			$contador = 1;
		}
	}
	else{
		$destinoFoto = $foto;
		$contador = 1;
	}
}
else {
	$destinoFoto = $foto;
}

$query= "UPDATE productos SET codigo = '$codigo', foto = '$destinoFoto', nombre = '$new_nombre', descripcion = '$descripcion', cantidad = '$cantidad', valor = '$valor', estado = '$estado' WHERE id = '$id' ";
$consulta= mysqli_query($conexion, $query);

if ($consulta) {
	if ($contador == 0) {
		echo '<script languaje="javascript">
		var mensaje ="El producto fue actualizado correctamente";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php";
		</script>';
	}
	else {
		echo '<script languaje="javascript">
		var mensaje = "Problemas al subir la foto, edicion de producto sin foto asociada.";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php";
		</script>';
	}
}
else {
	echo '<script languaje="javascript">
	var mensaje ="Hubo un problema al actualizar el producto, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php";
	</script>';
}


?>
