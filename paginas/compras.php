<?php

	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="icono.ico">
	<title> Altas insumos </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet"  href="menu.css">
	<meta charset="UTF8">

	<style>
		body{
			background: url(../fondo3.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			}
	</style>
  <script type="text/javascript" src="../js/funciones.js"></script>
</head>
<body>
		<div class="container" align="center" >

				<form id= "ProForm" class="form-horizontal">
				<br>
				<br>
				  <div class="form-group">
					<h4><label for="codProducto" class="col-sm-4 control-label">Descripcion</label></h4>
				    <div class="col-sm-10">
				      <input type="text" REQUIRED class="form-control" id="descripcion" placeholder=" Descripcion">
				    </div>
				  </div>

				   <div class="form-group">
				    	<h4><label for="descripcion" class="col-sm-4 control-label">Precio de Compra</label></h4>
				    	<div class="col-sm-10">
				      		<input type="text" REQUIRED class="form-control" id="precio_compra" placeholder="Precio De Compra">
				    	</div>
				 	</div>

				  <div class="form-group">
				    	<h4><label for="precio" class="col-sm-4 control-label">Unidad De Medida</label></h4>
				    	<div class="col-sm-10">
				      		<input type="number" REQUIRED class="form-control" id="udm" placeholder="Unidad de medida">
				    	</div>
				  </div>

				  <div class="form-group">
				    	<div class="col-sm-offset- col-sm-10">
				      		<button type="submit" class="btn btn-success" value="Cargar" onclick="cargar_insumo();">Registrar</button>
				    	</div>
				  </div>

				</form>
				<SPAN id ="resultado"></SPAN>
			</div>

</body>
</html>


<?php

// }else{
//
// 	echo "<script> window.location = 'index.php'; </script>";
//
// }

?>
