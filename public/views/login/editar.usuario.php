<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	  echo "<script languaje='javascript'>window.location.href= '../../../' </script>";
}
else{
	require '../../../controllers/conexion.php';
	$id = $_GET['id'];
	$query = "SELECT * FROM usuarios WHERE id = '$id'";
	$consulta = mysqli_query($conexion, $query);

	if($consulta->num_rows == 0){
		echo "<script languaje='javascript'>window.location.href= '../../../' </script>";
	}
	else{
		$consulta = mysqli_fetch_array($consulta);
	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Editar usuario</title>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
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
				<li class="nav-item">
					<a class="nav-link" href="./controllers/public/session.salir.usuario.php">Cerrar sesion</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<form action="../../../controllers/public/editar.usuario.php" method="post" class="formulario">
			<div class="titulo">
				<h1>Editar usuario</h1>
			</div>
			<div class="campos">
				<input type="text" placeholder="Escriba su nombre" name="nombre" class="full" value="<?php echo $consulta['nombre'] ?>" required maxlength="45">

				<input type="text" placeholder="Escriba su apellido" name="apellido" value="<?php echo $consulta['apellido'] ?>" class="full" required maxlength="45">
				<input type="email" placeholder="Escriba su correo" name="email" value="<?php echo $consulta['email'] ?>" class="full" required maxlength="150">
				<input type="password" placeholder="Contraseña" name="password" class="full" required minlength="8" maxlength="16">
				<input type="password" placeholder="Confirmar contraseña" name="confirPassword" class="full" minlength="8" maxlength="16" required>
				<input type="text" placeholder="Escriba su dirección" value="<?php echo $consulta['direccion'] ?>" name="direccion" class="full" required maxlength="100">
				<input type="number" placeholder="Escriba su telefono" value="<?php echo $consulta['telefono'] ?>" name="telefono" class="full" maxlength="100">
				<input type="hidden" name="id" value="<?php echo $consulta['id'] ?>">
				<div class="envio">
					<a href="../../../" value="Cancelar" id="cerrar-iniciar" class="Cancelar">Cancelar</a>
					<input type="submit" value="Editar" class="enviar">
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
