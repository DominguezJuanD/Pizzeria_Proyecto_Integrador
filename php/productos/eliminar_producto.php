<?php
require("../config/conexion.php");

	$id = $_REQUEST['id'];

	$query = "DELETE FROM productos WHERE id_producto= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: lista_producto.php");
	}else{
		echo "no se pudo";
	}

?>
