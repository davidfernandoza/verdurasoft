<?php
include('../conexion.php');
$id = $_POST['id'];
$admin_id = $_POST['admin_id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$valor = $_POST['valor'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$contador = 0;
$destinoFoto = '';




if ($_FILES['foto']['name'] != '') {

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
		$contador = 1;
		$destinoFoto = "img/productos/defecto.png";
	}
}
else {
	$destinoFoto = "img/productos/campo.png";
}
$query = "INSERT INTO `productos` (`id`, `admins_id`, `foto`, `nombre`, `descripcion`, `cantidad`, `valor`, `estado`) VALUES ('$id', '$admin_id', '$destinoFoto', '$nombre', '$descripcion', '$cantidad', '$valor', 'activo')";

$consulta= mysqli_query($conexion,$query);
echo '<script languaje="javascript">
	var mensaje ="El producto fue creado correctamente ";
	alert(mensaje);
	window.location.href= "../../admin/views/productos.php"
	</script>';

?>
