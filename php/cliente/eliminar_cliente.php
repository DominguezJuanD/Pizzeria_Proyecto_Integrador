<?php
	require("../php/conexion.php");


	$id = $_REQUEST['id'];
	$var = 0;

	$query = "UPDATE clientes SET baja_logica = '$var' WHERE idCliente= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: lista_cliente.php");
	}else{
		echo "no se pudo";
	}

?>
