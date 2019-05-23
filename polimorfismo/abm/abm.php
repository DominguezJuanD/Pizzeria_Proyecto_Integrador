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
		<style type="text/css">
			body {
				margin: 0;
			  	padding: 0;
			  	background: #FCE4F9;
			  	position: relative;
			}
		</style>
	</head>

	<body>

		<div class="container">
			<div class="row">
				<h2 style="text-align:center">ABM clientes</h2>
			</div>

			<div class="row">
				<a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a>

				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Nombre: </b><input type="text" id="campo" name="campo" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
			</div>

			<br>

			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Dni</th>
							<th>Telefono</th>
							<th>Email</th>

						</tr>
					</thead>

					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['IdCliente']; ?></td>
								<td><?php echo $row['NombreCliente']; ?></td>
								<td><?php echo $row['dni']; ?></td>
								<td><?php echo $row['tel']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><a href="modificar.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								<td><a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>



		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>

					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>

		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>

	</body>
</html>
