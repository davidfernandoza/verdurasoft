<?php
session_start();
if (isset($_SESSION['ident'])) {

	include('../../controllers/conexion.php');
	$id = $_SESSION['ident'];
	$query= "SELECT * FROM admins WHERE id = '$id';";
	$consulta = mysqli_query($conexion, $query);
	$mostrar = mysqli_fetch_array($consulta);

	$query2= "SELECT * FROM admins";
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
	<html lang="es">
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
<<<<<<< HEAD
							<li class="item">
								<a href="./auth/editar.admin.php?id= <?php echo $id?>" class="link">Editar perfil</a>
							</li>
							<li class="item">
								<a href="./auth/editar.password.php?id= <?php echo $id?>" class="link">Cambiar Contraseña</a>
							</li>
							<li class="item">
								<a href="../../controllers/admins/session.salir.admin.php" class="link">Cerrar Sesión</a>
							</li>
=======
							<li class="item"><a href="./auth/editar.admin.php?id= <?php echo $id?>" class="link">Editar perfil</a></li>
							<li class="item"><a href="../../controllers/admins/session.salir.admin.php" class="link">Cerrar sesión</a></li>
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
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
							<a href="#">Admins</a>
						</li>
						<li class="aside-item">
							<a href="user.php">Usuarios</a>
						</li>
						<li class="aside-item">
							<a href="productos.php">Productos</a>
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
						<a href="#" id="ingresar-admin">Ingresar Administrador</a>
					</div>
					<div class="container-info">
						<div class="content-info">
							<table border="1px" id="table_id" class="display">
								<thead>
									<tr>
										<th>Cédula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Correo eléctronico</th>
										<th>Teléfono</th>
										<th>Estado</th>
										<th><img src="../img/borrar.svg" alt="Borrar"></th>
<<<<<<< HEAD
										<th><img src="../img/check.svg" alt="Agregar"></th>
									</tr>
								</thead>
								<?php

								while ($mostrar2 = mysqli_fetch_array($consulta2)) {

									?>
=======
									</tr>
								</thead>
									<?php

									while ($mostrar2 = mysqli_fetch_array($consulta2)) {

										?>
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
									<tr>
										<td> <?php echo $mostrar2['id']; ?> </td>
										<td> <?php echo $mostrar2['nombre'];?> </td>
										<td> <?php echo $mostrar2['apellido'];?> </td>
										<td class="lower-case"><?php echo $mostrar2['email'];?> </td>
										<td> <?php echo $mostrar2['telefono'];?> </td>
										<td> <?php echo $mostrar2['estado'];?> </td>
										<td class="center"><a href="../../controllers/admins/eliminar.admin.php?id=<?php echo $mostrar2['id'] ?>"><img src="../img/borrando.svg" ></a></td>
<<<<<<< HEAD
										<td class="center"><a href="../../controllers/admins/activar.admin.php?id=<?php echo $mostrar2['id'] ?>"><img src="../img/plus.svg" alt="Activar" class="activar-formulario"></a></td>
									</tr>
									<?php
								}
								?>
=======
									</tr>
										<?php
									}
									?>
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772

							</table>
						</div>
					</div>
				</article>

			</section>
		</div>


		<div class="container-formulario  registro" id="content-formulario"> <!-- mostrar-formulario -->
			<form action="../../controllers/admins/guardar.admin.php" method="post" class="form-register"  id="form-register" enctype="multipart/form-data"> <!-- mostrar-->
				<div class="form-title">
					<h1>Ingresar Administrador </h1>
				</div>
				<div class="container-formulario-img">
<<<<<<< HEAD
					<div class="container-img" id="container">
						<div class="img_contenedor">
							<img id="agregar_img" src="../img/avatar/defecto.png">
						</div>
						<input type="file" name="foto" id="agregar_foto" >
=======
					<div class="container-img">
						<input type="file" name="foto" id="" placeholder="Tu foto">
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
					</div>
					<div class="form-content">
						<input type="number" placeholder="Cédula" name="id" class="full" maxlength="12" required="">
						<div class="input-group">
							<input type="text" placeholder="Nombres" name="nombre" maxlength="50" required>
							<input type="text" placeholder="Apellidos" name="apellido" maxlength="50" required>
						</div>
						<input type="email" class="full" placeholder="Correo electrónico" name="email" maxlength="50" minlength="5" required="">
						<input type="number" placeholder="Telefono" class="full" name="telefono" min="1000000" max="999999999999999" required="">
<<<<<<< HEAD
=======
						<div class="input-group">
							<input type="password" placeholder="Contraseña" name="password" maxlength="16" minlength="8" required="">
							<input type="password" placeholder="Repetir contraseña" name="confirPassword" maxlength="16" minlength="8" required="">
						</div>
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
						<div class="cta-group">
							<input type="reset" value="Cancelar" id="cerrar_ingresar">
							<input type="submit">
						</div>
					</div>
				</div>
			</form>
		</div>




		<script src="../../public/js/jquery.js"></script>
		<script src="../js/dataTables.js"></script>
		<script src="../js/index.js"></script>
		<script src="../js/admin.js"></script>
<<<<<<< HEAD
		<script src="../js/config.js">
		</script>
		<script type="text/javascript">
		$(window).on('load', function(){

			$(function() {
				$('#agregar_foto').change(function(e) {
					addImage(e);
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
					$('#agregar_img').attr("src",result);
				}

			});

			let cerrar = document.getElementById('cerrar_ingresar')
			cerrar.addEventListener('click', ()=>{
				$('#agregar_img').attr("src", "../img/avatar/defecto.png");
			})
		});

=======

		<script>
		$(document).ready( function () {
			$('#table_id').DataTable();
		} );
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
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
