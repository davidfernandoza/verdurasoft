<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="./public/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./public/css/estilos.css">
	<title>VerduraSoft</title>
</head>
<body>

	<!-- Colocar en el navegador -->


	<nav class="BNav navbar navbar-expand-lg navbar-dark menu" id="inicio">
		<a class="letra" class="navbar-brand" href="#">VerduraSoft</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./public/views/carrito/carrito.php">Productos</a>
				</li>
				<?php
				if(!isset($_SESSION['id_usuario'])){
					?>
					<li class="nav-item">
						<a class="nav-link" href="./admin/index.php#">Administración</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./public/views/login/registro.usuario.php">Registro usuario</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./public/views/login/login.usuario.php">Login</a>
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
				<p class="name-user">Ingresa ya!</p>
				<?php }?>
				</a>
			</div>
		</div>
	</nav>
	<div class="slider">
		<input type="radio" name="slider-select-element" id="element1" checked="checked" />
		<input type="radio" name="slider-select-element" id="element2" />
		<input type="radio" name="slider-select-element" id="element3" />

		<div id="slider-container">
			<div id="slider-box">
				<div class="slider-element">
					<article class="element-uno">
						<img src="./public/img/img1.jpg" >
					</article>
				</div>
				<div class="slider-element" >
					<article class="element-dos">
						<img src="./public/img/img2.jpg" >
					</article>
				</div>
				<div class="slider-element">
					<article class="element-tres">
						<img src="./public/img/img3.jpg" >
					</article>
				</div>
			</div>
		</div>

		<div id="slider-arrows">
			<label for="element1"></label>
			<label for="element2"></label>
			<label for="element3"></label>
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
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>

		</div>
		<div class="galeria_linea2">
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>
			<ul class="content-img">
				<div class="img">
					<img src="./public/img/img8.jpg" alt="imagen img8">
				</div>
				<div class="content">
					<span>Nombre</span>
					<p>000000</p>
				</div>
			</ul>
		</div>
		<div class="boton_galeria">
			<a href="./public/views/carrito/carrito.php">Ver más</a>
		</div>
	</div>
	<!--Testimonios-->
	<div class="titulo_testimonios" id="testimonios">
		<h2 class="titulo_test">TESTIMONIOS</h2>
	</div>

	<div class="testimonios">
		<div class="usuario">
			<img src="./public/img/usuario.png">
			<div class="comentario">
				<p>"Es una excelente empresa, cumplida y rapida con el envio"</p>
			</div>
		</div>
		<div class="usuario">
			<img src="./public/img/usuario.png">
			<div class="comentario">
				<p>"Excelentes productos frescos y de gran tamaño"</p>
			</div>
		</div>
		<div class="usuario">
			<img src="./public/img/usuario.png">
			<div class="comentario">
				<p>"Es una empresa grandiosa, te la flexibilidad de cualquier medio de pago"</p>
			</div>
		</div>
		<div class="usuario">
			<img src="./public/img/usuario.png">
			<div class="comentario">
				<p>"Gracias por los excelentes productos y lo cumplidos que son para el envio"</p>
			</div>
		</div>
		<div class="usuario">
			<img src="./public/img/usuario.png">
			<div class="comentario">
				<p>"Siempre los recomendare, son increibles y los productos 100% reales a como lo muestran"</p>
			</div>
		</div>
	</div>
	<footer>
		<div class="Nombre">VerduraSoft</div>
		<div class="contenido">
			<li><a href="#inicio">Inicio</a></li>
			<li><a href="#nosotros">Nosotros</a></li>
			<li><a href="#testimonios">Testimonios</a></li>
			<li><a href="#galeria">Galeria</a></li>
		</div>
		<div class="formulario">
			<form>
				<fieldset>
					<div class="form-group text">
						<label for="exampleInputEmail1">Nombre</label>
						<input type="text" class="form-control" placeholder="Escriba su nombre">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Correo</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ejemplo@VerduraSoft.com">
					</div>
					<div class="form-group">
						<label for="exampleTextarea">Mensaje</label>
						<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
					</div>
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
