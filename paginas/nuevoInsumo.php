<?php

	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){

	include("Menu2.php");
  include("../php/conexion.php");
	?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="icono.ico">
	<link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"  href="../css/Menu2.css">
	<meta charset="UTF8">

</head>
<body>
		<div class="container" align="center" >
			<h1 style="color:#95A9C8"> Altas de Insumos </h1>
				<form id= "ProForm" class="form-horizontal">
				<br>
				<br>

				   <div class="form-group">
				    	<h4><label for="descripcion" class="col-sm-2 control-label">Descripción</label></h4>
				    	<div class="col-sm-10">
				      		<input type="text" REQUIRED class="form-control" id="descripcion" placeholder="Ing. descripción">
				    	</div>
				 	</div>

          <div class="form-group">
          <h4><label for="codProducto" class="col-sm-4 control-label">Unidad De Medida</label></h4>
            <div class="col-sm-10">
              <select id="udm" class="form-control">
                <option value="0">Elija Medida</option>
                <?php
                $query = $conexion -> query ("SELECT * FROM udm ");
                while ($provedor = mysqli_fetch_array($query)) {
                  echo '<option value="'.$provedor[0].'">'.$provedor[1].'</option>';
                }
                ?>
              </select>
            </div>
          </div>

				  <div class="form-group">
				    	<h4><label for="precio" class="col-sm-4 control-label">Precio de venta</label></h4>
				    	<div class="col-sm-10">
				      		<input type="number" REQUIRED class="form-control" id="precio" placeholder="Ing. Precio de Venta">
				    	</div>
				  </div>

				  <div class="form-group">
				    	<div class="col-sm-offset- col-sm-10">
				      		<button type="submit" id= "registrar" class="btn btn-success"><i class="fas fa-check-square"></i> Registrar</button>
									<a class="btn btn-danger" href="listarInsumos.php" role="button"><i class="fas fa-window-close"></i> Cancelar</a>
				    	</div>
				  </div>

				</form>
				<SPAN id ="resultado"></SPAN>
			</div>

			<script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
			<script src="../librerias/fontawesome-V5/js/all.js"></script>
			<script src="../js/JSinsumos.js"></script> <!-- mando los datos a cargar datos -->
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
