<?php
require("../conexion.php");


	$id = $_REQUEST['id'];
	$var = 0;

	$query = "UPDATE persona SET baja_logica = '$var' WHERE id_persona= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: ../../paginas/listarClientes.php");
	}else{
		echo "no se pudo";
	}

?>
