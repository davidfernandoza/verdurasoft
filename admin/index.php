<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión | verduraSoft</title>
	<script src="js/code_jquery.js"></script>
	<link rel="stylesheet" href="css/login.css">

</head>
<body>
	<div class="container">
		<header class="content-header">
			<nav class="main-nav">
				<div class="content-user">
					<h1 class="text">VerduraSoft</h1>
				</div>
				<div class="container-menu">
					<div class="todo">
						<div class="caja">
							<div class="fecha">
								<p id="diaSemana" class="diaSemana"></p>
								<p id="dia" class="dia"></p>
								<p>de</p>
								<p id="mes" class="mes"></p>
								<p>del</p>
								<p id="year" class="year"></p>
							</div>
							<div class="reloj">
								<p id="horas" class="horas"></p>
								<p>:</p>
								<p id="minutos" class="minutos"></p>
								<p>:</p>
								<p id="segundos" class="segundos"></p>
								<p id="ampm" class="ampm"></p>		
							</div>
						</div>
    				</div>
					<img class="icon" id="menu" src="img/user-solid.svg">
					<ul class="content-menu">
						<li class="item"><a href="#" class="link" id="iniciar-sesion">Iniciar Sesión</a></li>
						<li class="item"><a href="#" class="link" id="registrarse-sesion">Registrate</a></li>
					</ul>
				</div>
			</nav>
		</header>

		<div class="slider">
			<input type="radio" name="slider-select-element" id="element1" checked="checked" />
            <input type="radio" name="slider-select-element" id="element2" />
             <input type="radio" name="slider-select-element" id="element3" />
                
                <div id="slider-container">
                    <div id="slider-box">
                        <div class="slider-element">
                            <article class="element-uno">
								<h1>este es mi texto</h1>
								<h2>este es mi texto</h2>
								<h3>este es mi texto</h3>
								<h4>este es mi texto</h4>
								<h5>este es mi texto</h5>
								<h6>este es mi texto</h6>
                            </article>
                        </div>
                        <div class="slider-element" >
                            <article class="element-dos">
								<h1>este es mi texto</h1>
								<h2>este es mi texto</h2>
								<h3>este es mi texto</h3>
								<h4>este es mi texto</h4>
								<h5>este es mi texto</h5>
								<h6>este es mi texto</h6>
                            </article>
                        </div>
                        <div class="slider-element">
                            <article class="element-tres">
								<h1>este es mi texto</h1>
								<h2>este es mi texto</h2>
								<h3>este es mi texto</h3>
								<h4>este es mi texto</h4>
								<h5>este es mi texto</h5>
								<h6>este es mi texto</h6>
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



	</div>





	<div class="container-formulario  registro" id="content-form"> <!-- mostrar-formulario -->
		<form action="" method="" class="form-register" id="form-register"> <!-- mostrar-->
			<div class="form-title">
				<h1>Iniciar sesión</h1>
			</div>
			<div class="form-content">
				<input type="number" placeholder="Cedula" name="id" class="full">
				<input type="text" placeholder="Usuario" name="user" class="full">
				<input type="password" placeholder="Contraseña" name="password" class="full">

				<div class="cta-group">
					<input type="reset" value="Cancelar" id="cerrar-iniciar">
					<input type="submit" value="Iniciar sesion">
				</div>
			</div>
		</form>		
		<form action="" method="" class="form-actualizar" id="form-actualizar" > <!-- mostrar -->
			<div class="form-title">
				<h1>Registrate </h1>
			</div>
			<div class="form-content" id="form-content-actualizar">
				<input type="number" placeholder="Cedula" name="id" class="full" required>
				<div class="input-group">
					<input type="text" placeholder="Nombres">
					<input type="text" placeholder="Apellidos">
				</div>
				<input type="email" class="full" placeholder="Correo electronico">
				<input type="text" class="full" placeholder="Direccion">
				<input type="number" class="full" placeholder="Celular">
				<div class="input-group select">
					<label for="select">Estado:</label>
					<select name="" id="">
						<option value="">Seleccione un estado</option>
						<option value="">Activo</option>
						<option value="">Innactivo</option>
					</select>
				</div>
				<div class="cta-group">
					<input type="reset" value="Cancelar" id="cerrar-registrarse">
					<input type="submit">
				</div>
			</div>
		</form>

	</div>

	<script src="js/index.js"></script>
	<script src="js/login.js"></script>
</body>
</html>