<?php 
require("conexion.php");

$id = $_REQUEST["id"];

$query = "SELECT idCliente, nombre, telefono, direccion FROM clientes WHERE idCliente= '$id' ";

$resultado = $conexion -> query($query);

$fila=array();
$fila["success"] = false;

if($resultado->num_rows > 0){

	while($fila = $resultado -> fetch_assoc()){
		$fila["success"] = true;

		echo json_encode($fila);
	}
}else{
	echo json_encode($fila);
}


 ?>