<?php
require("../conexion.php");

	$id = $_REQUEST['id'];
	$var = 0;

	$query = "UPDATE insumos SET baja_logica = '$var' WHERE id_insumo= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: ../../paginas/listarInsumos.php");
	}else{
		echo "no se pudo";
	}

?>
