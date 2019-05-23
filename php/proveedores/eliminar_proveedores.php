<?php
	require("../conexion.php");


	$id = $_REQUEST['id'];
	$var = 0;

	$query = "UPDATE Proveedores SET baja_logica = '$var' WHERE id_proveedor= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: lista_proveedores.php");
	}else{
		echo "no se pudo";
	}

?>
