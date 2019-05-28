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
						<h1>Editar Perfil </h1>
					</div>

					<div class="container-formulario-img">

						<div class="container-img" id="container">
							<div class="img_contenedor">
								<img id="agregar_img" src="../../<?php echo $fila['foto']?>">
							</div>
							<input type="file" name="foto" id="agregar_foto" >

							<!-- foto actual -->
							<input type="hidden" name="foto_old" value="<?php echo $fila['foto']?>">
						</div>

						<div class="form-content">

							<!-- id - cedula -->
							<input type="number" placeholder="Cédula" name="id_new" max="999999999999999" min="1000000" required value="<?php echo $fila['id']  ?>" title="Cédula">
							<input type="hidden" name="id" value="<?php echo $fila['id']  ?>" >

							<div class="input-group">

								<!-- nombres -->
								<input type="text" class="nombre" placeholder="Nombres" name="nombre" maxlength="45" required value="<?php echo $fila['nombre']  ?>" title="Nombres">

								<!-- apellidos -->
								<input type="text" placeholder="Apellidos" name="apellido" maxlength="50" required value="<?php echo $fila['apellido']?>" title="Apellidos">

							</div>

							<!-- Email -->
							<input type="email" class="full" placeholder="Correo electrónico" name="email" maxlength="150" minlength="5" required value="<?php echo $fila['email']  ?>" title="Correo Electrónico">

							<!-- Telefono -->
							<input type="number" placeholder="Telefono/Celular" class="full" name="telefono" max="999999999999999" min="1000000" required value="<?php echo $fila['telefono']  ?>" title="Telefono/Celular">
							<div class="input-group">

								<!-- password -->
								<input type="password" placeholder="Contraseña Actual" name="password" maxlength="16" minlength="8" required title="Contraseña Actual">

								<input type="hidden" name="password_db" value="<?php echo $fila['password']?>" >

							</div>
							<div class="cta-group">
								<!-- id oculto-->
								<input type="hidden" name="id" value="<?php echo $fila['id']  ?>" >

								<!-- botones -->
								<a href="../" class="Cancelar">Cancelar</a>
								<input type="submit" value="Actualizar">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<script src="../../../public/js/jquery.js"></script>
		<script type="text/javascript">
		$(window).on('load', function(){

			$(function() {
				$('#agregar_foto').change(function(e) {
					addImage(e);
				});


				function addImage(e){
					var file = e.target.files[0],
					imageType = /image.*/;

					if (!file.type.match(imageType))
					return;

					var reader = new FileReader();
					reader.onload = fileOnload;
					reader.readAsDataURL(file);
				}

				function fileOnload(e) {
					var result=e.target.result;
					$('#agregar_img').attr("src",result);
				}

			});

		});

		</script>
		</body>
		</html>
		<?php
	}
}
?>
