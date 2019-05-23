<?php
require("config/config.php");

$nombres=$_GET['nombres'];
$contr = $_GET['contr'];
mysqli_query($conexion, "INSERT INTO usuarios (usuario, Contrasena) VALUES ('$nombres','$contr');");
 ?>
