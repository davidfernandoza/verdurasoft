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
				<form action="../../../controllers/admins/update.password.php" method="post" class="form-register" > <!-- mostrar-->
					<div class="form-title">
						<h1>Cambiar Contraseña</h1>
					</div>

					<div class="container-formulario-img">
						<div class="container-img">

								<!-- password -->
								<input type="password" placeholder="Nueva Contraseña" name="password" maxlength="16" minlength="8" required title="Contraseña Nueva">

								<!-- confirmar password -->
								<input type="password" placeholder="Confirma la Contraseña" name="confirPassword" maxlength="16" minlength="8" required title="Repetir Contraseña Nueva">

								<!-- password actual -->
								<input type="password" placeholder="Contraseña Actual" name="password_old" required title="Contraseña Actual">

								<!-- password de base de datos -->
								<input type="hidden" name="password_db" value="<?php echo $fila['password']?>" >
							</div>

							<div class="cta-group">

								<!-- id oculto-->
								<input type="hidden" name="id" value="<?php echo $fila['id']  ?>" >

								<!-- botones -->
								<a href="../" class="Cancelar">Cancelar</a>
								<input type="submit" value="Cambiar">
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
