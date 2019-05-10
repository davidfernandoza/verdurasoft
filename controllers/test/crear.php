<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear usuario</title>
	<link rel="stylesheet" href="./estilos.css">
</head>
<body>
	<h1>Crear ususario</h1>
	<p><a href="./login.php">Login ususario</a></p>
	<form action="../usuarios/guardar.usuario.php" method="post" class="formulario">

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
