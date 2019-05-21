<?php
include('../conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$valor = $_POST['valor'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];


$sqli_igual = "SELECT nombre from productos WHERE nombre = '$nombre'";
$consulta2 = mysqli_query($conexion, $sqli_igual);
$mostrar = mysqli_fetch_array($consulta2);
if ($nombre != $mostrar['nombre'] )
{

	$query_validator = "SELECT * FROM productos WHERE id = '$id' OR nombre = '$nombre'";
	$consulta_validator = mysqli_query($conexion, $query_validator);
	if ($consulta_validator->num_rows == 0) {

	$query= "UPDATE `productos` SET `nombre` = '".$nombre."', `descripcion` = '".$descripcion."', `cantidad` = '".$cantidad."', `valor` = '".$valor."', `estado` = '".$estado."' WHERE `productos`.`id` = '".$id."' ";
	$consulta= mysqli_query($conexion,$query);
	echo '<script languaje="javascript">
		var mensaje ="El producto fue ACTUALIZADO correctamente";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php";
		</script>';
	}
	else {
		echo '<script languaje="javascript">
		var mensaje ="Alerta: No se actualizó el producto, ya que existe en base de datos";
		alert(mensaje);
		window.location.href= "../../admin/views/productos.php"
		</script>';
	}
}

?>
