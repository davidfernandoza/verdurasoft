<?php
session_start();
if (!isset($_SESSION['ident'])) {
	echo '<script languaje="javascript">
	var mensaje ="Usted no tiene acceso a este contenido, por favor inicie sesión";
	alert(mensaje);
	window.location.href= "../../"
	</script>';
}
else {

	include ('../../../controllers/conexion.php');
	$id = $_GET['id'];
	$query= "SELECT * FROM admins WHERE id = $id;";
	$resultado = mysqli_query($conexion, $query);
	while ($fila = mysqli_fetch_array($resultado)) {
		?>

		<!DOCTYPE html>
		<html lang="es" dir="ltr">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<link rel="shortcut icon" href="../../../public/img/favicon.png">

			<!-- faltan los estilos para esta vista -->
			<link rel="stylesheet" href="../../css/editar_admin.css">

			<link rel="shortcut icon" href="../../public/img/favicon.png">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<title>VerduraSoft | Administración</title>
		</head>
		<body>

			<!-- Contenedor formulario -->
		<div class="contenedortotalform">
			<div class="container-formulario  registro" > <!-- mostrar-formulario -->
				<form action="../../../controllers/admins/update.admin.php" method="post" class="form-register"   enctype="multipart/form-data"> <!-- mostrar-->
					<div class="form-title">
						<h1>Editar Administrador </h1>
					</div>

					<div class="container-formulario-img">
						<div class="container-img">

							<!-- elegir foto -->
							<input type="file" name="foto" id="" placeholder="Tu foto">
						</div>
						<div class="form-content">
							<div class="input-group">

								<!-- nombres -->
								<input type="text" class="nombre" placeholder="Nombres" name="nombre" maxlength="45" required value="<?php echo $fila['nombre']  ?>" >

								<!-- apellidos -->
								<input type="text" placeholder="Apellidos" name="apellido" maxlength="50" required value="<?php echo $fila['apellido']?>" >

							</div>

							<!-- Email -->
							<input type="email" class="full" placeholder="Correo electrónico" name="email" maxlength="150" minlength="5" required value="<?php echo $fila['email']  ?>" >

							<!-- Telefono -->
							<input type="number" placeholder="Telefono" class="full" name="telefono" max="999999999999999" min="1000000" required value="<?php echo $fila['telefono']  ?>">
							<div class="input-group">

								<!-- password -->
								<input type="password" placeholder="Contraseña" name="password" maxlength="16" minlength="8" required>

								<!-- confirmar password -->
								<input type="password" placeholder="Repetir contraseña" name="confirPassword" maxlength="16" minlength="8" required>
							</div>
							<div class="cta-group">
								<!-- id oculto-->
								<input type="hidden" name="id" value="<?php echo $fila['id']  ?>" >

								<!-- botones -->
								<a href="../admin.php" class="Cancelar">Cancelar</a>
								<input type="submit" value="Actualizar">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		</body>
		</html>
		<?php
	}
}
?>
