<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="icono.ico">
 	<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1"/>
	<meta redirect/>
	<link rel="icon" type="image/png" href="icono.ico" /> 
	<link rel="stylesheet" href="index.css">
	<big><h1 style ='font-family:monospace; color:black' BORDER=1 name = "h1">CIERRE DE CAJA</h1></big>
	<style>
		body{
			background: url(prueba1.1.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			}
		#tabla2{
			border-collapse: collapse;
  			border-spacing: 0;
  			border: 1px solid #327EF3;
		}
		td, tr :first-child {
		    border-radius: 6px 0 0 0;
		}

		td, tr :last-child {
		    border-radius: 0 6px 0 0;
		}

		td, tr :only-child{
		    border-radius: 6px 6px 6px 6px;
		}
	</style>
</head>
<form  method="POST" action="cierreCaja.php" name="frm">
	<table border = "1" name = "tabla 2" id="tabla2">
		<tr>
			<td width ="230"><label style='font-family: monospace;' for="idusuario">Fecha de cierre:</label></td>
			<td width ="230"><input style='font-family: monospace;' type="date" placeholder="fecha" name="fecha" id="fecha"  value="ponerFecha()" </td>
		</tr>
	</table>
	<table class="botones" style="cursor:hand">
		<tr>
			<td><center>
			<input type="submit" value="Buscar Movimientos"  name="buscarMovimientos">
			</center></td>
		</tr>
		<tr>
			<td><center>
			<input type="submit" value="Cierre diario"  name="cierreDiario">
			</center></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
	if (isset($_POST['buscarMovimientos'])){ 
		$fecha = $_POST['fecha'];
		include ('conexion.php');
		$consulta = $consulta = mysqli_query($conexion,"SELECT * FROM encabezadoFactura");
		$totalVentas = 0;
		$totalCompras = 0;
		while ($resultado = mysqli_fetch_array ($consulta)){
			if (compararFechas($resultado['fechaComprob'],$fecha)){
				if ($resultado['tipoCompraVenta']==1){
					$totalVentas = $totalVentas + $resultado['total'];
				}
				if ($resultado['tipoCompraVenta']==2){
					$totalCompras = $totalCompras + $resultado['total'];
				}
			}
		}
		$consulta = $consulta = mysqli_query($conexion,"SELECT * FROM IEDinero");
		$totalIngresos = 0;
		$totalEgresos = 0;
		while ($resultado = mysqli_fetch_array ($consulta)){
			if (compararFechas($resultado['fecha'],$fecha)){
				if ($resultado['tipo']==1){
					$totalIngresos = $totalIngresos + $resultado['importe'];
				}
				if ($resultado['tipo']==2){
					$totalEgresos = $totalEgresos + $resultado['importe'];
				}
			}
		}

		echo"Total Ventas: ".$totalVentas."<br>";
		echo"Total Compras: ".$totalCompras."<br>";
		echo"Total Ingreso de dinero: ".$totalIngresos."<br>";
		echo"Total Egreso de dinero: ".$totalEgresos."<br>";

	}






function compararFechas($primera,$segunda){
	$arrP = explode ("-", $primera);   
	$arrS = explode ("-", $segunda); 

	if (($arrP[0] == $arrS[0])and($arrP[1] == $arrS[1])and($arrP[2] == $arrS[2])){
		return true;
	}else{
		return false;
	}
}
?>

<script type="text/javascript">
	function ponerFecha(){
		document.getElementById('fecha').value= <?php echo $_POST["fecha"];?>
	}
</script>