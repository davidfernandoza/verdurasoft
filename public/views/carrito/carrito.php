<?php
session_start();
$_SESSION['detalle'] = array();
include '../../../controllers/conexion.php';
$query = "SELECT * FROM productos";
$consulta = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./../../css/estilos.css">
  <title>Carrito</title>
</head>
<body>

  <!-- Galeria -->
  <div class='galeria'>
    <?php
    while($fila = mysqli_fetch_row($consulta)){
      if ($fila[5] > 0) {
        ?>

        <!-- Tarjeta -->
        <div class="card" id='<?php echo $fila[1]?>'>
          <figure>

            <!-- Foto -->
            <img src="<?php echo $fila[2] ?>" alt="foto-<?php echo $fila[3] ?>">
          </figure>
          <div class="contenido_card">
            <div class="info_card">

              <!-- Nombre -->
              <h3><?php echo $fila[3] ?></h3>

              <!-- Descripcion -->
              <p><?php echo $fila[4] ?></p>
            </div>
            <div class="accion_card">

              <!-- Precio -->
              <p>Precio unidad: <span id="<?php echo 'precio'.$fila[0]?>"><?php echo $fila[6] ?></span></p>

              <!-- Cantidad disponible-->
              <p>Cantidad disponible: <span id="<?php echo 'cantidad'.$fila[0]?>"><?php echo $fila[5] ?></span> </p>

              <!-- Agregar a carrito -->
              <button onclick="addCarrito(<?php echo $fila[0] ?>)" class="agregar">Agregar a carrito</button>
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?>
  </div>

  <!-- Carrito estatico -->
  <!-- Este se carga cuando recien inicia la pagina -->
  <!-- Cuando hacen la accion de agregar al carrito se carga "tabla.php" por ajax -->
  <!-- Ese archivo se encuentra en la misma carpeta-->
  <div class="carrito detalle-producto">
    <?php if(count($_SESSION['detalle']) > 0){?>
      <table class="table">
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
                <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>

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
      <?php }else{?>
        <div class="panel-body"> No hay productos agregados</div>
      <?php }?>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="./../../js/jquery.js">
    </script>

    <!-- Ajax -->
    <script type="text/javascript">

    function addCarrito(id){
      let cantidadActual = $(`#cantidadActual${id}`).val();
      if (!cantidadActual) {
        cantidadActual = 0
      }
      else {
        cantidadActual = parseInt(cantidadActual);
      }
      let cantidad = $(`#cantidad${id}`);
      let cantidadDeiponible = parseInt(cantidad.text())

      console.log(cantidadActual);
      if(cantidadDeiponible > 0){
        $.ajax({
          url: '../../../controllers/carrito/carrito.crud.php?page=1',
          type: 'post',
          data: {'producto_id':id, 'cantidad':1, 'cantidadActual':cantidadActual},
          dataType: 'json',
          success: function(data) {
            console.log(data);
            if(data.success==true){
              $(".detalle-producto").load('tabla.php');
              cantidadDeiponible -= 1
              cantidad.text(cantidadDeiponible)
            }
            else{
              alert(data.msj);
            }
          },
          error: function(jqXHR, textStatus, error) {

          }
        });
      }
      else {
        alert('Ya no hay mas producto para agregar al carrito.')
      }
    }
    </script>
    <script type="text/javascript" src="./../../js/scripts.js">
    </script>
  </body>
  </html>
