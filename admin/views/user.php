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
	<link rel="stylesheet" href="../css/dataTables.css">
	<script src="../js/code_jquery.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="shortcut icon" href="../../public/img/favicon.png">
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
					</div>
					<div class="container-info">
						<div class="content-info">
							<table border="1px" id="table_id">
								<thead>
									<tr>
										<th>CC/NIT</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Correo electrónico</th>
										<th>Dirección</th>
										<th>Estado</th>
										<th>Télefono</th>
										<th><img src="../img/editar.svg" alt="Editar"></th>
										<th><img src="../img/borrar.svg" alt="Borrar"></th>
										<th><img src="../img/check.svg" alt="Agregar"></th>
										<th class="no-mostrar">id</th>
									</tr>
								</thead>
								<tbody>
									<?php

									while ($mostrar2 = mysqli_fetch_array($consulta2)) {
										?>
										<tr>
											<td><?php echo $mostrar2['cc']; ?></td>
											<td><?php echo $mostrar2['nombre']; ?></td>
											<td><?php echo $mostrar2['apellido']; ?></td>
											<td class="lower-case"><?php echo $mostrar2['email']; ?></td>
											<td><?php echo $mostrar2['direccion']; ?></td>
											<td><?php echo $mostrar2['estado']; ?></td>
											<td><?php echo $mostrar2['telefono']; ?></td>
											<td class="center"><img src="../img/editando.svg" alt="Editando" class="editar-formulario"></td>
											<td class="center"><a href="../../controllers/admins/eliminar.usuario.php?id=<?php echo $mostrar2['id']; ?>"><img src="../img/borrando.svg" alt="Eliminar" class="eliminar-formulario"></a></td>
											<td class="center"><a href="../../controllers/admins/activar.usuario.php?id=<?php echo $mostrar2['id']; ?>"><img src="../img/plus.svg" alt="Activar" class="eliminar-formulario"></a></td>
											<td class="no-mostrar"><?php echo $mostrar2['id']; ?></td>
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


	<div class="container-formulario  registro" id="content-form"> <!-- mostrar-formulario -->
		<form action="../../controllers/admins/guardar.usuario.php" method="post" class="form-register" id="form-register"> <!-- mostrar-->

			<div class="form-title">
				<h1>Ingresar Usuario </h1>
			</div>
			<div class="form-content">
				<input type="number" placeholder="Cédula/Nit" name="cc" class="full" max="999999999999" min="10000" required="">
				<div class="input-group">
					<input type="text" placeholder="Nombres" name="nombre" required  maxlength="44">
					<input type="text" placeholder="Apellidos" name="apellido" required  maxlength="44">
				</div>
				<input type="email" class="full" placeholder="Correo Electronico" name="email" required="" maxlength="149">
				<input type="text" class="full" placeholder="Dirección-Ciudad-Departamento" name="direccion" required="" maxlength="99">
				<input type="number" class="full" placeholder="Telefono/Celular" name="telefono" required="" max="99999999999999" min="10000000">
				<div class="cta-group">
					<input type="reset" value="Cancelar" id="cerrar-ingresar">
					<input type="submit">
				</div>
			</div>
		</form>

<!-- Actualizar -->
		<form action="../../controllers/admins/update.usuario.php" method="post" class="form-actualizar " id="form-actualizar" > <!-- mostrar -->

			<div class="form-title">
				<h1>Editar Usuario </h1>
			</div>

			<div class="form-content" id="form-content-actualizar">
				<!-- cedula o nit -->
				<input type="number" placeholder="Cédula/Nit" title="Cédula/Nit" name="cc" class="full" max="999999999999" min="10000" required="">
				<div class="input-group">
					<!-- Nombre -->
					<input type="text" placeholder="Nombres" name="nombre" title="Nombres" required  maxlength="44">
					<!-- Apellidos -->
					<input type="text" placeholder="Apellidos" name="apellido" title="Apellidos" required  maxlength="44">
				</div>
				<!-- email -->
				<input type="email" class="full" placeholder="Correo Electronico" title="Correo Electronico" name="email" required="" maxlength="149">
				<!-- Direccion -->
				<input type="text" class="full" placeholder="Dirección-Ciudad-Departamento" title="Dirección-Ciudad-Departamento" name="direccion" required="" maxlength="99">
				<!-- Telefono -->
				<input type="number" class="full" placeholder="Telefono/Celular" title="Telefono/Celular" name="telefono" required="" max="99999999999999" min="10000000">
				<div class="cta-group">
					<input type="hidden" name="id" >
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
	<script src="../js/config.js">
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
