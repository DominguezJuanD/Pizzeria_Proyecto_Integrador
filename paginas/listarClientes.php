<?php include("Menu2.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../img/icono.ico">
	<meta charset="utf-8">
	<title>Lista de Clientes</title>

	<link rel="stylesheet"  href="../css/Menu2.css">
</head>
<body >

	<SECTION class="principal" align="center">

		<h1 style="color:#95A9C8"> Listado de Clientes </h1>

		<br>

		<div class="form-inline busqueda" >
			<label for="caja_busqueda" > <i class="fas fa-search"></i> Buscar:</label>
			<input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Text..." class="form-control mb-2 mr-sm-2 mb-sm-0"  ></input>
			<!-- <button type="button" name="button-alta" id="button-alta"><i class="fas fa-user-plus"></i> Agregar Nuevo...</button> -->
			<a class="btn btn-primary" href="nuevoCliente.php" role="button"><i class="fas fa-user-plus"></i> Agregar Nuevo...</a>
		</div>
		</div>
		<br>
		<!-- div que mustra todo lo que se trae de la base de datos  -->
		<div id="datos" ></div>

	</SECTION>



<script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
<script src= "../js/JScliente.js"></script>
</body>
</html>
