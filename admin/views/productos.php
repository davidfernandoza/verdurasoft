<?php

session_start();
if (isset($_SESSION['ident'])) {

	include('../../controllers/conexion.php');
	$id = $_SESSION['ident'];
	$query= "SELECT * FROM admins WHERE id = '$id';";
	$consulta = mysqli_query($conexion, $query);
	$mostrar = mysqli_fetch_array($consulta);

	$query2= "SELECT * FROM productos ";
	$consulta2 = mysqli_query($conexion, $query2);



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
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>VerduraSoft | Administración</title>
		<link rel="stylesheet" href="../css/index.css">
		<link rel="shortcut icon" href="../../public/img/favicon.png">
		<link rel="stylesheet" href="../css/dataTables.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="content-header">
				<nav class="main-nav">
					<div class="content-user">
						<img src="<?php echo '../'.$mostrar['foto']; ?>" alt="img" class="content-img">
						<p class="text"><?php echo $mostrar['nombre']; ?> <?php echo $mostrar['apellido']; ?></p>
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
							<li class="item">
								<a href="./auth/editar.admin.php?id= <?php echo $id?>" class="link">Editar perfil</a>
							</li>
							<li class="item">
								<a href="./auth/editar.password.php?id= <?php echo $id?>" class="link">Cambiar Contraseña</a>
							</li>
							<li class="item">
								<a href="../../controllers/admins/session.salir.admin.php" class="link">Cerrar Sesión</a>
							</li>
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
							<a href="#">Productos</a>
						</li>
						<li class="aside-item">
							<a href="compras.php">Compras</a>
						</li>
					</ul>
					<ul class="aside-list ultimo">
						<a href="#">Productos: <?php echo $row_cnt; ?></a>
						<a href="#">Compras:  <?php echo $row_cnt2; ?></a>
					</ul>
				</aside>
				<article  class="container-article">
					<div class="input-group">
						<a href="#" id="ingresar-producto">Ingresar productos</a>
					</div>
					<div class="container-info">
						<div class="content-info">

							<table border="1px" id="table_id" >
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Valor KG</th>
										<th>Cantidad KG</th>
										<th>Estado</th>
										<th><img src="../img/editar.svg" alt="Editar"></th>
										<th><img src="../img/borrar.svg" alt="Borrar"></th>
										<th><img src="../img/check.svg" alt="Agregar"></th>
										<th class="no-mostrar"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ($mostrar2 = mysqli_fetch_array($consulta2)) {
										?>
										<tr>
											<td> <?php echo $mostrar2['id']; ?></td>
											<td> <?php echo $mostrar2['nombre']; ?></td>
											<td><?php echo $mostrar2['descripcion']; ?> </td>
											<td class="lower-case"><?php echo $mostrar2['valor']; ?></td>
											<td><?php echo $mostrar2['cantidad']; ?></td>
											<td><?php echo $mostrar2['estado']; ?></td>
											<td class="center"><img src="../img/editando.svg" class="editar-formulario" class="eliminar-formulario" alt="Editando">
											</td>
											<td class="center"><a href="../../controllers/admins/eliminar.productos.php?id=<?php echo $mostrar2['id']; ?>"><img src="../img/borrando.svg" class="eliminar-formulario" class="eliminar-formulario" alt="Eliminar"></a></td>
											<td class="center"><a href="../../controllers/admins/activar.productos.php?id=<?php echo $mostrar2['id'] ?>&cantidad=<?php echo $mostrar2['cantidad'] ?>"><img src="../img/plus.svg" alt="Activar" class="activar-formulario"></a>
											</td>
											<td class="no-mostrar"><?php echo $mostrar2['foto']; ?></td>
										</tr>
										<?php
									}
									?>

								</tbody>
							</table>

						</div>
					</div>
				</article>

			</section>
		</div>

		<div class="container-formulario  registro" id="content-formulario"> <!-- mostrar-formulario -->
			<form action="../../controllers/admins/guardar.productos.php" method="post" class="form-register"  id="form-register" enctype="multipart/form-data"> <!-- mostrar-->
				<div class="form-title">
					<h1>Ingresar productos </h1>

				</div>
				<div class="container-formulario-img">
					<div class="container-img">
						<div class="contenedor_img">
							<img src="../../admin/img/productos/defecto.jpg" id="img_agregar">
						</div>
						<input type="file" name="foto" id="foto_agregar" placeholder="Tu foto">

					</div>
					<div class="form-content" id="form-content-register">
						<div class="input-group">
							<input type="number" placeholder="Codigo" name="id" required>
							<input type="text" placeholder="Nombre" name="nombre" required>
						</div>
						<input type="text" placeholder="Descripcion" name="descripcion" class="full" required>
						<div class="input-group">
							<input type="number" placeholder="Valor KG" name="valor" required>
							<input type="number" placeholder="Cantidad KG" name="cantidad" required>
						</div>
						<input type="number" placeholder="Total" name="total" id="total" class="full">

						<input type="hidden" name="admin_id" value="<?php echo $mostrar['id']; ?>">


						<div class="cta-group">
							<input type="reset" value="Cancelar" id="cerrar_ingresar">
							<input type="submit">
						</div>
					</div>
				</div>
			</form>

			<form action="../../controllers/admins/update.producto.php" method="post" class="form-actualizar" id="form-actualizar" enctype="multipart/form-data" > <!-- mostrar -->
				<div class="form-title">
					<h1>Editar producto </h1>
				</div>

				<div class="container-formulario-img">
					<div class="container-img" id="container">
						<div class="contenedor_img">
							<img id="img_editar">
						</div>
						<input type="file" name="foto" id="foto_editar" >
					</div>
					<div class="form-content" id="form-content-actualizar">
						<div class="input-group">

							<input type="text" placeholder="codigo" name="id" required="" title="Codigo" >
							<input type="text" placeholder="nombre" name="nombre" required="" title="Nombre">
						</div>
						<input type="text" placeholder="Descripcion" name="descripcion" class="full" title="Descripcion">
						<div class="input-group">
							<input type="number" placeholder="Valor KG" name="valor" required="" title="Valor KG">
							<input type="number" placeholder="Cantidad KG" name="cantidad" required="" title="Cantidad KG">
						</div>
						<input type="number" placeholder="Total" class="full" name="total" id="total" title="Total">

						<div class="cta-group">
							<input type="hidden" name="id_old">
							<input type="hidden" name="nombre_old">
							<input type="hidden" name="foto_old">
							<input type="reset" value="Cancelar" id="cerrar_editar">
							<input type="submit">

						</div>
					</div>
				</form>

			</div>


			<script src="../../public/js/jquery.js"></script>
			<script src="../js/dataTables.js"></script>
			<script src="../js/index.js"></script>
			<script src="../js/productos.js"></script>
			<script src="../js/config.js">
			</script>
			<script type="text/javascript">
			$(window).on('load', function(){

				$(function() {
					$('#foto_agregar').change(function(e) {
						addImage(e);
					});

					$('#foto_editar').change(function(e) {
						addImageEdit(e);
					});

					function addImage(e){
						var file = e.target.files[0],
						imageType = /image.*/;

						if (!file.type.match(imageType))
						return;

						var reader = new FileReader();
						reader.onload = fileOnload;
						reader.readAsDataURL(file);
					}

					function fileOnload(e) {
						var result=e.target.result;
						$('#img_agregar').attr("src",result);
					}

					function addImageEdit(e){
						var file = e.target.files[0],
						imageType = /image.*/;

						if (!file.type.match(imageType))
						return;

						var reader = new FileReader();
						reader.onload = fileOnloadEditar;
						reader.readAsDataURL(file);
					}

					function fileOnloadEditar(e) {
						var result=e.target.result;
						$('#img_editar').attr("src",result);
					}
				});

				let cerrar = document.getElementById('cerrar_ingresar')
				cerrar.addEventListener('click', ()=>{
					$('#img_agregar').attr("src",'../../admin/img/productos/defecto.jpg');
				})
			});

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
