<?php
// listarIngredientes() devuelve un array con desc_ingrediente, cantidad, unidad de medida y costo
// se puede utilizar como listarIngredientes($_REQUEST['q']) o importarlo en otro que arme la tabla como corresponde si asi resulta mas util.
include "conectarDB.php";
function listarIngredientes($id_producto)
{
	$conn = conectarDB();
	//$id_producto = obtenerId($conn, $descripcion);
	$array_ingredientes = obtenerIngredientes($conn, $id_producto);
	$array_insumos = obtenerInsumos($conn);
	$array_udm = obtenerUdm($conn);
	$listado = array();
	for ($i=0; $i < count($array_ingredientes); $i++) {
		$costo = $array_ingredientes[$i]['cantidad'] * $array_insumos[$array_ingredientes[$i]['id_insumo'] -1]['precio_compra']; 
		$fila = [buscarDesc($array_ingredientes[$i]['id_insumo'], $array_insumos), $array_ingredientes[$i]['cantidad'], buscarUdm($array_insumos[$i]['udm'],$array_udm), $costo];
		array_push($listado, $fila);
	}
	$conn->close();
	return $listado;
}

function obtenerId($conn, $descripcion)
{
	$sql = "SELECT id_producto FROM productos WHERE descripcion = '$descripcion'";
	$result_id = $conn->query($sql)->fetch_assoc();
	$result_id = $result_id['id_producto'];
	return $result_id;
}
function obtenerIngredientes($conn, $id)
{
	$sql = "SELECT id_insumo, cantidad FROM recetas WHERE id_producto = '$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$array = array();
		while ($row = $result->fetch_assoc()) {
			array_push($array, $row);
		}
	}
	return $array;
}
function obtenerInsumos($conn)
{
	$sql = "SELECT * FROM insumos";
	$result = $conn->query($sql);
	$array =  array();
	while ($row = $result->fetch_assoc()) {
		array_push($array, $row);
	}
	return $array;
}
function buscarDesc($id_insumo,$array_insumos)
{
	for ($i=0; $i < count($array_insumos); $i++) { 
		if ($array_insumos[$i]['id_insumo'] == $id_insumo) {
			return $array_insumos[$i]['desc_insumo'];
		}
	}
}

function obtenerUdm($conn)
{
	$sql = "SELECT * FROM udm";
	$result = $conn->query($sql);
	$array = array();
	while ($row = $result->fetch_assoc()) {
		array_push($array, $row);
	}
	return $array;
}
function buscarUdm($id_udm,$array_udm)
{
	for ($i=0; $i < count($array_udm); $i++) { 
		if ($array_udm[$i]['id_udm'] == $id_udm) {
			return $array_udm[$i]['desc_udm'];
		}
	}	
}
//$listado = listarIngredientes(3);
//for ($i=0; $i < count($listado); $i++) { 
//	echo $listado[$i][0]."||".$listado[$i][1]."||".$listado[$i][2]."||".$listado[$i][3].'pesos<br>';
//}
//listarIngredientes($_REQUEST['q']);
?>