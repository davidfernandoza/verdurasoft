<?php
session_start();
if(isset($_SESSION['id_usuario'])){
	  echo "<script languaje='javascript'>window.location.href= '../../../index.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login usuario</title>
	<link rel="stylesheet" type="text/css" href="../../css/login_usuario.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body>
	<nav class="BNav navbar navbar-expand-lg navbar-dark menu" id="inicio">
		<a class="letra" class="navbar-brand" href="#">VerduraSoft</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="../../../index.php">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../carrito/carrito.php">Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./registro.usuario.php">Registro usuario</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<form action="../../../controllers/usuarios/session.usuario.php" method="post" class="formulario">
			<div class="titulo">
				<h1>Iniciar sesión</h1>
			</div>
			<div class="campos">
				<input type="email" placeholder="Escriba su correo" name="email" class="full" required="">
				<input type="password" placeholder="Contraseña" name="password" class="full" required="">
				<div class="envio">
					<a href="../../../index.php" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Iniciar sesion" class="enviar">
				</div>
			</div>
		</form>
	</div>
</body>
</html>
