<?php
	require("../../php/conexion.php");
	$id = $_REQUEST['id'];
	$telefono = $_POST['telefono'];
	$nombre = $_POST['nombre'];
	$fe_na = date_format(date_create($_POST['fe_na']),'Y/m/d');
	$direccion = $_POST['direccion'];

	$query = "UPDATE persona SET nombre= '$nombre', fec_nac= '$fe_na', direccion= '$direccion', telefono= '$telefono' WHERE id_persona= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: ../../paginas/listarClientes.php");
	}else{
		echo "no se pudo";
	}

?>
