<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión | verduraSoft</title>
	<script src="js/code_jquery.js"></script>
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
					<a href="../index.php" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Iniciar sesion" class="enviar">
				</div>
			</div>

		</form>
	</div>

	<script src="./js/index.js"></script>
	<script src="./js/login.js"></script>
</body>
</html>
