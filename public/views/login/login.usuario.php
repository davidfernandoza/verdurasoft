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
	<title>Login usuario</title>
</head>
<body>
	<p><a href="./login.usuario.php">Registro usuario</a></p>
	<p><a href="../carrito/carrito.php">Productos</a></p>
	<p><a href="../../../index.php">Inicio</a></p>
	<form action="../../../controllers/usuarios/session.usuario.php" method="post">

    <label>email</label>
    <input type="email" name="email" required>


    <label>password</label>
    <input type="password" name="password" required>

    <input type="submit" value="Enviar">
  </form>

</body>
</html>
