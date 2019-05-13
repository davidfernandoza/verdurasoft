<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	  echo "<script languaje='javascript'>window.location.href= './carrito.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Compra realizada</h1>
	  <p><a href="./carrito.php">Productos</a></p>
		<p><a href="../../../index.php">Inicio</a></p>
  </body>
</html>
