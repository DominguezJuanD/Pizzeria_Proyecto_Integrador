<?php
	include('conexion.php');

	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];

	$consulta  = mysqli_query($conexion, "SELECT * FROM productos ORDER BY id_producto DESC");
	$resultado = mysqli_fetch_array($consulta);
	$codProducto = $resultado['id_producto']+1;

	$sql = "INSERT INTO productos (id_producto,descripcion,precio) VALUES ('$codProducto','$descripcion','$precio')";
	$insertar = mysqli_query($conexion,$sql) or die ("No se pudo inserar el registro");
?>