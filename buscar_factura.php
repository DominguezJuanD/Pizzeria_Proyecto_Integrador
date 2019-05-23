<?php

	@session_start();

	//include 'serv.php';


	if (@isset($_SESSION['user'])){?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="icono.ico">
	<title> BUSCAR FACTURAS </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/menu.css">
	<script type="text/javascript">
		window.onload = function(){
			buscar_factura();
		}
	</script>

	<meta charset="UTF8">
 

</head>
<body>
	<div class="container" align="center" >
    <table>
   
  	 	<tr>
  			<td><b>Buscar:  </b></td>
  			<td><input type="text" class="form-control" name="buscar" id="buscar"></td>
  			<br>

  		</tr> 
<!-- 			<tr>
				<td><b>Id de Serie:  </b></td>
				<td> <input type="text" name="num" class="form-control" id="Num_Serie"> </td>
				<br>
			</tr>
			<tr>
				<td><b>Tipo Factura</b></td>
					<td>
						<select name="tipofactura" id="Tipo_Factura">
							<option value="FA">A</option>
							<option value="FB">B</option>
							<option value="FC">C</option>
							<option value="FX">X</option>
						</select>
					</td>
			</tr>
  		<tr>
  				<td align="right"> <br> <input type="button" class="btn btn-success" value="Buscar" onclick="buscar_factura();"></td>
  		</tr> -->
  	</table>
   	<div id="datos" align="center"></div>
	</div>
	<br>
	<br>


<!-- BARRA SEPARADORA DE BAJO PRESUPUESTO   LA FACUTRA!  BARRA SEPARADORA DE BAJO PRESUPUESTO BARRA SEPARADORA DE BAJO PRESUPUESTO -->

	<form method="POST" action="factura.php" name="frm">
	<div style="width:950px ; height:1380px ; border: thin solid ; overflow:hidden ; position:relative">
		<div style="width:475px ; height:200px ; border: thin solid ; overflow:hidden ; position:absolute">
		<img style="position:absolute ; top:2px ; left:02px" height=75 src="logofactura.png">
			<a style="position:absolute ; top:020px ; left:250px ; font-size:150%"></a>
			<a style="position:absolute ; top:080px ; left:010px ; font-size:100%">AV.CORRIENTES 2211</a>
			<a style="position:absolute ; top:100px ; left:010px ; font-size:100%">POSADAS - MISIONES</a>
			<a style="position:absolute ; top:120px ; left:010px ; font-size:100%">03764-154690063</a>
			<a style="position:absolute ; top:140px ; left:010px ; font-size:100%">baloopizzeria@gmail.com</a>
			<a style="position:absolute ; top:160px ; left:010px ; font-size:100%">Responsable Inscripto</a>
		</div>
		<div style="width:475px ; height:200px ; border: thin solid ; overflow:hidden ; position:absolute ; left:475px">
			<a style="position:absolute ; top:005px ; left:150px ; font-size:200%">FACTURA</a>
			<a style="position:absolute ; top:010px ; right:15px ; font-size:75%">Original</a>
			<a style="position:absolute ; top:020px ; right:15px ; font-size:75%">Pag. 1/1</a>
			<a style="position:absolute ; top:050px ; left:010px ; font-size:150%">Numero:</a>
			<a style="position:absolute ; top:085px ; left:010px ; font-size:125%">Fecha:</a>
			<a style="position:absolute ; top:120px ; left:010px ; font-size:100%">CUIT:</a>
			<a style="position:absolute ; top:140px ; left:010px ; font-size:100%">IIBB:</a>
			<a style="position:absolute ; top:160px ; left:010px ; font-size:100%">Inicio Actividad: </a>

			<a id="serieFact" style="position:absolute ; top:050px ; left:150px ; font-size:150%; width:80px"> </a>

			<a id="numFact" style="position:absolute ; top:050px ; left:250px ; font-size:150%; width:190px; text-align:center"></a>
			<a id="fechaFact" style="position:absolute ; top:085px ; left:150px ; font-size:125%; width:150px"> </a>
			<a style="position:absolute ; top:120px ; left:150px ; font-size:100%">20-30897760-4</a>
			<a style="position:absolute ; top:140px ; left:150px ; font-size:100%">20-30897760-4</a>
			<a style="position:absolute ; top:160px ; left:150px ; font-size:100%">01/09/2013</a>
		</div>
		<div style="width:50px ; height:50px ; border: thin solid ; overflow:hidden ; position:absolute ; left:450px ; background:#FFF">

			<a id="TIPOFACT" style="position:absolute ; font-size:200% ; right:10px">  </a>

			<a style="position:absolute ; left:02px ; top:35px ; font-size:75%"></a>
		</div>
		<div style="width:950px ; height:200px ; border: thin solid ; overflow:hidden ; position:absolute ; top:200px">
			<a style="position:absolute ; top:010px ; left:010px ; font-size:150%">Cliente:</a>
			<a style="position:absolute ; top:050px ; left:010px ; font-size:100%">Domicilio:</a>
			<a style="position:absolute ; top:075px ; left:010px ; font-size:100%">Localidad:</a>
			<a style="position:absolute ; top:100px ; left:010px ; font-size:100%">Cond. IVA:</a>
			<a style="position:absolute ; top:125px ; left:010px ; font-size:100%">Teléfono:</a>
			<a style="position:absolute ; top:150px ; left:010px ; font-size:100%">Comentario:</a>
			<a style="position:absolute ; top:100px ; left:340px ; font-size:100%">CUIT:</a>
			<a >
				<input type="text" id="cuitCliente" name="cuitCliente" style="position:absolute ; top:100px ; left:390px ; font-size:100%">
			</a>
			<a style="position:absolute ; top:100px ; left:600px ; font-size:100%">Forma Pago:</a>
			<a id="formaPago" style="position:absolute ; top:100px ; left:700px ; font-size:100%"> </a>
			<a id="idCliente" style="position:absolute ; top:010px ; left:100px ; font-size:150%; width:80px"> </a>
			<a id="nombCliente"  style="position:absolute ; top:010px ; left:210px ; font-size:150%; width:710px" > </a>
			<a id="domicCliente" style="position:absolute ; top:050px ; left:125px ; font-size:100%"> </a>
			<a >
				<input type="text" id="localCliente" name="localCliente" style="position:absolute ; top:075px ; left:125px ; font-size:100%">
			</a>
			<!-- <a >
				<input type="text" id="fiscCliente" name="fiscCliente" style="position:absolute ; top:100px ; left:125px ; font-size:100%">
			</a> 
			<a id="telCliente" name="telCliente" style="position:absolute ; top:125px ; left:125px ; font-size:100%" > </a>
			<!-- <a >
				<input type="text" id="mensCliente" name="mensCliente" style="position:absolute ; top:150px ; left:125px ; font-size:100%">
			</a> -->
		</div>

		<!--BARRA SEPARADORA DE BAJO PRESUPUESTO   DETALLE PRODUCTOS  BARRA SEPARADORA DE BAJO PRESUPUESTO BARRA SEPARADORA DE BAJO PRESUPUESTO-->

		<div style="width:950px ; height:740px ; border: thin solid ; overflow:hidden ; position:absolute ; top:400px">
			<table>
				<tr>
					<th style="border:thin solid" width=50  align="left">Articulo</th>
					<th style="border:thin solid" width=450 align="center">Detalle</th>
					<th style="border:thin solid" width=50  align="right">Cantidad</th>
					<th style="border:thin solid" width=50  align="right">Bonif.%</th>
					<th style="border:thin solid" width=80  align="center">Precio</th>
					<th style="border:thin solid" width=100 align="center">IVA</th>
					<th style="border:thin solid" width=100 align="center">Importe</th>
				</tr>
			</table>
			<table id="DetalleProducto" style="width:100%" border="1">

			</table>

		</div>

		<!--BARRA SEPARADORA DE BAJO PRESUPUESTO   pie factura  BARRA SEPARADORA DE BAJO PRESUPUESTO BARRA SEPARADORA DE BAJO PRESUPUESTO-->

		<div style="width:950px ; height:237px ; border: thin solid ; overflow:hidden ; position:absolute ; bottom:0px">
			<a style="position:absolute ; left:005px ; top:005px ; font-size:100%">OBSERVACIONES</a>
			<a style="position:absolute ; left:005px ; top:130px ; font-size:100%">NROCAE</a>
			<a style="position:absolute ; left:300px ; top:130px ; font-size:100%">VTOCAE</a>
			<img style="position:absolute ; left:5px ; top:150px" height=50 width=576 src="data:image/bitmap;base64,Qk0gAAAAAAAAAD4AAAAoAAAAQAIAAAEAAAABAAEAAAAAAEgAAADEDgAAxA4AAAAAAAAAAAAAAAAAAP///wAzDDPPMM8PMwzDPPPDzMMPDPMwzDzzMMPPMzDw8zPPDDPDwzM8zwwzPDwzDPPMMPDPMzDzMPDPDM88wwzzDDzzPDMM8PPMMww=">
			<a style="position:absolute ; left:50px ; top:200px ; font-size:150%">3056572335506000766375061635225208609183</a>
			<a >
				<label id="SUBTOTAL" for="SUBTOTAL" style="position:absolute ; left:650px ; top:030px ; font-size:100%"> </label>
			</a>
			<a >
				<label for="IVA105" style="position:absolute ; left:650px ; top:055px ; font-size:100%">I.V.A. 10,5%:</label>
				<input type="text" id="IVA105" name ="IVA105" style="text-align:right; position:absolute ; right:10px ; top:050px ; font-size:100%">
			</a>
			<a >
				<label for="IVA21" style="position:absolute ; left:650px ; top:080px ; font-size:100%">I.V.A. 21%:</label>
				<input type="text" id="IVA21" name ="IVA21" style="text-align:right; position:absolute ; right:10px ; top:075px ; font-size:100%">
			</a>
				<BIG><B><label id="TOTAL" for="TOTAL" style="position:absolute ; left:670px ; top:205px ; font-size:100%"> </label></B></BIG>
			</a>
		</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/ajaxListaFacturas.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
    	<input type="text" class="form-control" name="num_serie" id="Num_Serie"  style="visibility:hidden" value="<?echo $_GET['serie']?>">
    	<input type="text" class="form-control" name="tipo_factura" id="Tipo_Factura"  style="visibility:hidden" value="<?echo $_GET['tipo']?>">
    	<input type="text" class="form-control" name="num" id="Num_Factura"  style="visibility:hidden" value="<?echo $_GET['numero']?>">
</body>
</html>


<?php

	if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'ANDROID')||strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'MOBILE')){

				echo '<body  style="background-color:LightCyan">';

			}else{

				echo '<body  style="background-color:LightCyan">';

			}

}else{

	echo "<script> window.location = 'index.php'; </script>";

}

?>
