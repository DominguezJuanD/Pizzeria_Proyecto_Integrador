<?php
	require("../conexion.php");
	$id = $_REQUEST['id'];
	$razon_social = $_POST['razon_social'];
	$telefono = $_POST['telefono'];
	$tipo = $_POST['tipo'];
	$fe_ini = $_POST['fe_ini'];

	$query = "UPDATE Proveedores SET  razon_social= '$razon_social', telefono= '$telefono', tipo = '$tipo',fe_ini= '$fe_ini' WHERE id_proveedor= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: ../../paginas/listarProveedores.php");
	}else{
		echo "no se pudo";
	}

?>
