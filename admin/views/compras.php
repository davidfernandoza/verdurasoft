<?php

	session_start();
	if (isset($_SESSION['ident'])) {

		include('conexion.php');
		$id = $_SESSION['ident'];
		$query= "SELECT * FROM admins WHERE id = '$id';";
		$consulta = mysqli_query($conexion, $query);
		$mostrar = mysqli_fetch_array($consulta);
		$query2= "SELECT * FROM compras ";
		$consulta2 = mysqli_query($conexion, $query2);
		$mostrar2 = mysqli_fetch_array($consulta2);

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>VerduraSoft | Compras</title>
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
						<a href="#">Productos: 125.211</a>						
						<a href="#">Compras: 152.224</a>						
					</ul>
			</aside>
			<article  class="container-article">
					<div class="input-group">
						<a href="#" id="ingresar-ventas">Ingresar venta</a>
						<form class="content-search" action="../index.php">
							<input type="search" name="search" placeholder="Cedula de usuario">
						</form>
					</div>
					<div class="container-info">
						<div class="content-info">
							  <table border="1px">
								<tr>
									<th class="sin-fondo">codigo usuario</th>
									<th class="sin-fondo">codigo producto</th>
									<th>Usuario</th>
									<th>Producto</th>
									<th>Factura</th>
									<th>Cantidad</th>
									<th>Valor u.</th>
									<th>Total</th>
									<th>Estado</th>
									<th><img src="../img/editar.svg" alt="Editar"></th>
									<th><img src="../img/borrar.svg" alt="Borrar"></th>
								</tr>
								<tr>
									<td class="sin-fondo">1234</td>
									<td class="sin-fondo">45321</td>
									<td>Nicol</td>
									<td>silantro</td>
									<td>0121</td>
									<td id="cantidad">15</td>
									<td id="valor">2</td>
									<td id="total"></td> <!-- este valor dejarlo totalmente en blanco -->
									<td>activo</td>
									<td class="center"><img src="../img/editando.svg" class="editar-formulario" class="editar-formulario" alt="Editando"></td>
									<td class="center"><img src="../img/borrando.svg" class="eliminar-formulario" class="eliminar-formulario" alt="Eliminar"></tr></td>
								</tr>

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
		<form action="../../guardar.compras.admin.php" method="" class="form-register"  id="form-register" > <!-- mostrar-->
			<div class="form-title">
				<h1>Ingresar venta</h1>
			</div>
				<div class="form-content" id="form-content-ingresar">
					<div class="input-group">
						<input type="number" placeholder="codigo usuario" name="id" title="Codigo usuario">
						<input type="text" placeholder="codigo producto" name="codigo" title="Codigo producto">
					</div>
					<input type="text" placeholder="factura" name="factura" class="full">
					<div class="input-group">
						<input type="number" placeholder="Cantidad" name="Cantidad">
						<input type="number" placeholder="valor" name="Valor">
					</div>
					<input type="number" placeholder="Total" class="full" name="total">
					<!-- <input type="password" class="full" placeholder="Contraseña"> -->

					
					<div class="cta-group">
						<input type="reset" value="Cancelar" id="cerrar_ingresar">
						<input type="submit">
					</div>
				</div>
		</form>	
		<form action="" method="" class="form-actualizar" id="form-actualizar"> <!-- mostrar -->
			<div class="form-title">
				<h1>Editar venta </h1>
			</div>
			<div class="form-content" id="form-content-actualizar">
					<div class="input-group">
						<input type="number" placeholder="codigo usuario" name="id" title="Codigo usuario">
						<input type="text" placeholder="codigo producto" name="codigo" title="Codigo producto">
					</div>
					<input type="text" placeholder="factura" name="factura" class="full">
					<div class="input-group">
						<input type="number" placeholder="Cantidad" name="Cantidad">
						<input type="number" placeholder="valor" name="Valor">
					</div>
					<input type="number" placeholder="Total" class="full" name="total">
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
		</form>

	</div>





	<script src="../js/index.js"></script>
	<script src="../js/compras.js"></script>

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