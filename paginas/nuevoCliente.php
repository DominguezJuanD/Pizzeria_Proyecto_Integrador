<?php

	//
	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){

	include("Menu2.php");

	?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="icono.ico">
	<title> Altas de Clientes </title>

	<link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet"  href="../css/Menu2.css">

	<meta charset="UTF8">

</head>
<body>

		<div class="container" align="center" >
				<h1 style="color:#95A9C8"> Altas de Clientes </h1>
				<form id= "CliForm" class="form-horizontal"> <!-- formilario que envia los datos a guardar -->
				<br>
				<br>
				  <div class="form-group">
					<h4><label for="telefono" class="col-sm-2 control-label">Telefono</label></h4>
				    <div class="col-sm-10">
				      <input type="tel" REQUIRED class="form-control " pattern="^\d{10}$"  id="telefono" placeholder="xxxxxxxxxxx">
				    </div>
				  </div>

				   <div class="form-group">
				    	<h4><label for="nombre" class="col-sm-2 control-label">Nombre</label></h4>
				    	<div class="col-sm-10">
				      		<input type="text" REQUIRED class="form-control" id="nombre" placeholder="Ing. Nombre">
				    	</div>
				 	</div>

				  <div class="form-group">
				    	<h4><label for="fe_na" class="col-sm-4 control-label">Fecha de Nac.</label></h4>
				    	<div class="col-sm-10">
				      		<input type="date" REQUIRED class="form-control" id="fe_na" placeholder="dd-mm-aaaa">
				    	</div>
				  </div>

				   	<div class="form-group">
				    	<h4><label for="direccion" class="col-sm-2 control-label">Direccion</label></h4>
				    	<div class="col-sm-10">
				      		<input type="text"  REQUIRED class="form-control" id="direccion" placeholder="Ing. Direccion">
				    	</div>
				  	</div>

				  <div class="form-group">
				    	<div class="col-sm-offset- col-sm-10">
				      		<button type="submit" id= "registrar" class="btn btn-success"><i class="fas fa-check-square"></i> Registrar</button>
									<a class="btn btn-danger" href="listarClientes.php" role="button"><i class="fas fa-window-close"></i> Cancelar</a>
				    	</div>
				  </div>

				</form>
				<SPAN id ="resultado"></SPAN> <!-- recibe el mensaje de que fue cargado con exito desde ajaxDatosCliente.php -->
			</div>

			<script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
			<script src="../librerias/fontawesome-V5/js/all.js"></script>
			<script src="../js/JSCliente.js"></script> <!-- mando los datos a cargar datos -->

</body>
</html>


<?php

	// if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'ANDROID')||strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'MOBILE')){

	// 			echo '<body  style="background-color:LightCyan">';

	// 		}else{

	// 			echo '<body  background = "fondo3.jpg" >';

	// 		}

// }else{
//
// 	echo "<script> window.location = 'index.php'; </script>";
//
// }

?>
