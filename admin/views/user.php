<?php

	session_start();
	if (isset($_SESSION['ident'])) {

		include('../../controllers/conexion.php');
		$id = $_SESSION['ident'];
		$query= "SELECT * FROM admins WHERE id = '$id';";
		$consulta = mysqli_query($conexion, $query);
		$mostrar = mysqli_fetch_array($consulta);

		$query2= "SELECT * FROM usuarios";
		$consulta2 = mysqli_query($conexion, $query2);



		if ($result = $conexion->query("SELECT * FROM productos")) {

	    /* determinar el número de filas del resultado */
	    $row_cnt = $result->num_rows;



	    /* cerrar el resultset */
	    $result->close();
		}

	    if ($result2 = $conexion->query("SELECT * FROM compras")) {

	    /* determinar el número de filas del resultado */
	    $row_cnt2 = $result2->num_rows-1;



	    /* cerrar el resultset */
	    $result2->close();

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VerduraSoft | Usuarios</title>
	<link rel="stylesheet" href="../css/index.css">
	<script src="../js/code_jquery.js"></script>
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
						<li class="item"><a href="../../controllers/admins/editar.admin.php?id= <?php echo $id?>" class="link">Editar perfil</a></li>
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
							<a href="#">Usuarios</a>
						</li>
						<li class="aside-item">
							<a href="productos.php">Productos</a>
						</li>
						<li class="aside-item">
							<a href="productos.php">Compras</a>
						</li>
					</ul>
					<ul class="aside-list ultimo">
						<a href="#">Productos: <?php echo $row_cnt; ?></a>
						<a href="#">Compras:  <?php echo $row_cnt2; ?></a>
					</ul>
			</aside>
			<article  class="container-article">
					<div class="input-group">
						<a href="#" id="ingresar-usuario">Ingresar usuario</a>
						<form class="content-search" action="../index.html">
							<input type="search" name="search" placeholder="Cedula de usuario">
						</form>
					</div>
					<div class="container-info">
						<div class="content-info">
							<table border="1px" id="table_id">
								<thead>
									<tr>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Correo electrónico</th>
										<th>Dirección</th>
										<th>Télefono</th>
										<th>Estado</th>
										<th><img src="../img/editar.svg" alt="Editar"></th>
										<th><img src="../img/borrar.svg" alt="Borrar"></th>
									</tr>
								</thead>
								<tbody>
									<?php

									while ($mostrar2 = mysqli_fetch_array($consulta2)) {
										?>
										<tr>


											<td><?php echo $mostrar2['id']; ?></td>
											<td><?php echo $mostrar2['nombre']; ?></td>
											<td><?php echo $mostrar2['apellido']; ?></td>
											<td class="lower-case"><?php echo $mostrar2['email']; ?></td>
											<td><?php echo $mostrar2['direccion']; ?></td>
											<td><?php echo $mostrar2['telefono']; ?></td>
											<td><?php echo $mostrar2['estado']; ?></td>
											<td class="center"><img src="../img/editando.svg" alt="Editando" class="editar-formulario"></td>
											<td class="center"><a href="../../controllers/admins/eliminar.usuario.php?id=<?php echo $mostrar2['id']; ?>"><img src="../img/borrando.svg" alt="Eliminar" class="eliminar-formulario"></a></td>
										</tr>
											<?php
										}
										?>
								</tbody>
							</table>
						</div>
						<div class="total">
							<span><p>Total:</p> 245</span>
						</div>
					</div>
			</article>

		</section>
	</div>


	<div class="container-formulario  registro" id="content-form"> <!-- mostrar-formulario -->
		<form action="../../controllers/admins/guardar.usuario.php" method="post" class="form-register" id="form-register"> <!-- mostrar-->
			<div class="form-title">
				<h1>Ingresar Usuario </h1>
			</div>
			<div class="form-content">
				<input type="number" placeholder="Cedula" name="id" class="full">
				<div class="input-group">
					<input type="text" placeholder="Nombres" name="nombre">
					<input type="text" placeholder="Apellidos" name="apellido">
				</div>
				<input type="email" class="full" placeholder="Correo electronico" name="email">
				<input type="text" class="full" placeholder="Direccion" name="direccion">
				<input type="number" class="full" placeholder="Celular" name="telefono">
				<div class="input-group">
					<input type="password" placeholder="Contraseña" name="password">
					<input type="password" placeholder="Repetir contraseña" name="confirPassword">
				</div>
				<!-- no se como colocar el name del select -->
				<div class="cta-group">
					<input type="reset" value="Cancelar" id="cerrar-ingresar">
					<input type="submit">
				</div>
			</div>
		</form>
		<form action="../../controllers/admins/update.usuario.php" method="post" class="form-actualizar " id="form-actualizar" > <!-- mostrar -->
			<div class="form-title">
				<h1>Editar Usuario </h1>
			</div>
			<div class="form-content" id="form-content-actualizar">
				<input type="number" placeholder="Cedula" name="id" class="full" >
				<div class="input-group">
					<input type="text" placeholder="Nombres" name="nombre">
					<input type="text" placeholder="Apellidos" name="apellido">
				</div>
				<input type="email" class="full" placeholder="Correo electronico" name="email">
				<input type="text" class="full" placeholder="Direccion" name="direccion">
				<input type="number" class="full" placeholder="Celular" name="telefono">
				<div class="input-group select">
					<label for="select">Estado:</label>
					<select name="estado" id="">
						<option value="">Seleccione un estado</option>
						<option value="Activo">Activo</option>
						<option value="Inactivo">Inactivo</option>
					</select>
				</div>
				<div class="cta-group">
					<input type="reset" value="Cancelar" id="cerrar-actualizar">
					<input type="submit">
				</div>
			</div>
		</form>

	</div>





	<script src="../../public/js/jquery.js"></script>
	<script src="../js/dataTables.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/user.js"></script>

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
		window.location.href= "../index.php"
		</script>';
	}
?>
