<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear administrador</title>
	<link rel="stylesheet" href="./estilos.css">
</head>
<body>
	<h1>Crear administrador</h1>
	<p><a href="./loginA.php">Login administrador</a></p>
	<form action="../admins/guardar.admin.php" method="post" class="formulario" enctype="multipart/form-data">

		<label>cedula</label>
		<input type="number" name="cedula" required>

		<label>nombres</label>
		<input type="text" name="nombre" required>

		<label>apellidos</label>
		<input type="text" name="apellido" required>

		<label>email</label>
		<input type="email" name="email" required>

		<label>password</label>
		<input type="password" name="password" required>

		<label>confirmar password</label>
		<input type="password" name="confirPassword" required>

		<label>telefono</label>
		<input type="number" name="telefono">

		<label>foto</label>
		<input type="file" name="foto">

		<input type="submit" value="Enviar">
	</form>

</body>
</html>
