<?php
require("../conexion.php");

	$id = $_REQUEST['id'];
	$precio = $_POST['Precio'];
	$descripcion = $_POST['descripcion'];

	$query = "UPDATE productos SET precio= '$precio', descripcion= '$descripcion' WHERE id_producto= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: ../../paginas/listarProductos.php");
	}else{
		echo "no se pudo";
	}

?>
