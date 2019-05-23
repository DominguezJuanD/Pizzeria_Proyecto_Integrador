<?php
function conectarDB(){
	$conn = new mysqli("mysql.hostinger.com.ar","u178713617_baloo","baloo12345","u178713617_piza");
	if ($conn->connect_error){
		echo "conectado";	
		die("Connection failed: ".$conn->connect_error);
	}
	return $conn;
}
?>