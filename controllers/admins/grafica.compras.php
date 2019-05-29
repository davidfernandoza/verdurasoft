<?php
require('../conexion.php');

$query = "SELECT SUM(c.valor) AS valor, DATE_FORMAT(c.fecha, '%d/%m/%Y') AS fecha FROM compras AS c WHERE estado = 'activo' GROUP BY fecha";
$consulta = mysqli_query($conexion, $query);
if (!$consulta) {
  $valor = new stdClass();
  $valor->valor = 0;
  $valor->fecha = "00/00/000";
  $consulta = [$valor];
}
else {
  $consulta = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
}

echo json_encode($consulta);
 ?>
