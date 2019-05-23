<?php
require("../conexion.php");

	$id = $_REQUEST['id'];
	$precio = $_POST['precio_compra'];
	$descripcion = $_POST['desc_insumo'];
  $udm = $_POST['udm'];

	$query = "UPDATE insumos SET descripcion= '$descripcion', udm='$udm', precio_compra= '$precio' WHERE id_insumo= '$id' ";
	$resultado = $conexion -> query($query);

	if($resultado){
		header("location: ../../paginas/listarInsumos.php");
	}else{
		echo "no se pudo";
	}

?>
