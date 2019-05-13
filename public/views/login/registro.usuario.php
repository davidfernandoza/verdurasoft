<?php
session_start();
if(isset($_SESSION['id_usuario'])){
	  echo "<script languaje='javascript'>window.location.href= '../carrito/carrito.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear usuario</title>
	<link rel="stylesheet" href="./estilos.css">
</head>
<body>
	<h1>Crear ususario</h1>
	<p><a href="./login.usuario.php">Login usuario</a></p>
	<p><a href="../carrito/carrito.php">Productos</a></p>
	<p><a href="../../../index.php">Inicio</a></p>
	<form action="../../../controllers/usuarios/guardar.usuario.php" method="post" class="formulario">

		<label>nombre</label>
    <input type="text" name="nombre" required>

		<label>apellido</label>
    <input type="text" name="apellido" required>

    <label>email</label>
    <input type="email" name="email" required>

    <label>password</label>
    <input type="password" name="password" required>

		<label>confirmar password</label>
    <input type="password" name="confirPassword" required>

		<label>direccion</label>
    <input type="text" name="direccion" required>

		<label>telefono</label>
    <input type="number" name="telefono">

    <input type="submit" value="Enviar">
  </form>

</body>
</html>
