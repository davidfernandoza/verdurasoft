<?php
include ('../conexion.php');
$id = $_GET['id'];
$query= "SELECT * FROM admins WHERE id = $id;";
$resultado = mysqli_query($conexion, $query);
	while ($fila = mysqli_fetch_array($resultado)) {
?>

<form action="update.admin.php" method="post">
	<input type="hidden" name="id" value="<?php echo $fila['id']  ?>" >
	<input type="text" name="nombre" value="<?php echo $fila['nombre']  ?>" >
	<input type="text" name="apellido" value="<?php echo $fila['apellido']?>" >
	<input type="text" name="email" value="<?php echo $fila['email']  ?>" >
	<input type="password" placeholder="Contraseña" name="password" >
	<input type="password" placeholder="Confirmar Contraseña" name="confirPassword"  >
	<input type="text" name="telefono" value="<?php echo $fila['telefono']  ?>" >
	<select name="" id="">
		<option value="">Seleccione un estado</option>
		<option value="">Activo</option>
		<option value="">Innactivo</option>
	</select>
	<input type="file" name="foto" id="" placeholder="Tu foto">
	<input type="submit" name="" value="Actualizar">

</form>	

<?php
}
?>