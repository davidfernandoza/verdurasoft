<?php

session_start();
if (isset($_SESSION['ident'])) {

	include('../../controllers/conexion.php');
	$id = $_SESSION['ident'];
	$query= "SELECT * FROM admins WHERE id = '$id';";
	$consulta = mysqli_query($conexion, $query);
	$mostrar = mysqli_fetch_array($consulta);

	$query2= "select c.id as id_compras, c.factura as factura, c.cantidad as cantidad, c.valor as valor, c.estado as estado, p.id as id_productos, p.nombre as nombre_productos, u.id as id_usuarios, u.nombre as nombre_usuarios from compras as c left join usuarios as u on u.id = c.usuarios_id left join productos as p on p.id = c.productos_id;";
	$consulta2 = mysqli_query($conexion, $query2);

	$consulta3 = "SELECT SUM(valor) as TotalPrecios FROM compras WHERE estado = 'activo' ";
	$resultado3 = $conexion -> query($consulta3);
	$fila = $resultado3->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo

	$TotalPrecios = $fila['TotalPrecios'];




	if ($result = $conexion->query("SELECT * FROM productos")) {

		/* determinar el número de filas del resultado */
		$row_cnt = $result->num_rows;



		/* cerrar el resultset */
		$result->close();
	}

	if ($result2 = $conexion->query("SELECT * FROM compras")) {

		/* determinar el número de filas del resultado */
		$row_cnt2 = $result2->num_rows;



		/* cerrar el resultset */
		$result2->close();

	}
	?>



	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>VerduraSoft | Administración</title>
		<link rel="stylesheet" href="../css/index.css">
		<link rel="shortcut icon" href="../../public/img/favicon.png">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="content-header">
				<nav class="main-nav">
					<div class="content-user">
						<img src="<?php echo '../'.$mostrar['foto']; ?>" alt="img" class="content-img">
						<p class="text"> <?php echo $mostrar['nombre']; ?> <?php echo $mostrar['apellido']; ?></p>
					</div>
					<div class="container-menu">
						<div class="todo">
							<div class="caja">
								<div class="fecha">
									<p id="diaSemana" class="diaSemana"></p>
									<p id="dia" class="dia"></p>
									<p>de</p>
									<p id="mes" class="mes"></p>
									<p>del</p>
									<p id="year" class="year"></p>
								</div>
								<div class="reloj">
									<p id="horas" class="horas"></p>
									<p>:</p>
									<p id="minutos" class="minutos"></p>
									<p>:</p>
									<p id="segundos" class="segundos"></p>
									<p id="ampm" class="ampm"></p>
								</div>
							</div>
						</div>
						<img class="icon" id="menu" src="../img/user-solid.svg">
						<ul class="content-menu">
							<li class="item"><a href="./auth/editar.admin.php?id= <?php echo $id?>" class="link">Editar perfil</a></li>
							<li class="item"><a href="../../controllers/admins/session.salir.admin.php" class="link">Cerrar sesión</a></li>
						</ul>
					</div>
				</nav>
			</header>
			<section>
				<aside class="container-aside">
					<ul class="aside-list">
						<li class="aside-item">
							<a href="index.php">Inicio</a>
						</li>
						<li class="aside-item">
							<a href="admin.php">Admins</a>
						</li>
						<li class="aside-item">
							<a href="user.php">Usuarios</a>
						</li>
						<li class="aside-item">
							<a href="productos.php">Productos</a>
						</li>
						<li class="aside-item">
							<a href="#">Compras</a>
						</li>
					</ul>
					<ul class="aside-list ultimo">
						<a href="#">Productos: <?php echo $row_cnt; ?></a>
						<a href="#">Compras:  <?php echo $row_cnt2; ?></a>
					</ul>
				</aside>
				<article  class="container-article">
					<div class="container-info">
						<div class="content-info">
							<table border="1px" id="table_id" class="display">
								<thead>
									<tr>
										<th>Usuario</th>
										<th>Producto</th>
										<th>Factura</th>
										<th>Cantidad</th>
										<th>Valor Total</th>
										<th>Estado</th>
										<th><img src="../img/borrar.svg" alt="Borrar"></th>
									</tr>
								</thead>
								<?php

								while ($mostrar2 =  mysqli_fetch_array($consulta2)) {
									?>
									<tr>
										<td><?php echo $mostrar2['nombre_usuarios']; ?></td>
										<td><?php echo $mostrar2['nombre_productos']; ?></td>
										<td><?php echo $mostrar2['factura']; ?></td>
										<td id="cantidad"><?php echo $mostrar2['cantidad']; ?></td>
										<td id="valor"><?php echo $mostrar2['valor']; ?></td>
										<td><?php echo $mostrar2['estado']; ?></td>
										<td class="center">
											<a href="../../controllers/admins/eliminar.compras.php?id=<?php echo $mostrar2['id_compras']; ?>"><img src="../img/borrando.svg" class="eliminar-formulario" class="eliminar-formulario" alt="Eliminar">
											</a>
										</td>
									</tr>
									<?php
								}
								?>

							</table>
						</div>
						<div class="total">
						<span><p>Total recaudado:</p> <?php echo $TotalPrecios ;?></span>
					</div>
				</div>
			</article>

		</section>
	</div>

	<script src="../../public/js/jquery.js"></script>
	<script src="../js/dataTables.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/compras.js"></script>

	<script>
	$(document).ready( function () {
		$('#table_id').DataTable();
	} );
	</script>


</body>
</html>


<?php
}
else{
	echo '<script languaje="javascript">
	var mensaje ="Usted no tiene acceso a este contenido, por favor inicie sesión";
	alert(mensaje);
	window.location.href= "../"
	</script>';
}
?>
