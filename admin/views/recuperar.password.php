<?php
session_start();
session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recuperar contraseña | verduraSoft</title>
	<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
	</script>
	<link rel="stylesheet" href="../css/recuperar.css">

</head>
<body>

	<div class="container">

		<form action="../../controllers/admins/recuperar.password.php" method="post" class="formulario"> <!-- mostrar-->
			<div class="titulo">
				<h1 class="h3">Recuperar contraseña</h1>
			</div>
			<div class="campos">
				<input type="number" placeholder="Cedula" name="id" class="full">
				<div class="envio">
					<a href="../" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Enviar" class="enviar">
				</div>
			</div>
		</form>
	</div>

	<script type="text/javascript" src="../../public/js/jquery.js">
	</script>
	<script type="text/javascript" src="../../public/js/bootstrap.js">
	</script>
	<script src="../js/index.js"></script>
	<script src="../js/login.js"></script>
</body>
</html>
