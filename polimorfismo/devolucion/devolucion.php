<?PHP
$conexion = mysqli_connect("mysql.hostinger.com.ar","u178713617_poli","baloo12345","u178713617_poli");
	$consulta = mysqli_query($conexion, "SELECT * FROM cliente");
	$rcounta=mysqli_num_rows($consulta);
	$arrayCliente = array([$rcounta],[1]);
	$i = 0;
	while ($resultado = mysqli_fetch_array ($consulta)){
		$arrayClientes[$i][0]=$resultado['IdCliente'];
		$arrayClientes[$i][1]=$resultado['NombreCliente'];
		$i += 1;
	}
$objJsonClientes = json_encode($arrayClientes);
?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<title>registro de devoluciones</title>
</head>
<body>
<center>
<br>
<form >
	<b>IDCliente:</b> <input type="text" class="caja_busqueda" name="idcliente" id="idcliente" onchange='buscarCliente()'>
	<b>Nombre:</b> <input list="idnombre" class="caja_busqueda" type="text" name="nombre" id="nombre" onchange='buscarIdCliente("nombre")'>
		<datalist id="idnombre" >
			<?php
				$i = 0;
				while ($i < count($arrayClientes)){
					echo "<option value ='".$arrayClientes[$i][1]."'>";
					echo $arrayClientes[$i][0];
					echo "</option>";
					$i = $i + 1;
				}
			?>
		</datalist>

	<input type="submit" name="buscar" value="buscar" id="buscar">
	<br>
	<!-- IDreserva<input type="text" name="idreserva" id= "idReserva">
	Fecha<input type="date" name="fecha" id="fecha"> -->


</form>
<br>
<div id="datos"></div>

<!-- <div id="datos2"></div> -->
<!--  <form method='POST' action='/polimorfismo/devolucion/guardardevolucion.php' id="datos">
	<input type="submit" name="enviar" value="enviar" id = "Benviar">
</form>  -->
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	var $arrayClientesJS = eval (<?php echo $objJsonClientes;?>);
</script>
<script src= "/polimorfismo/devolucion/devolucion.js" ></script>
<link rel="stylesheet" type="text/css" href="/polimorfismo/devolucion/devolucion.css">
</center>
</body>
</html>
