<?php
include "conectarDB.php";
$conn = conectarDB();

$lista = listarStock($conn);
for ($i=0; $i < count($lista); $i++) { 
	echo $lista[$i][0].'.'.$lista[$i][1].'.'.$lista[$i][2].'<br>';
}
//buscar insumo, mostrar cantidad.
function obtenerCantidad($conn, $descripcion)
{
	$sql = "SELECT id_insumo FROM insumos WHERE desc_insumo = $descripcion";
	$result_id = $conn->query($sql)->fetch_assoc();
	$idInsumo = $result_id['id_insumo'];
	$sql = "SELECT cantidad FROM stock_insumos WHERE id_insumo = '$idInsumo'";
	$result_cant = $conn->query($sql)-fetch_assoc();
	$cantidad = $result_cant['cantidad'];
	return $cantidad;
}
//listar todo el stock de insumos.
function listarStock($conn)
{
	$array_insumos = obtenerInsumos($conn);
	$sql = "SELECT * FROM stock_insumos";
	$result = $conn->query($sql);
	$array = array();
	while ($row = $result->fetch_assoc()) {
		$var = [$row['id_insumo'], $array_insumos[$i][1], $row['cantidad']];
		array_push($array, $var);
	}
	return $array;
}
//modificar cantidad de insumo
//restar del stock segun id_receta.


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
?>