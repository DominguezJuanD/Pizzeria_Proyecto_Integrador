<?php
include('conexion.php');

$id=$_GET["id"];
$usuario=$_GET["usu"];


if($resultset=mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE usuario='$id'")){
	while ($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
	}
}

?>
