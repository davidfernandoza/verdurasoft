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
						<img src="../img/avatar/tiger.jpg" alt="img" class="content-img">
						<p class="text">Nicol steeven</p>
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
						<li class="item"><a href="#" class="link">Editar perfil</a></li>
						<li class="item"><a href="#" class="link">Cerrar sesion</a></li>
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
							<a href="#">Productos</a>
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
						<a href="#" id="ingresar-usuario">Ingresar producto</a>
						<form class="content-search" action="../index.html">
							<input type="search" name="search" placeholder="Cedula de usuario">
						</form>
					</div>
					<div class="container-info">
						<div class="content-info">
							<table border="1px">
								<tr>
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Correo electronico</th>
									<th>Direccion</th>
									<th>Telefono</th>
									<th><img src="../img/editar.svg" alt="Editar"></th>
									<th><img src="../img/borrar.svg" alt="Borrar"></th>
								</tr>
								<tr>
									<td>1088358516</td>
									<td>nicol</td>
									<td>steeven</td>
									<td class="lower-case">nsgomez02@misena.edu.co</td>
									<td>cra 10 # 30-18</td>
									<td>3135504351</td>
									<td class="center"><img src="../img/editando.svg" alt="Editando" class="editar-formulario"></td>
									<td class="center"><img src="../img/borrando.svg" alt="Eliminar" class="eliminar-formulario"></tr></td>
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


	<div class="container-formulario  registro" id="content-form"> <!-- mostrar-formulario -->
		<form action="" method="" class="form-register" id="form-register"> <!-- mostrar-->
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
					<input type="password" placeholder="Repetir contraseña">
				</div>
				<!-- no se como colocar el name del select -->
				<div class="input-group select">
					<label for="select">Estado:</label>
					<select name="" id="">
						<option value="">Seleccione un estado</option>
						<option value="">Activo</option>
						<option value="">Innactivo</option>
					</select>
				</div>
				<div class="cta-group">
					<input type="reset" value="Cancelar" id="cerrar-ingresar">
					<input type="submit">
				</div>
			</div>
		</form>		
		<form action="" method="" class="form-actualizar " id="form-actualizar" > <!-- mostrar -->
			<div class="form-title">
				<h1>Editar Usuario </h1>
			</div>
			<div class="form-content" id="form-content-actualizar">
				<input type="number" placeholder="Cedula" name="id" class="full" disabled>
				<div class="input-group">
					<input type="text" placeholder="Nombres">
					<input type="text" placeholder="Apellidos">
				</div>
				<input type="email" class="full" placeholder="Correo electronico">
				<input type="text" class="full" placeholder="Direccion">
				<input type="number" class="full" placeholder="Celular">
				<div class="input-group select">
					<label for="select">Estado:</label>
					<select name="" id="">
						<option value="">Seleccione un estado</option>
						<option value="">Activo</option>
						<option value="">Innactivo</option>
					</select>
				</div>
				<div class="cta-group">
					<input type="reset" value="Cancelar" id="cerrar-actualizar">
					<input type="submit">
				</div>
			</div>
		</form>

	</div>





	<script src="../js/index.js"></script>
	<script src="../js/user.js"></script>
</body>
</html>