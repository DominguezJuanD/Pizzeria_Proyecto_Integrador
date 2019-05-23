<?php
include "../conectarDB.php";

$conn = conectarDB();

$user = $_POST['user'];
$pass = $_POST['pass'];
$nombre = $_POST['nombre'];
$fe_na = $_POST['fe_na'];
$telefono = $_POST['telefono'];
$sql = "INSERT INTO usuarios_clientes(user, pass) VALUES ($user,$pass)";
$sql1= "INSERT INTO clientes(nombre,fe_na,direccion,telefono,baja_logica) VALUES ($nombre,$fe_na,$telefono,1)";
if ($conn->query($sql) === TRUE) {
	if ($conn->quert($sql1) === TRUE) {
	$response = array();
	$response["success"] = TRUE;
	echo json_encode($response);
	}
}

?>