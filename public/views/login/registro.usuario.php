<?php
session_start();
if(isset($_SESSION['id_usuario'])){
	  echo "<script languaje='javascript'>window.location.href= '../../../' </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
	<title>Crear usuario</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/registro_usuario.css">
	<link rel="shortcut icon" href="../../img/favicon.png">
</head>
<body>
	<nav class="BNav navbar navbar-expand-lg navbar-dark menu" id="inicio">
		<a class="letra" class="navbar-brand" href="../../../"><img src="../../img/favicon.png" width="50px" class="logo">VerduraSoft</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="../../../">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../carrito/carrito.php">Productos</a>
				</li>
			</ul>
			<div>
				<a class="usuario_log" href="../login/login.usuario.php">
				<img src="../../../admin/img/avatar/defecto.png" width="30">
				<p class="name-user">Iniciar sesión</p>
				</a>
			</div>
		</div>

	</nav>
	<div class="container">
		<form action="../../../controllers/public/guardar.usuario.php" method="post" class="formulario">
			<div class="titulo">
				<h1>Registrar usuario</h1>
			</div>
			<div class="campos">
				<input type="text" placeholder="Escriba su nombre" name="nombre" class="full" required maxlength="45">
				<input type="text" placeholder="Escriba su apellido" name="apellido" class="full" required maxlength="45">
				<input type="email" placeholder="Escriba su correo" name="email" class="full" required maxlength="150">
				<input type="password" placeholder="Contraseña" name="password" class="full" required maxlength="16" minlength="8">
				<input type="password" placeholder="Confirmar contraseña" name="confirPassword" class="full" required maxlength="16" minlength="8">
				<input type="text" placeholder="Escriba su dirección" name="direccion" class="full" required maxlength="100">
				<input type="number" placeholder="Escriba su telefono" name="telefono" class="full" max="999999999999999" min="10000000">
				<div class="envio">
					<a href="../../../" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Registrar" class="enviar">
				</div>
			</div>
		</form>
	</div>

	<script type="text/javascript" src="../../js/jquery.js">
	</script>
	<script type="text/javascript" src="../../js/bootstrap.js">
	</script>

</body>
</html>
