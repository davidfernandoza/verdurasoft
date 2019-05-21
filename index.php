<?php
session_start();
$_SESSION['detalle'] = array();
include './controllers/conexion.php';
$query1 = "SELECT * FROM productos LIMIT 0, 4";
$consulta1 = mysqli_query($conexion, $query1);

$query2 = "SELECT * FROM productos LIMIT 5, 4";
$consulta2 = mysqli_query($conexion, $query2);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="./public/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./public/css/estilos.css">
	<link rel="shortcut icon" href="./public/img/favicon.png">
	<title>VerduraSoft</title>
</head>
<body>

	<!-- Colocar en el navegador -->


	<nav class="BNav navbar navbar-expand-lg navbar-dark menu" id="inicio">
		<a class="letra" class="navbar-brand" href="./"><img src="./public/img/favicon.png" width="50px" class="logo">VerduraSoft</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="./">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./public/views/carrito/carrito.php">Productos</a>
				</li>
				<?php
				if(!isset($_SESSION['id_usuario'])){
					?>
					<li class="nav-item">
						<a class="nav-link" href="./public/views/login/registro.usuario.php">Registro</a>
					</li>
				<?php }else{?>
					<li class="nav-item">
						<a class="nav-link" href="./controllers/public/session.salir.usuario.php">Cerrar sesion</a>
					</li>

				<?php }?>
			</ul>
			<div>
				<a class="usuario_log" href="./public/views/login/login.usuario.php">
					<img src="./admin/img/avatar/defecto.png" width="30">
				<?php
				if(isset($_SESSION['id_usuario'])){
				?>
				<p class="name-user"><?php echo $_SESSION['nombres']. ' '.$_SESSION['apellidos']?></p>
				<?php }else{?>
				<p class="name-user">Iniciar sesión</p>
				<?php }?>
				</a>
			</div>
		</div>
	</nav>
	<!-- Slider bootstrap -->
	<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./public/img/slider/img1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-slider">VerduraSoft.</h2>
          <p class="text-slider">Déjanos atenderte como te lo mereces.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./public/img/slider/img2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-slider">Productos Frescos.</h2>
          <p class="text-slider">Los productos mas frescos a tu alcance.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./public/img/slider/img3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-slider">Varios Chefs nos recomiendan.</h2>
          <p class="text-slider">Somos los mejores del mercado.</p>
        </div>
      </div>
			<div class="carousel-item">
        <img src="./public/img/slider/img4.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-slider">El campo a un clic de distancia.</h2>
          <p class="text-slider">Campesinos trabajan arduamente para que tengas lo mejor.</p>
        </div>
      </div>
			<div class="carousel-item">
        <img src="./public/img/slider/img5.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="text-slider">Formas comodas de pago.</h2>
          <p class="text-slider">Paga de forma facil y segura.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	<div class="contenedor" id="nosotros">
		<div class="parrafo">
			<div>
				<div class="titulo1">
					<H2>¿Quienes somos?</H2>
				</div>
				<p>Somos una empresa dedicada a la venta y distribución de verduras online,las cuales son cultivadas por nosotros mismos brindando la mejor calidad en productos,contamos con el mejor servicio al cliente para que te sientas atendido de la mejor manera, somos numero uno en ventas a todo el pais. distribuimos a gran cantidad de revuelterias, supermercados y plazas de mercado del pais.
				</p>
			</div>
		</div>
		<div class="imagen_contenedor">
			<img src="./public/img/general.jpg">
		</div>
	</div>
	<div class="contenedor">
		<div class="imagen_contenedor2">
			<img src="./public/img/camion.jpg">
		</div>
		<div class="parrafo">
			<p>Haz tu pedido y te lo llevamos a donde estes ubicado en cualquier parte del pais,no lo pienses te llega lo mas fresco y pronto posible...</p>
		</div>
	</div>
	<!-- Preguntas frecuentes-->
	<div class="conte_preguntas">
		<h2 class="titulo_preguntas">Preguntas Frecuentes</h2>
	</div>
	<button class="accordion">¿Cuanto tiempo demora el envio del pedido?</button>
	<div class="panel">
		<p>Hola, Buenas tardes, el envio tiene un tiempo estimado depende de donde estes ubicado.</p>
	</div>

	<button class="accordion">Que tan frescos son los productos?</button>
	<div class="panel">
		<p>Hola, Buenos dias, los productos siempre estan 100% frescos.</p>
	</div>

	<button class="accordion">¿como son enviados los productos?</button>
	<div class="panel">
		<p>Hola, buenas tardes, los productos son enviados en un camion o vehiculo autorizado depende la cantidad de el pedido</p>
	</div>
	<button class="accordion">¿Donde estan ubicados?</button>
	<div class="panel">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
	<button class="accordion">¿como puedo comprar?</button>
	<div class="panel">
		<p>Hola, buenas tardes, tienes que registrarte para poder realizar la compra.</p>
	</div>

	<div class="contenedor_galeria" id="galeria">
		<div class="conte_titulo_galeria">
			<h2 class="titulo_galeria">GALERÍA</h2>
		</div>
		<div class="galeria_linea1">
			<?php
			while($fila = mysqli_fetch_row($consulta1)){
	      if ($fila[5] > 0) {
	    ?>
			<ul class="content-img">
				<div class="img">
					<img src="<?php echo './admin/'.$fila[2] ?>" alt="foto-<?php echo $fila[3] ?>">
				</div>
				<div class="content">
					<span><?php echo $fila[3] ?></span>
					<p><?php echo $fila[6] ?> COP</p>
				</div>
			</ul>
			<?php
				}
			}
			?>
		</div>

		<div class="galeria_linea2">
			<?php
			while($fila2 = mysqli_fetch_row($consulta2)){
	      if ($fila2[5] > 0) {
	    ?>
			<ul class="content-img">
				<div class="img">
					<img src="<?php echo './admin/'.$fila2[2] ?>" alt="foto-<?php echo $fila2[3] ?>">
				</div>
				<div class="content">
					<span><?php echo $fila2[3] ?></span>
					<p><?php echo $fila2[6] ?> COP</p>
				</div>
			</ul>
			<?php
				}
			}
			?>
		</div>

		<div class="boton_galeria">
			<a href="./public/views/carrito/carrito.php">Comprar!</a>
		</div>

	</div>
	<!--Testimonios-->
	<div class="titulo_testimonios" id="testimonios">
		<h2 class="titulo_test">TESTIMONIOS</h2>
	</div>

	<div class="testimonios">
		<div class="usuario">
			<img class="foto-testimonio" src="./public/img/Usuarios/usuario1.jpg">
			<div class="comentario">
				<p>"Es una excelente empresa, cumplida y rapida con el envio"</p>
			</div>
		</div>
		<div class="usuario">
			<img class="foto-testimonio" src="./public/img/Usuarios/usuario2.jpg">
			<div class="comentario">
				<p>"Excelentes productos frescos y de gran tamaño"</p>
			</div>
		</div>
		<div class="usuario">
			<img class="foto-testimonio" src="./public/img/Usuarios/usuario3.jpg">
			<div class="comentario">
				<p>"Es una empresa grandiosa, tiene la flexibilidad de cualquier medio de pago"</p>
			</div>
		</div>
		<div class="usuario">
			<img class="foto-testimonio" src="./public/img/Usuarios/usuario4.jpg">
			<div class="comentario">
				<p>"Gracias por los excelentes productos y lo cumplidos que son para el envio"</p>
			</div>
		</div>
		<div class="usuario">
			<img class="foto-testimonio" src="./public/img/Usuarios/usuario5.jpg">
			<div class="comentario">
				<p>"Siempre los recomendare, son increibles y los productos 100% reales a como lo muestran"</p>
			</div>
		</div>
	</div>
	<footer>
		<div class="Nombre">
			<img src="./public/img/favicon.png" width="50px" class="logo">VerduraSoft</div>
		<div class="contenido">
			<li><a href="#inicio">Inicio</a></li>
			<li><a href="#nosotros">Nosotros</a></li>
			<li><a href="#testimonios">Testimonios</a></li>
			<li><a href="#galeria">Galeria</a></li>
			<?php
			if(!isset($_SESSION['id_usuario'])){
				?>
				<li>
					<a href="./admin">Administración</a>
				</li>
			<?php } ?>
		</div>
		<div class="formulario">
			<form action="./controllers/public/contacto.user.php" method="post">
				<fieldset>
					<div class="form-group text">
						<label for="exampleInputEmail1">Nombre</label>
						<input name="nombre_from" type="text" class="form-control" placeholder="Escriba su nombre" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Correo</label>
						<input name="email_from" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escriba su correo" required>
					</div>
					<div class="form-group">
						<label for="exampleTextarea">Mensaje</label>
						<textarea name="mensaje" class="form-control" id="exampleTextarea" rows="3" placeholder="Escriba su mensaje" required></textarea>
					</div>
					<input type="hidden" name="asunto" value="Contacto: ">
					<input type="hidden" name="email_send" value="verdurasoft@gmail.com">
					<input type="hidden" name="nombre_send" value="VerduraSoft">
					<button type="submit" class="btn btn-primary">Submit</button>
				</fieldset>
			</form>
		</div>
		<div class="mapa">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.6102548103504!2d-75.6831183859563!3d4.836793096487763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3881a4b50bb31d%3A0x9150c2e299ed35b0!2sCDITI+SENA+Dosquebradas!5e0!3m2!1ses-419!2sco!4v1557688958887!5m2!1ses-419!2sco" width="600" height="300" frameborder="0" style="border:0" allowfullscreen>
			</iframe>
		</div>
	</footer>

	<!-- Javascript -->
	<script type="text/javascript" src="./public/js/jquery.js">
	</script>
	<script type="text/javascript" src="./public/js/bootstrap.js">
	</script>
	<script type="text/javascript" src="./public/js/preguntas.js">
	</script>
</body>
</html>
