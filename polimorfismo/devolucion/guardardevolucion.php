<?php

$conexion = new mysqli("mysql.hostinger.com.ar","u178713617_poli","baloo12345","u178713617_poli");
	$id = $_REQUEST['id'];
	$id_producto = $_POST['Id_producto'];
	$can_devuelta= $_POST['cant_devuelta'];
	$Cant_reservada= $_POST['Cant_reservada'];

	disminuirStock($id_producto,$can_devuelta,$Cant_reservada,$conexion);

	$query = "INSERT INTO Devolucion(Id_reserva, Id_producto, Cant_devuelta) VALUES ('$id',   '$id_producto', '$can_devuelta')";
	$resultado = $conexion -> query($query);

function disminuirStock($insumo, $cantidad,$cantidad_reservada,$conexion){
	$sql = "SELECT Stock FROM stock WHERE id_productoSTK = '$insumo'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();
	if ($cantidad < $cantidad_reservada) {
		$resto = $row['Stock'] - $cantidad;
		$sql = "UPDATE stock SET Stock = '$resto' WHERE id_productoSTK = '$insumo'";
		if($conexion->query($sql) === TRUE){
			return;
		}else{
			echo "Algo paso: ".$conexion->error;
		}
	}

}
if($resultado){
	header("location: /polimorfismo/devolucion/devolucion.php");
}else{
	echo "no se pudo";
}
?>
