<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	// echo "<script languaje='javascript'>window.location.href= '../../../'</script>";
}
else if (!isset($_GET['factura'])) {
		// echo "<script languaje='javascript'>window.location.href= '../../../'</script>";
		var_dump($_GET['factura']);
}
else {
	$factura = $_GET['factura'];
	include "../../../controllers/conexion.php";
	$query = "SELECT u.nombre AS cliente, u.apellido AS apellido, u.direccion AS direccion, u.telefono AS telefono, p.nombre AS producto, p.valor AS valor, c.usuarios_id AS usuarios_id, c.productos_id AS productos_id, c.cantidad AS cantidad, c.valor as subtotal FROM compras AS c LEFT JOIN usuarios AS u ON u.id = usuarios_id LEFT JOIN productos AS p ON p.id = productos_id WHERE c.factura = '$factura';";
	$consulta = mysqli_query($conexion, $query);
	if ($consulta->num_rows == 0) {

		// echo "alert('Hubo un problema al crear su factura, comuníquese con soporte.')
		// <script languaje='javascript'>window.location.href= '../../../'</script>";
	}
	$suma = 0;
	$data_usuario = mysqli_fetch_array($consulta);
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html"/>
	<meta charset="UTF-8"/>
	<link rel="shortcut icon" href="../../img/favicon.png">

<style>
	.firma{
		position: relative;
		/*border:2px dashed red;*/
		float: left;
		width: 332px;
		padding-top: 50px;
	}
	.firmaBody{
		/*border:2px dashed green;*/
		width: 670px;
		display: table;
		margin-left: 30px;
		margin-right: 30px;
	}
	.tel{
		margin-bottom: 10px;
	}

	.btn{
		margin-bottom: 50px;
		margin-left: 5px;
		margin-top:40px;
	}
	.title{
		font-family: Times New Roman;
		display: block;
		font-size: 18px;
		font-weight: bold;
	}
	p {
		margin-bottom: 20px;
	}
	.pjuramento{
		margin-top: 10px;
	}
	.codigo{
		margin-left: 100px;
	}

.cliente{
	border-collapse: collapse;
	border: 1px solid #000;
	width: 700px;
	text-align: center;
}
.cliente td, th{
	border-collapse: collapse;
	border: 1px solid #000;

}
.iz{
	text-align: left;
	padding-left: 10px;
}



</style>
<title>VerduraSoft | Facturación</title>
</head>
<body>
	<center>

			<table>
				<tr>
					<td align="justify">
						<table>
							<tr align="center">
								<td>
									<img src="../../img/favicon.png" width="75">
									<h3 class="title">VerduraSoft </h3>
										<strong>Factura:</strong> <span style="color:maroon "><?php echo $factura ?></span>  <br>
									</td>
									<td >
										<img class="codigo" src="../../img/codigo.png" width="400">
									</tr>
								</table>
							</td>
						</tr>

						<tr align="justify">

							<table class="cliente">
								<h3>Cliente:</h3>
								<tr>
									<td class="iz"><strong>Nombre:</strong></td>
									<td class="iz"><?php echo $data_usuario['cliente'].' '.$data_usuario['apellido'] ?></td>
								</tr>
								<tr>
									<td class="iz"><strong>Dirección:</strong></td>
									<td class="iz"><?php echo $data_usuario['direccion'] ?></td>
								</tr>
								<tr>
									<td class="iz"><strong>Telefono:</strong></td>
									<td class="iz"><?php echo $data_usuario['telefono'] ?></td>
								</tr>
							</table>
						</tr>
						<tr align="justify" >
							<table class="cliente">
								<h3>Productos:</h3>
								<thead>
									<th class="iz">Producto</th>
									<th>Cantidad</th>
									<th>Valor KG</th>
									<th>Subtotal</th>

								</thead>
								<tbody>
									<?php
									while ($fila = mysqli_fetch_array($consulta)) {
										?>
										<tr>
											<td class="iz"> <?php echo $fila['producto']; ?> </td>
											<td> <?php echo $fila['cantidad'];?> </td>
											<td>$ <?php echo $fila['valor'];?> </td>
											<td>$ <?php echo $fila['subtotal'];?> </td>
										</tr>
										<?php
										$suma = $suma + $fila['subtotal'];
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<td class="iz" colspan="3" ><strong>Total a pagar:</strong></td>
										<td>$ <?php echo $suma ?></td>
									</tr>
								</tfoot>

							</table>
						</tr>
					</table>


			</font>
			<input class="btn btn-primary btn-md" name="Imprimir" type="submit" value="Imprimir" onclick="this.style.visibility='hidden' ; print(); this.style.visibility=''"/>
		</center>
	</body>
	</html>
