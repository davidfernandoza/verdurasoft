<?php
session_start();
if(isset($_SESSION['id_usuario'])){

	if(isset($_GET["page"])){
		$page=$_GET["page"];
	}else{
		$page=0;
	}

	include('../conexion.php');

	switch($page){

		// Agregar
		case 1:
		$cantidad = ($_POST['cantidad'] + $_POST['cantidadActual']);
		$producto_id = $_POST['producto_id'];
		$query= "SELECT * FROM productos WHERE id = '$producto_id';";
		$consulta = mysqli_query($conexion, $query);
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		$producto = mysqli_fetch_array($consulta);
		$nombre = $producto['nombre'];
		$valor = $producto['valor'];
		$subtotal = $cantidad * $valor;
		$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$nombre, 'cantidad'=>$cantidad, 'precio'=>$valor, 'subtotal'=>$subtotal);
		$json['success'] = true;
		echo json_encode($json);
		break;

		// Eliminar
		case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;

		if (isset($_POST['id'])) {
			unset($_SESSION['detalle'][$_POST['id']]);
			echo json_encode($json);
		}
		break;

		// Guardar compra
		case 3:
		if ($_SESSION['detalle'] != '') {
			$factura = rand().$_SESSION['id_usuario'];

			foreach ($_SESSION['detalle'] as $row) {
				$id = 0;
				$usuarios_id = $_SESSION['id_usuario'];
				$productos_id = $row['id'];
				$cantidad = $row['cantidad'];
				$valor = $row['subtotal'];
				$fecha = date("Y-m-d");

				$query1= "SELECT * FROM productos WHERE id = '$productos_id';";
				$consulta1 = mysqli_query($conexion, $query1);
				$consulta1 = mysqli_fetch_array($consulta1);

				$query2 = "INSERT INTO compras(id, usuarios_id, productos_id, factura, cantidad, valor, fecha, estado)
				VALUES($id, '$usuarios_id', '$productos_id', '$factura', '$cantidad', '$valor', '$fecha', 'espera');";
				$consulta2 = mysqli_query($conexion, $query2);
				$cantidad = $consulta1['cantidad'] - $cantidad;
				$estadop = 'activo';

				if ($cantidad <= 0) {
					$estadop = 'inactivo';
				}

				$query3 = "UPDATE productos SET cantidad = '$cantidad', estado = '$estadop' WHERE id = '$productos_id';";
				$consulta3 = mysqli_query($conexion, $query3);

			}

			echo '
			<script src="../../public/js/browser.js"></script>
			<script languaje="javascript">
			var mensaje ="La solicitud de compra fue hecha, haz el pago en un Efecty con la siguiente factura.";
			alert(mensaje);
			if (bowser.name == "Firefox") {
				window.location.href= "../../public/views/carrito/factura.php?factura='.$factura.'"
			}
			else {
				window.location.href= "../../"
				window.open("../../public/views/carrito/factura.php?factura='.$factura.'", "_blank")
			}
			</script>';

		}
		else {
			echo 'none';
		}

		break;
	}
}
else {
	$json = array();
	$json['success'] = false;
	$json['msj'] = 'sesion';
	echo json_encode($json);
}


?>
