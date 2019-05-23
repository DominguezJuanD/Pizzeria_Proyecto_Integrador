<?php 
	include ('conexion.php');
	$consulta = mysqli_query($conexion, "SELECT * FROM Productos");
	$rcount=mysqli_num_rows($consulta);
	$arrayProductos = array([$rcount],[2]);
	$i = 0;
	while ($resultado = mysqli_fetch_array ($consulta)){
		$arrayProductos[$i][0]=$resultado['Id_producto'];
		$arrayProductos[$i][1]=$resultado['Descripcion'];
		$i = $i + 1;
	}

	$consulta2 = mysqli_query($conexion, "SELECT * FROM cliente");
	$rcount2=mysqli_num_rows($consulta2);
	$arrayClientes = array([$rcount2],[5]);
	$i = 0;
	while ($resultado2 = mysqli_fetch_array ($consulta2)){
		$arrayClientes[$i][0]=$resultado2['IdCliente'];
		$arrayClientes[$i][1]=$resultado2['NombreCliente'];
		//$arrayClientes[$i][2]=$resultado2['fe_na'];
		//$arrayClientes[$i][3]=$resultado2['direccion'];
		//$arrayClientes[$i][4]=$resultado2['idCliente'];
		$i = $i + 1;
	}

	$consulta5 = mysqli_query($conexion, "SELECT * FROM stock");
	$rcount5=mysqli_num_rows($consulta5);
	$arrayStock = array([$rcount5],[5]);
	$i = 0;
	while ($resultado5 = mysqli_fetch_array ($consulta5)){
		$arrayStock[$i][0]=$resultado5['Id_productoSTK'];
		$arrayStock[$i][1]=$resultado5['Stock'];
		$i = $i + 1;
	}

	$consulta6     = mysqli_query($conexion, "SELECT * FROM DetalleReserva");
	$rcount6       = mysqli_num_rows($consulta6);
	$arrayReservas = array([$rcount6],[4]);
	$i = 0;
	while ($resultado6 = mysqli_fetch_array ($consulta6)){
		$arrayReservas[$i][0]=$resultado6['Id_reserva'];
		$arrayReservas[$i][1]=$resultado6['Id_producto'];
		$arrayReservas[$i][2]=$resultado6['Cant_reservada'];
		$arrayReservas[$i][3]=$resultado6['fechaReserva'];
		$i = $i + 1;
	}

	$consulta3     = mysqli_query($conexion, "SELECT * FROM reserva ORDER BY id_reserva DESC");
	$resultado3    = mysqli_fetch_array($consulta3);
	$ultNumReserva = $resultado3['id_reserva']+1;
	
	$objJson              = json_encode($arrayProductos);
	$objJsonClientes      = json_encode($arrayClientes);
	$objJsonUltNumReserva = json_encode($ultNumReserva);
	$objJsonStock         = json_encode($arrayStock);
	$objJsonReservas      = json_encode($arrayReservas);

 ?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="funcionesReservas.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="reservaAjax.js"></script>
		<style type="text/css">
			body {
				margin: 0;
			  	padding: 0;
			  	background: #C4D1FE;
			  	position: relative;
			}
		</style>
</head>
<form id="formularioFactura">

<div style="width:950px ; height:610px ; border: thin solid ; overflow:hidden ; position:relative">
	<div style="width:475px ; height:130px ; border: thin solid ; overflow:hidden ; position:absolute">
	<img style="position:absolute ; top:2px ; left:02px" height=75 src="logofactura.png">
		<a style="position:absolute ; top:020px ; left:250px ; font-size:150%"></a>
		<a style="position:absolute ; top:080px ; left:010px ; font-size:100%"></a>
		<a style="position:absolute ; top:100px ; left:010px ; font-size:100%"></a>
		<a style="position:absolute ; top:120px ; left:010px ; font-size:100%"></a>
		<a style="position:absolute ; top:140px ; left:010px ; font-size:100%"></a>
		<a style="position:absolute ; top:160px ; left:010px ; font-size:100%"></a>
	</div>
	<div style="width:475px ; height:130px ; border: thin solid ; overflow:hidden ; position:absolute ; left:475px">
		<a style="position:absolute ; top:005px ; left:150px ; font-size:200%">RESERVA</a>
		<a style="position:absolute ; top:010px ; right:15px ; font-size:75%">Original</a>
		<a style="position:absolute ; top:020px ; right:15px ; font-size:75%">Pag. 1/1</a>
		<a style="position:absolute ; top:050px ; left:010px ; font-size:150%">Numero:</a>
		<a style="position:absolute ; top:085px ; left:010px ; font-size:125%">Fecha:</a>
		<a >
			<input type="text" alidn id="numReserva" name="numReserva" style="position:absolute ; top:050px ; left:150px ; font-size:150%; width:150px; text-align:center">
		</a>
		<a >
			<input type="date" id="fechaReserva" name="fechaReserva" style="position:absolute ; top:085px ; left:150px ; font-size:125%; width:150px">
		</a>
	</div>
	<div style="width:50px ; height:50px ; border: thin solid ; overflow:hidden ; position:absolute ; left:450px ; background:#FFF">
		<a style="text-align:center; text-transform:uppercase; position:absolute ; font-size:200%">RS</a>
		<a style="position:absolute ; left:02px ; top:35px ; font-size:75%">CODIGO</a>
	</div>
	<div style="width:950px ; height:200px ; border: thin solid ; overflow:hidden ; position:absolute ; top:130px">
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
		<a style="position:absolute ; top:100px ; left:615px ; font-size:100%">Forma Pago:</a>
		<a >
			<input type="text" id="formaPago" name="formaPago" style="position:absolute ; top:100px ; left:700px ; font-size:100%">
		</a>
		<a >
			<input type="text" id="idCliente" name="idCliente" style="position:absolute ; top:010px ; left:125px ; font-size:150%; width:80px" onchange ='buscarCliente()'>
		</a>
		<a >
			<input list="lnombCliente" id="nombCliente" name="nombCliente" style="position:absolute ; top:010px ; left:210px ; font-size:150%; width:710px" onchange='buscarIdCliente("nombCliente")'>
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
			<input type="text" id="domicCliente" name="domicCliente" style="position:absolute ; top:050px ; left:125px ; font-size:100%">
		</a>
		<a >
			<input type="text" id="localCliente" name="localCliente" style="position:absolute ; top:075px ; left:125px ; font-size:100%">
		</a>
		<a >
			<input type="text" id="fiscCliente" name="fiscCliente" style="position:absolute ; top:100px ; left:125px ; font-size:100%">
		</a>
		<a >
			<input type="text" id="telCliente" name="telCliente" style="position:absolute ; top:125px ; left:125px ; font-size:100%" >
		</a>
		<a >
			<input type="text" id="mensCliente" name="mensCliente" style="position:absolute ; top:150px ; left:125px ; font-size:100%">
		</a>
	</div>
	<div style="width:950px ; height:300px ; border: thin solid ; overflow:hidden ; position:absolute ; top:330px">
		<table>
			<tr>
				<th style="border:thin solid" width=50  align="left">Articulo</th>
				<th style="border:thin solid" width=450 align="center">Detalle</th>
				<th style="border:thin solid" width=50  align="right">Cantidad</th>
			</tr>
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 1 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO01" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO01").value,"01") , calcularPrecio("01") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO01" id="DETPRO01" name="lDETPRO01" style="width: 99.5%" onchange="buscarIdProducto('CODPRO01','DETPRO01','PREPRO01') , calcularTotal()">
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
				<td><input type="" id="CANPRO01" onchange='consultarDisponibilidad("01")' style="width: 70px"></td>
			</tr>			
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 2 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO02" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO02").value,"02") , calcularPrecio("02") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO02" id="DETPRO02" name="lDETPRO02" style="width: 99.5%" onchange="buscarIdProducto('CODPRO02','DETPRO02','PREPRO02') , calcularTotal()">
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
				<td><input type="" id="CANPRO02" onchange='consultarDisponibilidad("02")' style="width: 70px"></td>
			</tr>		
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 3 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO03" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO03").value,"03") , calcularPrecio("03") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO03" id="DETPRO03" name="lDETPRO03" style="width: 99.5%" onchange="buscarIdProducto('CODPRO03','DETPRO03','PREPRO03') , calcularTotal()">
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
				<td><input type="" id="CANPRO03" onchange='consultarDisponibilidad("03")' style="width: 70px"></td>
			</tr>		
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 4 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO04" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO04").value,"04") , calcularPrecio("04") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO04" id="DETPRO04" name="lDETPRO04" style="width: 99.5%" onchange="buscarIdProducto('CODPRO04','DETPRO04','PREPRO04') , calcularTotal()">
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
				<td><input type="" id="CANPRO04" onchange='consultarDisponibilidad("04")' style="width: 70px"></td>
			</tr>	
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 5 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO05" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO05").value,"05") , calcularPrecio("05") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO05" id="DETPRO05" name="lDETPRO05" style="width: 99.5%" onchange="buscarIdProducto('CODPRO05','DETPRO05','PREPRO05') , calcularTotal()">
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
				<td><input type="" id="CANPRO05" onchange='consultarDisponibilidad("05")' style="width: 70px"></td>
			</tr>		
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 6 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO06" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO06").value,"06") , calcularPrecio("06") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO06" id="DETPRO06" name="lDETPRO06" style="width: 99.5%" onchange="buscarIdProducto('CODPRO06','DETPRO06','PREPRO06') , calcularTotal()">
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
				<td><input type="" id="CANPRO06" onchange='consultarDisponibilidad("06")' style="width: 70px"></td>
			</tr>		
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 7 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO07" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO07").value,"07") , calcularPrecio("07") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO07" id="DETPRO07" name="lDETPRO07" style="width: 99.5%" onchange="buscarIdProducto('CODPRO07','DETPRO07','PREPRO07') , calcularTotal()">
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
				<td><input type="" id="CANPRO07" onchange='consultarDisponibilidad("07")' style="width: 70px"></td>
			</tr>	
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 8 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO08" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO08").value,"08") , calcularPrecio("08") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO08" id="DETPRO08" name="lDETPRO08" style="width: 99.5%" onchange="buscarIdProducto('CODPRO08','DETPRO08','PREPRO08') , calcularTotal()">
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
				<td><input type="" id="CANPRO08" onchange='consultarDisponibilidad("08")' style="width: 70px"></td>
			</tr>	
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 9 ******************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO09" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO09").value,"09") , calcularPrecio("09") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO09" id="DETPRO09" name="lDETPRO09" style="width: 99.5%" onchange="buscarIdProducto('CODPRO09','DETPRO09','PREPRO09') , calcularTotal()">
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
				<td><input type="" id="CANPRO09" onchange='consultarDisponibilidad("09")' style="width: 70px"></td>
			</tr>		
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 10 *****************************************************-->
			<tr>
				<td align="left">
					<input type="" id="CODPRO10" style="width: 50" onchange='buscarDescripcion(document.getElementById("CODPRO10").value,"10") , calcularPrecio("10") , calcularTotal()'>
				</td>				
				<td align="left" width="85%">
					<input list="lDETPRO10" id="DETPRO10" name="lDETPRO10" style="width: 99.5%" onchange="buscarIdProducto('CODPRO10','DETPRO10','PREPRO10') , calcularTotal()">
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
				<td><input type="" id="CANPRO10" onchange='consultarDisponibilidad("10")' style="width: 70px"></td>
			</tr>		
<!--***************************************************** AQUI COMIENZA TODO LO RELACIONADO AL PRODUCTO 11 *****************************************************-->
		</table>
	</div>
</div>
<div>
	<input type="button" value="GRABAR" id="GRABAR" name="GRABAR">
</div>
</form>

<script type="text/javascript">
	var $arrayProductosJS = eval (<?php echo $objJson;?>);
	var $arrayClientesJS  = eval (<?php echo $objJsonClientes;?>);
	var $numeroreserva    = eval (<?php echo $ultNumReserva;?>);
	var $stockProductos   = eval (<?php echo $objJsonStock;?>);
	var $Reservas         = eval (<?php echo $objJsonReservas;?>);
	
	document.getElementById('numReserva').value = $numeroreserva;

	function consultarDisponibilidad($num){
		$fecha = document.getElementById('fechaReserva').value.split("-")
		for (var i = 0; i < $Reservas.length; i++) {
			$fechaTabla = $Reservas[i][3].split("-")
			if (($fecha[0]==$fechaTabla[0]) && ($fecha[1]==$fechaTabla[1]) && ($fecha[2]==$fechaTabla[2])){
				if($Reservas[i][1] == document.getElementById('CODPRO'.concat($num)).value){
					$stockReservado = consultarStock($num)
					$cantidad = (document.getElementById('CANPRO'.concat($num)).value * 1)
					if ($stockReservado < (($Reservas[i][2] * 1) + $cantidad)) {
						alert("No hay stock disponible del producto, para la fecha solicitada")
						document.getElementById('CANPRO'.concat($num)).value = ""
					}

				}
			}
		}
	}
	function consultarStock($num){
		$codigo = document.getElementById('CODPRO'.concat($num)).value
		for (var i = 0; i < $stockProductos.length; i++) {
			if ($stockProductos[i][0] == $codigo){
				$Cantidad = $stockProductos[i][1]
			}
		}
		return $Cantidad
	}	
</script>
