<?php
session_start();
$_SESSION['detalle'] = array();
include '../../../controllers/conexion.php';
$query = "SELECT * FROM productos";
$consulta = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../css/estilos.css">
  <link rel="stylesheet" href="./../../css/carrito.css">
  	<link rel="shortcut icon" href="../../img/favicon.png">
  <title>Productos</title>
</head>
<body>

  <nav class="BNav navbar navbar-expand-lg navbar-dark menu" id="inicio">
		<a class="letra" class="navbar-brand" href="../../../"><img src="../../img/favicon.png" width="50px" class="logo">VerduraSoft</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="../../../">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./carrito.php">Productos</a>
				</li>
				<?php
				if(!isset($_SESSION['id_usuario'])){
					?>
					<li class="nav-item">
						<a class="nav-link" href="../login/registro.usuario.php">Registro</a>
					</li>
				<?php }else{?>
					<li class="nav-item">
						<a class="nav-link" href="../../../controllers/public/session.salir.usuario.php">Cerrar Sesión</a>
					</li>

				<?php }?>
			</ul>
			<div>
				<a class="usuario_log" href="../login/login.usuario.php">
					<img src="../../../admin/img/avatar/defecto/defecto.png" width="30">
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


  <section class="container-carrito">


  <!-- Galeria -->
  <div class='galeria'>
    <div class="galeria-content">

    <?php
    while($fila = mysqli_fetch_array($consulta)){
      if ($fila['cantidad'] > 0) {
        ?>

        <!-- Tarjeta -->
        <div class="card" id='<?php echo $fila['id']?>'>
          <figure>

            <!-- Foto -->
            <img src="<?php echo '../../../admin/'.$fila['foto'] ?>" alt="foto-<?php echo $fila['nombre'] ?>">
          </figure>
          <div class="contenido_card">
            <div class="info_card">

              <!-- Nombre -->
              <h3><?php echo $fila['nombre'] ?></h3>

              <!-- Descripcion -->
              <p><?php echo $fila['descripcion'] ?></p>
            </div>
            <div class="accion_card">

              <!-- Precio -->
              <p>Precio KG: $<span id="<?php echo 'precio'.$fila['id']?>"><?php echo $fila['valor'] ?></span> COP</p>

              <!-- Cantidad disponible-->
              <p>Cantidad disponible: <span id="<?php echo 'cantidad'.$fila['id']?>"><?php echo $fila['cantidad'] ?></span> KG</p>

              <!-- Agregar a carrito -->
              <button onclick="addCarrito(<?php echo $fila['id'] ?>)" class="agregar">Agregar a carrito</button>

              <!-- Cantidad original de la tarjeta -->
              <input type="hidden" id="<?php echo 'cantidadTarjeta'.$fila['id'];?>" value="<?php echo $fila['cantidad'];?>">
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?>
    </div>
  </div>

  <!-- Carrito estatico -->
  <!-- Este se carga cuando recien inicia la pagina -->
  <!-- Cuando hacen la accion de agregar al carrito se carga "tabla.php" por ajax -->
  <!-- Ese archivo se encuentra en la misma carpeta-->
  <div class="carrito detalle-producto">
    <?php if(count($_SESSION['detalle']) > 0){?>
      <div class="container-table">

      <table class="table" border="1">
        <thead>
          <tr>
            <th>Productos</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>
          <tbody>
            <?php
            $total = 0;
            foreach($_SESSION['detalle'] as $k => $detalle){
              $total += $detalle['subtotal'];
              ?>
              <tr>
                <td><?php echo $detalle['producto'];?></td>
                <td><?php echo $detalle['cantidad'];?></td>
                <td><?php echo $detalle['precio'];?></td>
                <td><?php echo $detalle['subtotal'];?></td>
                <td><button class="eliminar-producto" onclick="deleteCarrito(<?php echo $detalle['id'];?>)">Eliminar</button></td>

                <!-- Necesario para la suma de cantidades -->
                <input type="hidden" id="<?php echo 'cantidadActual'.$detalle['id'];?>" value="<?php echo $detalle['cantidad'];?>">
              </tr>
            <?php }?>
            <tr>
              <td colspan="3" class="text-right"><strong>Total:</strong></td>
              <td><?php echo $total;?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>

      <?php }else{?>
        <div class="panel-body"> No hay productos agregados</div>
      <?php }?>

      <form action="../../../controllers/public/carrito.crud.php?page=3" method="post">
        <input type="submit" value="Comprar" disabled>
      </form>
    </div>
  </section>

    <!-- JQuery -->
    <script type="text/javascript" src="./../../js/jquery.js">
    </script>

  	<script type="text/javascript" src="../../js/bootstrap.js">
  	</script>


    <!-- Ajax -->
  <script type="text/javascript">
    // Agregar a carrito
    function addCarrito(id){
      let cantidadActual = $(`#cantidadActual${id}`).val();
      if (!cantidadActual) {
        cantidadActual = 0
      }
      else {
        cantidadActual = parseInt(cantidadActual);
      }
      let cantidad = $(`#cantidad${id}`);
      let cantidadDisponible = parseInt(cantidad.text())
      if(cantidadDisponible > 0){
        $.ajax({
          url: '../../../controllers/public/carrito.crud.php?page=1',
          type: 'post',
          data: {'producto_id':id, 'cantidad':1, 'cantidadActual':cantidadActual},
          dataType: 'json',
          success: function(data) {
            if(data.success==true){
              $(".detalle-producto").load('tabla.php');
              cantidadDisponible -= 1
              cantidad.text(cantidadDisponible)
            }
            else{
              alert('Debes de iniciar sesion.');
              window.location.href= "../login/login.usuario.php"
            }
          }
        });
      }
      else {
        alert('Ya no hay mas producto para agregar al carrito.')
      }
    }
    // quitar de carrito
    function deleteCarrito(id){
      let cantidadTarjeta = parseInt($(`#cantidadTarjeta${id}`).val())
      let cantidad = $(`#cantidad${id}`);
      cantidadTarjeta
      $.ajax({
        url: '../../../controllers/public/carrito.crud.php?page=2',
        type: 'post',
        data: {'id':id},
        dataType: 'json'
      }).done(function(data){
        if(data.success==true){
          $(".detalle-producto").load('tabla.php');
          cantidad.text(cantidadTarjeta)
        }else{
          alert('Debes de iniciar sesion.');
          window.location.href= "../login/login.usuario.php"
        }
      })
    }
    </script>
  </body>
  </html>
