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
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>

			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="NombreCliente" name="nombre" placeholder="Nombre" value="<?php echo $row['NombreCliente']; ?>" required>
					</div>
				</div>

				<input type="hidden" id="id" name="id" value="<?php echo $row['IdCliente']; ?>" />

				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">DNI</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dni" name="dni" placeholder="dni" value="<?php echo $row['dni']; ?>" >
					</div>
				</div>

					<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="tel" name="tel" placeholder="tel" value="<?php echo $row['tel']; ?>" >
					</div>
				</div>


				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>"  required>
					</div>
				</div>


					<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="abm.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
