<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login administrador</title>
	<link rel="stylesheet" href="./estilos.css">
</head>
<body>
	<h1>Login administrador</h1>
	<p><a href="./crearA.php">Crear administrador</a></p>
	<form action="../admins/session.admin.php" method="post" class="formulario">

    <label>email</label>
    <input type="email" name="email" required>

    <label>password</label>
    <input type="password" name="password" required>

    <input type="submit" value="Enviar">
  </form>

</body>
</html>
