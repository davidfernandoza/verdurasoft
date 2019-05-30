<<<<<<< HEAD
<?php
session_start();
if (isset($_SESSION['ident'])) {
	echo '<script languaje="javascript">
	window.location.href= "./views/"
	</script>';
}
else {
?>
=======
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>VerduraSoft | Administración</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	</script>
	<link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="../public/img/favicon.png">

</head>
<body>

	<div class="container">

		<form action="../controllers/admins/session.admin.php" method="post" class="formulario"> <!-- mostrar-->
			<div class="titulo">
				<h1>Iniciar sesión</h1>
			</div>
			<div class="campos">
				<input type="number" placeholder="Cédula" name="id" class="full" required max="99999999999" min="0">
				<input type="password" placeholder="Contraseña" name="password" class="full" required>

				<div class="envio">
					<a href="../" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Iniciar sesión" class="enviar">
				</div>
			</div>
			<hr>
			<p class="texto">¿No me acuerdo de mi contraseña? <a href="./views/auth/recuperar.password.php">Recuperar contraseña!</a></p>
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
<<<<<<< HEAD

<?php
}
 ?>
=======
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
