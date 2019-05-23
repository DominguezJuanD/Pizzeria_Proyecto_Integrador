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
	$where = "";

	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	$conn = conectarDB();
	$sql = "SELECT * FROM cliente $where";
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
				<?php if($resultado){
						echo "<h3>REGISTRO ELIMINADO</h3>";
					}else{
						echo "<h3>ERROR AL ELIMINAR</h3>";
					}?>

				<a href="abm.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>
