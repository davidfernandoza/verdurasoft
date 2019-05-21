<?php
session_start();
session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión | verduraSoft</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	</script>
	<link rel="stylesheet" href="css/login.css">

</head>
<body>

	<div class="container">

		<form action="../controllers/admins/session.admin.php" method="post" class="formulario"> <!-- mostrar-->
			<div class="titulo">
				<h1>Iniciar sesión</h1>
			</div>
			<div class="campos">
				<input type="number" placeholder="Cedula" name="id" class="full">
				<input type="password" placeholder="Contraseña" name="password" class="full">

				<div class="envio">
					<a href="../" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Iniciar sesion" class="enviar">
				</div>
			</div>
			<hr>
			<p class="texto">¿No me acuerdo de mi contraseña? <a href="./views/recuperar.password.php">Recuperar contraseña!</a></p>
		</form>
	</div>

	<script type="text/javascript" src="../public/js/jquery.js">
	</script>
	<script type="text/javascript" src="../public/js/bootstrap.js">
	</script>
	<script src="./js/index.js"></script>
	<script src="./js/login.js"></script>
</body>
</html>
