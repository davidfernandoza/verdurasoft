<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	  echo "<script languaje='javascript'>window.location.href= './carrito.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
		<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>
  </head>
  <body>
    <h1>Compra realizada</h1>
	  <p><a href="./carrito.php">Productos</a></p>
		<p><a href="../../../">Inicio</a></p>

		<script type="text/javascript" src="../../js/jquery.js">
		</script>
		<script type="text/javascript" src="../../js/bootstrap.js">
		</script>
  </body>
</html>
