<?php
session_start();
if (isset($_SESSION['ident'])) {
	echo '<script languaje="javascript">
	window.location.href= "../"
	</script>';
}
else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VerduraSoft | Administración</title>
	<link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	</script>
	<link rel="stylesheet" href="../../css/recuperar.css">
  <link rel="shortcut icon" href="../../../public/img/favicon.png">
</head>
<body>

	<div class="container">

		<form action="../../../controllers/admins/recuperar.password.php" method="post" class="formulario"> <!-- mostrar-->
			<div class="titulo">
				<h1 class="h3">Recuperar contraseña</h1>
			</div>
			<div class="campos">
				<input type="number" placeholder="Cédula" name="id" class="full" required max="99999999999" min="0">
				<div class="envio">
					<a href="../../" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Enviar" class="enviar">
				</div>
			</div>
		</form>
	</div>

	<script type="text/javascript" src="../../../public/js/jquery.js">
	</script>
	<script type="text/javascript" src="../../../public/js/bootstrap.js">
	</script>
	<script src="../../js/index.js"></script>
	<script src="../../js/login.js"></script>
</body>
</html>
<?php
}
 ?>
