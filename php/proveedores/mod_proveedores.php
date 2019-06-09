<?php
	require("../conexion.php");
	$id = $_REQUEST['id'];
	$razon_social = $_POST['razon_social'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$fe_ini = $_POST['fe_ini'];

	$query = "UPDATE persona SET  nombre = '$razon_social', telefono= '$telefono', direccion = '$direccion', fec_nac= '$fe_ini' WHERE id_persona= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: ../../paginas/listarProveedores.php");
	}else{
		echo "no se pudo";
	}

?>
