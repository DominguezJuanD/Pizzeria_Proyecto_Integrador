<?php 
require("conexion.php");

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$query = "SELECT * FROM usuarios WHERE usuario = '$username' AND password = '$password'";

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