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
	$query = "SELECT u.nombre AS cliente, u.apellido AS apellido, u.direccion AS direccion, u.telefono AS telefono, u.cc AS cc, p.nombre AS producto, p.valor AS valor, c.usuarios_id AS usuarios_id, c.productos_id AS productos_id, c.cantidad AS cantidad, c.valor as subtotal, c.fecha as fecha FROM compras AS c LEFT JOIN usuarios AS u ON u.id = usuarios_id LEFT JOIN productos AS p ON p.id = productos_id WHERE c.factura = '$factura';";
	$consulta = mysqli_query($conexion, $query);
	if ($consulta->num_rows == 0) {
		echo "alert('Hubo un problema al crear su factura, comuníquese con soporte.')
		<script languaje='javascript'>window.location.href= '../../../'</script>";
	}
	$query_suma = "SELECT SUM(valor) AS total FROM compras WHERE factura = '$factura'";
	$suma = mysqli_query($conexion, $query_suma);
	$suma = mysqli_fetch_array($suma);
	$data_usuario = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html"/>
	<meta charset="UTF-8"/>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
	<link rel="shortcut icon" href="../../img/favicon.png">

<style>
 *{
 	font-family: 'Verdana';
 }
	.boton{
		margin-bottom: 50px;
		margin-left: 5px;
		margin-top:100px;
		background-color: #05B329;
		color: white;
		border-radius: 10px;
		border-style: none;
		padding: 12px 18px 12px 18px;
		font-size: 15px;
		border: 1px solid #05B329;
		font-weight: bold;
	}
	.boton:hover{
		background-color: white;
		color: #05B329;
		cursor: pointer;
	}
	.title{
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
		position: relative;
		top: 53px;
		right: 30px;
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

.logos{
	position: relative;
	left: 40px;
}
.total{
	padding: 8px;
 }
.posision{
	position: relative;
}
.efecty{
	position: absolute;
	top: -3px;
	right:  160px;
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
								<td class="logos">
									<img src="../../img/favicon.png" width="75">
									<h3 class="title">WWW.VERDURASOFT.COM</h3>
									<h4>NIT: 00000000-0</h4>
										<strong>FACTURA:</strong> <span style="color:maroon ">Nº <?php echo $factura ?></span>  <br>

									</td>
									<td class="posision">
										<img class="efecty" src="../../img/efecty.png" width="150">
										<img class="codigo" src="../../../controllers/barcode/barcode.php?<?php echo 'text=' . $factura.'-'.$suma['total']. '&size=110&orientation=horizontal&codetype=Code39&print=true&sizefactor=2';?>" width="400">
									</tr>
								</table>
							</td>
						</tr>

						<tr align="justify">

							<table class="cliente">
								<br><br><br>
								<tr>
									<td class="iz"><strong>Fecha:</strong></td>
									<td class="iz"><?php
									$fecha = date("d/m/Y", strtotime( $data_usuario[0]['fecha'] ));
									echo $fecha?></td>
								</tr>
								<tr>
									<td class="iz"><strong>CC/NIT:</strong></td>
									<td class="iz"><?php echo $data_usuario[0]['cc']?></td>
								</tr>
								<tr>
									<td class="iz"><strong>Nombre:</strong></td>
									<td class="iz"><?php echo $data_usuario[0]['cliente'].' '.$data_usuario[0]['apellido'] ?></td>
								</tr>
								<tr>
									<td class="iz"><strong>Dirección:</strong></td>
									<td class="iz"><?php echo $data_usuario[0]['direccion'] ?></td>
								</tr>
								<tr>
									<td class="iz"><strong>Telefono:</strong></td>
									<td class="iz"><?php echo $data_usuario[0]['telefono'] ?></td>
								</tr>
							</table>
						</tr>
						<tr align="justify" >
							<table class="cliente">
								<br><br>
								<h3>Productos:</h3>
								<thead >
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Valor KG</th>
									<th class="total">Subtotal</th>

								</thead>
								<tbody>
									<?php

									foreach ($data_usuario as $key => $value) {
										?>
										<tr>
											<td class="iz"> <?php echo $value['producto']; ?> </td>
											<td> <?php echo $value['cantidad'];?> </td>
											<td>$ <?php echo $value['valor'];?> </td>
											<td>$ <?php echo $value['subtotal'];?> </td>
										</tr>
										<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<td class="iz" colspan="3" ><strong>Total a pagar:</strong></td>
										<td class="total">$ <?php echo $suma['total'] ?></td>
									</tr>
								</tfoot>

							</table>
						</tr>
					</table>


			</font>
			<input class="boton" name="Imprimir" type="submit" value="Imprimir" onclick="this.style.visibility='hidden' ; print(); this.style.visibility=''"/>
		</center>
	</body>
	</html>
