<?php
require 'conexion.php';
function conectarDB(){
	$conn = new mysqli("mysql.hostinger.com.ar","u178713617_poli","baloo12345","u178713617_poli");
	if ($conn->connect_error){
		echo "conectado";
		die("Connection failed: ".$conn->connect_error);
	}
	return $conn;
}
	$nombre = $_POST['nombre'];
	$DNI = $_POST['DNI'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];

	$conn = conectarDB();
	$sql = "INSERT INTO cliente (NombreCliente, dni, tel, email) VALUES ('$nombre', '$DNI','$telefono','$email')";
	$resultado = $conn->query($sql);

?>

<html lang="es">
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php
					if($resultado){
						echo "<h3>REGISTRO GUARDADO</h3>";
					}else{
						echo "<h3>ERROR AL GUARDAR</h3>";
					}
					?>
					<a href="abm.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>
