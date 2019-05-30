<?php 
	include ('conexion.php');
	$consulta = mysqli_query($conexion, "SELECT * FROM productos");
	$rcount=mysqli_num_rows($consulta);
	$arrayProductos = array([$rcount],[3]);
	$i = 0;
	while ($resultado = mysqli_fetch_array ($consulta)){
		$arrayProductos[$i][0]=$resultado['id_producto'];
		$arrayProductos[$i][1]=$resultado['descripcion'];
		$arrayProductos[$i][2]=$resultado['precio'];
		$i = $i + 1;
	}

	$consulta2 = mysqli_query($conexion, "SELECT * FROM clientes");
	$rcount2=mysqli_num_rows($consulta2);
	$arrayClientes = array([$rcount2],[5]);
	$i = 0;
	while ($resultado2 = mysqli_fetch_array ($consulta2)){
		$arrayClientes[$i][0]=$resultado2['telefono'];
		$arrayClientes[$i][1]=$resultado2['nombre'];
		$arrayClientes[$i][2]=$resultado2['fe_na'];
		$arrayClientes[$i][3]=$resultado2['direccion'];
		$arrayClientes[$i][4]=$resultado2['idCliente'];
		$i = $i + 1;
	}

	$consulta5 = mysqli_query($conexion, "SELECT * FROM stockProductos");
	$rcount5=mysqli_num_rows($consulta5);
	$arrayStock = array([$rcount5],[2]);
	$i = 0;
	while ($resultado5 = mysqli_fetch_array ($consulta5)){
		$arrayStock[$i][0]=$resultado5['id_productoSTK'];
		$arrayStock[$i][1]=$resultado5['stock'];
		$i = $i + 1;
	}

	$consulta3  = mysqli_query($conexion, "SELECT * FROM encabezadoFactura WHERE tipComprob = 'FA' ORDER BY numComprob DESC");
	$resultado3 = mysqli_fetch_array($consulta3);
	$ultFactA = $resultado3['numComprob']+1;
	
	$consulta4  = mysqli_query($conexion, "SELECT * FROM encabezadoFactura WHERE tipComprob = 'FB' ORDER BY numComprob DESC");
	$resultado4 = mysqli_fetch_array($consulta4);
	$ultFactB = $resultado4['numComprob']+1;


	$objJson = json_encode($arrayProductos);
	$objJsonClientes = json_encode($arrayClientes);
	$objJsonUltFactA = json_encode($ultFactA);
	$objJsonUltFactB = json_encode($ultFactB);
	$objJsonStock    = json_encode($arrayStock);

 ?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="funciones.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="facturaAjax.js"></script>
	<script src="ventanas_modales.js"></script>
</head>
<a href="menu.php" style="position:absolute ; top:010px ; left:960px ; font-size:150%"><button class="">Volver al menu</button></a>
<input style="position:absolute ; top:050px ; left:960px ; font-size:150%" type="button" value="GRABAR" id="GRABAR" name="GRABAR">

<form id="formularioFactura">

<div style="width:950px ; height:950px ; border: thin solid ; overflow:hidden ; position:relative">
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

		<a >
			<input type="" disabled id="serieFact" name="serieFact" style="position:absolute ; top:050px ; left:150px ; font-size:150%; width:80px; text-align:right">
		</a>
		<a >
			<input type="" disabled id="numFact" name="numFact" style="position:absolute ; top:050px ; left:250px ; font-size:150%; width:190px; text-align:right">
		</a>
		<a >
			<input type="date" id="fechaFact" name="fechaFact" style="position:absolute ; top:085px ; left:150px ; font-size:125%; width:150px">
		</a>
		<a style="position:absolute ; top:120px ; left:150px ; font-size:100%">20-30897760-4</a>
		<a style="position:absolute ; top:140px ; left:150px ; font-size:100%">20-30897760-4</a>
		<a style="position:absolute ; top:160px ; left:150px ; font-size:100%">01/09/2013</a>
	</div>
	<div style="width:50px ; height:50px ; border: thin solid ; overflow:hidden ; position:absolute ; left:450px ; background:#FFF">
		<a ><input type="text" id="TIPOFACT" name="TIPOFACT" style="text-align:center; text-transform:uppercase; position:absolute ; font-size:200%" onchange="calcularTotal() , numeroFactura()"></a>
		<a style="position:absolute ; left:02px ; top:35px ; font-size:75%">CODIGO</a>
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
			<input type="" id="cuitCliente" name="cuitCliente" style="position:absolute ; top:100px ; left:390px ; font-size:100%" disabled>
		</a>
		<a style="position:absolute ; top:100px ; left:615px ; font-size:100%">Forma Pago:</a>
		<a >
			<input type="text" id="formaPago" name="formaPago" style="position:absolute ; top:100px ; left:700px ; font-size:100%">
		</a>
		<a >
			<input type="text" id="idCliente" name="idCliente" style="position:absolute ; top:010px ; left:125px ; font-size:150%; width:80px" onchange ='buscarCliente()'>
		</a>
		<a >
			<input list="lnombCliente" id="nombCliente" name="nombCliente" style="position:absolute ; top:010px ; left:210px ; font-size:150%; width:640px" onchange='buscarIdCliente("nombCliente")'>
				<datalist id="lnombCliente" style="position:absolute ; top:010px ; left:210px ; font-size:150%; width:710px" >
					<?php
						$i = 0;
						while ($i < count($arrayClientes)){
							echo "<option value ='".$arrayClientes[$i][1]."'>";
							echo $arrayClientes[$i][4];
							echo "</option>";
							$i = $i + 1;
						}
					?>
				</datalist>
		</a>
		<a >
			<input type="" id="domicCliente" name="domicCliente" style="position:absolute ; top:050px ; left:125px ; font-size:100%" disabled>
		</a>
		<a >
			<input type="" id="localCliente" name="localCliente" style="position:absolute ; top:075px ; left:125px ; font-size:100%" disabled>
		</a>
		<a >
			<input type="" id="fiscCliente" name="fiscCliente" style="position:absolute ; top:100px ; left:125px ; font-size:100%" disabled>
		</a>
		<a >
			<input type="" id="telCliente" name="telCliente" style="position:absolute ; top:125px ; left:125px ; font-size:100%" disabled>
		</a>
		<a >
			<input type="" id="mensCliente" name="mensCliente" style="position:absolute ; top:150px ; left:125px ; font-size:100%" disabled>
		</a>
	</div>
	<div style="width:950px ; height:450px ; border: thin solid ; overflow:hidden ; position:absolute ; top:400px">
		<table>
			<tr>
				<th style="border:thin solid ; width: 55px"  align="left">Articulo</th>
				<th style="border:thin solid ; width: 600px" align="center">Detalle</th>
				<th style="border:thin solid ; width: 65px"  align="right">Cantidad</th>
				<th style="border:thin solid ; width: 55px"  align="right">Bonif.%</th>
				<th style="border:thin solid ; width: 55px"  align="center">Precio</th>
				<th style="border:thin solid ; width: 55px"  align="center">Importe</th>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 1 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO01" onchange='buscarDescripcion(document.getElementById("CODPRO01").value,"01") , calcularPrecio("01") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO01" style="width: 600px" id="DETPRO01" name="lDETPRO01" onchange="buscarIdProducto('CODPRO01','DETPRO01','PREPRO01') , calcularTotal()">
						<datalist id="lDETPRO01" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO01" style="width: 65px" onchange='controlarVacio("01")' ></td>
				<td ><input type="" id="BONPRO01" style="width: 55px" onchange='calcularPrecio("01") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO01" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO01" style="width: 55px" disabled></td>
			</tr>			
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 2 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO02" onchange='buscarDescripcion(document.getElementById("CODPRO02").value,"02") , calcularPrecio("02") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO02" style="width: 600px" id="DETPRO02" name="lDETPRO02" onchange="buscarIdProducto('CODPRO02','DETPRO02','PREPRO02') , calcularTotal()">
						<datalist id="lDETPRO02" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO02" style="width: 65px" onchange='controlarVacio("02")' ></td>
				<td ><input type="" id="BONPRO02" style="width: 55px" onchange='calcularPrecio("02") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO02" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO02" style="width: 55px" disabled></td>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 3 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO03" onchange='buscarDescripcion(document.getElementById("CODPRO03").value,"03") , calcularPrecio("03") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO03" style="width: 600px" id="DETPRO03" name="lDETPRO03" onchange="buscarIdProducto('CODPRO03','DETPRO03','PREPRO03') , calcularTotal()">
						<datalist id="lDETPRO03" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO03" style="width: 65px" onchange='controlarVacio("03")' ></td>
				<td ><input type="" id="BONPRO03" style="width: 55px" onchange='calcularPrecio("03") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO03" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO03" style="width: 55px" disabled></td>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 4 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO04" onchange='buscarDescripcion(document.getElementById("CODPRO04").value,"04") , calcularPrecio("04") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO04" style="width: 600px" id="DETPRO04" name="lDETPRO04" onchange="buscarIdProducto('CODPRO04','DETPRO04','PREPRO04') , calcularTotal()">
						<datalist id="lDETPRO04" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO04" style="width: 65px" onchange='controlarVacio("04")' ></td>
				<td ><input type="" id="BONPRO04" style="width: 55px" onchange='calcularPrecio("04") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO04" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO04" style="width: 55px" disabled></td>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 5 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO05" onchange='buscarDescripcion(document.getElementById("CODPRO05").value,"05") , calcularPrecio("05") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO05" style="width: 600px" id="DETPRO05" name="lDETPRO05" onchange="buscarIdProducto('CODPRO05','DETPRO05','PREPRO05') , calcularTotal()">
						<datalist id="lDETPRO05" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO05" style="width: 65px" onchange='controlarVacio("05")' ></td>
				<td ><input type="" id="BONPRO05" style="width: 55px" onchange='calcularPrecio("05") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO05" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO05" style="width: 55px" disabled></td>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 6 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO06" onchange='buscarDescripcion(document.getElementById("CODPRO06").value,"06") , calcularPrecio("06") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO06" style="width: 600px" id="DETPRO06" name="lDETPRO06" onchange="buscarIdProducto('CODPRO06','DETPRO06','PREPRO06') , calcularTotal()">
						<datalist id="lDETPRO06" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO06" style="width: 65px" onchange='controlarVacio("06")' ></td>
				<td ><input type="" id="BONPRO06" style="width: 55px" onchange='calcularPrecio("06") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO06" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO06" style="width: 55px" disabled></td>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 7 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO07" onchange='buscarDescripcion(document.getElementById("CODPRO07").value,"07") , calcularPrecio("07") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO07" style="width: 600px" id="DETPRO07" name="lDETPRO07" onchange="buscarIdProducto('CODPRO07','DETPRO07','PREPRO07') , calcularTotal()">
						<datalist id="lDETPRO07" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO07" style="width: 65px" onchange='controlarVacio("07")' ></td>
				<td ><input type="" id="BONPRO07" style="width: 55px" onchange='calcularPrecio("07") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO07" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO07" style="width: 55px" disabled></td>
			</tr>	
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 8 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO08" onchange='buscarDescripcion(document.getElementById("CODPRO08").value,"08") , calcularPrecio("08") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO08" style="width: 600px" id="DETPRO08" name="lDETPRO08" onchange="buscarIdProducto('CODPRO08','DETPRO08','PREPRO08') , calcularTotal()">
						<datalist id="lDETPRO08" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO08" style="width: 65px" onchange='controlarVacio("08")' ></td>
				<td ><input type="" id="BONPRO08" style="width: 55px" onchange='calcularPrecio("08") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO08" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO08" style="width: 55px" disabled></td>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 9 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO09" onchange='buscarDescripcion(document.getElementById("CODPRO09").value,"09") , calcularPrecio("09") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO09" style="width: 600px" id="DETPRO09" name="lDETPRO09" onchange="buscarIdProducto('CODPRO09','DETPRO09','PREPRO09') , calcularTotal()">
						<datalist id="lDETPRO09" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO09" style="width: 65px" onchange='controlarVacio("09")' ></td>
				<td ><input type="" id="BONPRO09" style="width: 55px" onchange='calcularPrecio("09") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO09" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO09" style="width: 55px" disabled></td>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 10 *****************************************************-->
			<tr>
				<td align="left">
					<input type="" style="width: 55px" id="CODPRO10" onchange='buscarDescripcion(document.getElementById("CODPRO10").value,"10") , calcularPrecio("10") , calcularTotal()'>
				</td>				
				<td align="left">
					<input list="lDETPRO10" style="width: 600px" id="DETPRO10" name="lDETPRO10" onchange="buscarIdProducto('CODPRO10','DETPRO10','PREPRO10') , calcularTotal()">
						<datalist id="lDETPRO10" >
							<?php
								$i = 0;
								while ($i < count($arrayProductos)){
									echo "<option value ='".$arrayProductos[$i][1]."'>";
									echo $arrayProductos[$i][0];
									echo "</option>";
									$i = $i + 1;
								}
							?>
						</datalist>
				</td>
				<td><input type=""  id="CANPRO10" style="width: 65px" onchange='controlarVacio("10")' ></td>
				<td ><input type="" id="BONPRO10" style="width: 55px" onchange='calcularPrecio("10") , calcularTotal()' ></td>
				<td ><input type="" id="PREPRO10" style="width: 55px" disabled></td>
				<td ><input type="" id="IMPPRO10" style="width: 55px" disabled></td>
			</tr>																				
		</table>
	</div>
	<div style="width:950px ; height:225px ; border: thin solid ; overflow:hidden ; position:absolute ; bottom:0px">
		<a style="position:absolute ; left:005px ; top:005px ; font-size:100%">OBSERVACIONES</a>
		<a style="position:absolute ; left:005px ; top:130px ; font-size:100%">NROCAE</a>
		<a style="position:absolute ; left:300px ; top:130px ; font-size:100%">VTOCAE</a>
		<img style="position:absolute ; left:5px ; top:150px" height=50 width=576 src="data:image/bitmap;base64,Qk0gAAAAAAAAAD4AAAAoAAAAQAIAAAEAAAABAAEAAAAAAEgAAADEDgAAxA4AAAAAAAAAAAAAAAAAAP///wAzDDPPMM8PMwzDPPPDzMMPDPMwzDzzMMPPMzDw8zPPDDPDwzM8zwwzPDwzDPPMMPDPMzDzMPDPDM88wwzzDDzzPDMM8PPMMww=">
		<a style="position:absolute ; left:50px ; top:200px ; font-size:150%">3056572335506000766375061635225210609183</a>
		<a >
			<label for="SUBTOTAL" style="position:absolute ; left:650px ; top:030px ; font-size:100%">SUBTOTAL:</label>
			<input type="text" id="SUBTOTAL"  name ="SUBTOTAL"  style="text-align:right; position:absolute ; right:10px ; top:025px ; font-size:100%">
		</a>
		<a >
			<label for="IVA105" style="position:absolute ; left:650px ; top:055px ; font-size:100%">I.V.A. 10,5%:</label>
			<input type="text" id="IVA105" name ="IVA105" style="text-align:right; position:absolute ; right:10px ; top:050px ; font-size:100%">
		</a>
		<a >
			<label for="IVA21" style="position:absolute ; left:650px ; top:080px ; font-size:100%">I.V.A. 21%:</label>
			<input type="text" id="IVA21" name ="IVA21" style="text-align:right; position:absolute ; right:10px ; top:075px ; font-size:100%">
		</a>
		<!--<a >
			<label for="IVA21" style="position:absolute ; left:650px ; top:080px ; font-size:100%">I.V.A. 21%:</label>
			<input type="text" id="IMPUESTO3" name ="IMPUESTO3" style="text-align:right; position:absolute ; right:10px ; top:100px ; font-size:100%">
		</a>
		<a ><input type="text" id="IMPUESTO4" name ="IMPUESTO4" style="text-align:right; position:absolute ; right:10px ; top:125px ; font-size:100%"></a>
		<a ><input type="text" id="IMPUESTO5" name ="IMPUESTO5" style="text-align:right; position:absolute ; right:10px ; top:150px ; font-size:100%"></a>-->
		<a >
			<BIG><B><label for="TOTAL" style="position:absolute ; left:670px ; top:190px ; font-size:100%">TOTAL:</label></B></BIG>
			<input type="text" id="TOTAL" name="TOTAL" style="text-align:right ; position:absolute ; right:10px ; bottom:10px ; font-size:100% ; border: thin solid">
		</a>
	</div>

</div>
<div>
	
</div>
</form>

	<!--<a href="#" id="mostrar-modal">CLIENTE NUEVO</a>-->
<script type="text/javascript">
	var $arrayProductosJS = eval (<?php echo $objJson;?>);
	var $arrayClientesJS = eval (<?php echo $objJsonClientes;?>);
	var $numeroFacturaA = eval (<?php echo $objJsonUltFactA;?>);
	var $numeroFacturaB = eval (<?php echo $objJsonUltFactB;?>);
	var $stockProductos = eval (<?php echo $objJsonStock;?>);
</script>
