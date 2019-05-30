<?php
include('../conexion.php');
$factura = $_GET['factura'];
$estado = $_GET['estado'];

$query= "UPDATE compras set estado ='activo' WHERE factura = '".$factura."'";
$consulta= mysqli_query($conexion,$query);
if ($consulta) {

	if ($estado == 'inactivo') {
		$query2 = "SELECT c.productos_id AS producto, c.cantidad AS cantidad_c, p.cantidad AS cantidad_o FROM compras AS c LEFT JOIN productos AS p ON c.productos_id = p.id WHERE c.factura = '$factura';";

		$consulta2 = mysqli_query($conexion, $query2);
		$consulta2 = mysqli_fetch_all($consulta2, MYSQLI_ASSOC);

		foreach ($consulta2 as $key => $value) {

			$cantidad = $value['cantidad_o'] - $value['cantidad_c'];
			$id_producto = $value['producto'];
			$estadop = 'activo';

			if ($cantidad <= 0) {
				$estadop = 'inactivo';
			}

			$query3= "UPDATE productos SET cantidad = '$cantidad', estado = '$estadop' WHERE id = '$id_producto';";
			$consulta3 = mysqli_query($conexion, $query3);


		}
	}
	echo '<script languaje="javascript">
	var mensaje ="La compra fue activada correctamente";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';
}
else {
	echo '<script languaje="javascript">
	var mensaje ="La compra no se pudo activar, intenta mas tarde.";
	alert(mensaje);
	window.location.href= "../../admin/views/compras.php"
	</script>';
}
?>
