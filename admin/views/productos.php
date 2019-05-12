<?php

	session_start();
	if (isset($_SESSION['ident'])) {

		include('conexion.php');
		$id = $_SESSION['ident'];
		$query= "SELECT * FROM admins WHERE id = '$id';";
		$consulta = mysqli_query($conexion, $query);
		$mostrar = mysqli_fetch_array($consulta);

		$query2= "SELECT * FROM productos ";
		$consulta2 = mysqli_query($conexion, $query2);
		$mostrar2 = mysqli_fetch_array($consulta2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VerduraSoft | Productos</title>
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
						<a href="#">Productos: 125.211</a>						
						<a href="#">Compras: 152.224</a>						
					</ul>
			</aside>
			<article  class="container-article">
					<div class="input-group">
						<a href="#" id="ingresar-producto">Ingresar productos</a>
						<form class="content-search" action="../index.php">
							<input type="search" name="search" placeholder="Cedula de usuario">
						</form>
					</div>
					<div class="container-info">
						<div class="content-info">
							  <table border="1px">
								<tr>
									<th class="sin-fondo">Foto</th>
									<th class="sin-fondo">Codigo</th>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Valor</th>
									<th>Cantidad</th>
									<th>Estado</th>
									<th><img src="../img/editar.svg" alt="Editar"></th>
									<th><img src="../img/borrar.svg" alt="Borrar"></th>
								</tr>
								<?php 

										while ($mostrar2 = mysqli_fetch_array($consulta2)) {
									?>
								<tr>
									

									<td class="sin-fondo"><img src="../img/sin-fondo.png" alt="../img/sin-fondo.png"></td>
									<td class="sin-fondo">1234</td>
									<td> <?php echo $mostrar2['nombre']; ?></td>
									<td><?php echo $mostrar2['descripcion']; ?> </td>
									<td class="lower-case"><?php echo $mostrar2['valor']; ?></td>
									<td><?php echo $mostrar2['cantidad']; ?></td>
									<td><?php echo $mostrar2['estado']; ?></td>
									<td class="center"><img src="../img/editando.svg" class="editar-formulario" class="eliminar-formulario" alt="Editando"></td>
									<td class="center"><img src="../img/borrando.svg" class="eliminar-formulario" class="eliminar-formulario" alt="Eliminar"></tr></td>
								</tr>
									<?php
											}
										?>

							</table>
						</div>
						<div class="total">
							<span><p>Total:</p> 245</span>
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
					<input type="file" name="foto" id="" placeholder="Tu foto">
					<input type="hidden" name="admin_id" value="<?php echo $id?>">
				</div>
				<div class="form-content" id="form-content-register">
					<div class="input-group">
						<input type="number" placeholder="codigo" name="id">
						<input type="text" placeholder="Nombre" name="nombre">
					</div>
					<input type="text" placeholder="Descripcion" name="descripcion" class="full">
					<div class="input-group">
						<input type="number" placeholder="Valor" name="valor">
						<input type="number" placeholder="Cantidad" name="cantidad">
					</div>
					<input type="number" placeholder="Total" name="total" id="total" class="full">
					<div class="input-group select">
						<label for="select">Estado:</label>
						<select name="estado" id="">
							<option value="">Seleccione un estado</option>
							<option value="">Activo</option>
							<option value="">Innactivo</option>
						</select>
					</div>
					<!-- <input type="password" class="full" placeholder="Contraseña"> -->

					
					<div class="cta-group">
						<input type="reset" value="Cancelar" id="cerrar_ingresar">
						<input type="submit">
					</div>
				</div>
			</div>
		</form>	
		<form action="" method="" class="form-actualizar" id="form-actualizar" enctype="multipart/form-data"> <!-- mostrar -->
			<div class="form-title">
				<h1>Editar producto </h1>
			</div>
			<div class="container-formulario-img">
				<div class="container-img" id="container">
					<img src="../img/avatar/tiger.jpg" alt="">
					<input type="file" name="foto" id="" placeholder="Tu foto" >
				</div>
				<div class="form-content" id="form-content-actualizar">
					<div class="input-group">
						<input type="number" placeholder="codigo" name="id" disabled>
						<input type="text" placeholder="nombre" name="nombre">
					</div>
					<input type="text" placeholder="Descripcion" name="descripcion" class="full">
					<div class="input-group">
						<input type="number" placeholder="Valor" name="valor">
						<input type="number" placeholder="Cantidad" name="cantidad">
					</div>
					<input type="number" placeholder="Total" class="full" name="total" id="total">
					<div class="input-group select">
						<label for="select">Estado:</label>
						<select name="" id="">
							<option value="">Seleccione un estado</option>
							<option value="">Activo</option>
							<option value="">Innactivo</option>
						</select>
					</div>
					<!-- <input type="password" class="full" placeholder="Contraseña"> -->

					
					<div class="cta-group">
						<input type="reset" value="Cancelar" id="cerrar_editar">
						<input type="submit">
					</div>
				</div>
			</div>
		</form>

	</div>





	<script src="../js/index.js"></script>
	<script src="../js/productos.js"></script>

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