<?php include("Menu2.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Clientes</title>
	<link rel="stylesheet"  href="../css/Menu2.css">

</head>
<body>

	<SECTION class="principal" align="center">

		<h1 style="color:#95A9C8"> Listado de Proveedores </h1>

		<br>

		<div class="form-inline busqueda" >
			<label for="caja_busqueda" > <i class="fas fa-search"></i> Buscar:</label>
			<input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Text..." class="form-control mb-2 mr-sm-2 mb-sm-0"  ></input>
			<!-- <button type="button" name="button-alta" id="button-alta"><i class="fas fa-user-plus"></i> Agregar Nuevo...</button> -->
			<a class="btn btn-primary" href="nuevoProveedor.php" role="button"><i class="fas fa-user-plus"></i> Agregar Nuevo...</a>
		</div>

		<br>
		<div id="datos" align="center"></div>

	</SECTION>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src= "../js/JSproveedores.js"></script>
</body>
</html>
