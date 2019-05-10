<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login usuario</title>
	<link rel="stylesheet" href="./estilos.css">
</head>
<body>
	<h1>Login usuario</h1>
	<p><a href="./crear.php">Crear ususario</a></p>
	<form action="../usuarios/session.usuario.php" method="post" class="formulario">

    <label>email</label>
    <input type="email" name="email" required>


    <label>password</label>
    <input type="password" name="password" required>

    <input type="submit" value="Enviar">
  </form>

</body>
</html>
