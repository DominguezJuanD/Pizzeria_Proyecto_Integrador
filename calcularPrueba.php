<?php	
	include ('conexion.php');
	$consulta = mysqli_query($conexion,"SELECT total,sum(total) as todos FROM encabezadoFactura where tipoCompraVenta="."1");	
	$row = mysqli_fetch_array ($consulta);
	echo "Ventas: ".round($row['todos'],2)."<br>";

	$consulta = mysqli_query($conexion,"SELECT total,sum(total) as todos FROM encabezadoFactura where tipoCompraVenta="."2");	
	$row = mysqli_fetch_array ($consulta);
	echo "Compras: ".round($row['todos'],2)."<br>";	
?>