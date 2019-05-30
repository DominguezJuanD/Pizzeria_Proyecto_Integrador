<?php
	include('conexion.php');
	$TIPOFACT  = $_POST ['TIPOFACT'];
	$serieFact = $_POST ['serieFact'];
	$numFact   = $_POST ['numFact'];
	$fechaFact = $_POST ['fechaFact'];
	$IdCliente = $_POST ['IdCliente'];
	$FormaPago = $_POST ['FormaPago'];
	$SUBTOTAL  = $_POST ['SUBTOTAL'];
	$IVA21     = $_POST ['IVA21'];
	$TOTAL     = $_POST ['TOTAL'];
	$tipoCompraVenta = 1;

	if ((trim(strtoupper($TIPOFACT))) == 'A'){
		$TIPOFACTURA = 'FA';
	}
	if ((trim(strtoupper($TIPOFACT))) == 'B'){
		$TIPOFACTURA = 'FB';
	}

	$CODPRO01 = $_POST ['CODPRO01'];
	$CANPRO01 = $_POST ['CANPRO01'];
	$PREPRO01 = $_POST ['PREPRO01'];
	$BONPRO01 = $_POST ['BONPRO01'];
	$IMPPRO01 = $_POST ['IMPPRO01'];

	$CODPRO02 = $_POST ['CODPRO02'];
	$CANPRO02 = $_POST ['CANPRO02'];
	$PREPRO02 = $_POST ['PREPRO02'];
	$BONPRO02 = $_POST ['BONPRO02'];
	$IMPPRO02 = $_POST ['IMPPRO02'];

	$CODPRO03 = $_POST ['CODPRO03'];
	$CANPRO03 = $_POST ['CANPRO03'];
	$PREPRO03 = $_POST ['PREPRO03'];
	$BONPRO03 = $_POST ['BONPRO03'];
	$IMPPRO03 = $_POST ['IMPPRO03'];

	$CODPRO04 = $_POST ['CODPRO04'];
	$CANPRO04 = $_POST ['CANPRO04'];
	$PREPRO04 = $_POST ['PREPRO04'];
	$BONPRO04 = $_POST ['BONPRO04'];
	$IMPPRO04 = $_POST ['IMPPRO04'];

	$CODPRO05 = $_POST ['CODPRO05'];
	$CANPRO05 = $_POST ['CANPRO05'];
	$PREPRO05 = $_POST ['PREPRO05'];
	$BONPRO05 = $_POST ['BONPRO05'];
	$IMPPRO05 = $_POST ['IMPPRO05'];

	$CODPRO06 = $_POST ['CODPRO06'];
	$CANPRO06 = $_POST ['CANPRO06'];
	$PREPRO06 = $_POST ['PREPRO06'];
	$BONPRO06 = $_POST ['BONPRO06'];
	$IMPPRO06 = $_POST ['IMPPRO06'];

	$CODPRO07 = $_POST ['CODPRO07'];
	$CANPRO07 = $_POST ['CANPRO07'];
	$PREPRO07 = $_POST ['PREPRO07'];
	$BONPRO07 = $_POST ['BONPRO07'];
	$IMPPRO07 = $_POST ['IMPPRO07'];

	$CODPRO08 = $_POST ['CODPRO08'];
	$CANPRO08 = $_POST ['CANPRO08'];
	$PREPRO08 = $_POST ['PREPRO08'];
	$BONPRO08 = $_POST ['BONPRO08'];
	$IMPPRO08 = $_POST ['IMPPRO08'];

	$CODPRO09 = $_POST ['CODPRO09'];
	$CANPRO09 = $_POST ['CANPRO09'];
	$PREPRO09 = $_POST ['PREPRO09'];
	$BONPRO09 = $_POST ['BONPRO09'];
	$IMPPRO09 = $_POST ['IMPPRO09'];

	$CODPRO10 = $_POST ['CODPRO10'];
	$CANPRO10 = $_POST ['CANPRO10'];
	$PREPRO10 = $_POST ['PREPRO10'];
	$BONPRO10 = $_POST ['BONPRO10'];
	$IMPPRO10 = $_POST ['IMPPRO10'];


	$cadena = "";
	if ($CANPRO01>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO01','$CANPRO01','$PREPRO01','$BONPRO01','$IMPPRO01'),";
		obtenerReceta($conexion,$CODPRO01,$CANPRO01);
	}

	if ($CANPRO02>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO02','$CANPRO02','$PREPRO02','$BONPRO02','$IMPPRO02'),";
		obtenerReceta($conexion,$CODPRO02,$CANPRO02);
	}

	if ($CANPRO03>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO03','$CANPRO03','$PREPRO03','$BONPRO03','$IMPPRO03'),";
		obtenerReceta($conexion,$CODPRO03,$CANPRO03);
	}

	if ($CANPRO04>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO04','$CANPRO04','$PREPRO04','$BONPRO04','$IMPPRO04'),";
		obtenerReceta($conexion,$CODPRO04,$CANPRO04);
	}

	if ($CANPRO05>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO05','$CANPRO05','$PREPRO05','$BONPRO05','$IMPPRO05'),";
		obtenerReceta($conexion,$CODPRO05,$CANPRO05);
	}	

	if ($CANPRO06>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO06','$CANPRO06','$PREPRO06','$BONPRO06','$IMPPRO06'),";
		obtenerReceta($conexion,$CODPRO06,$CANPRO06);
	}	
	if ($CANPRO07>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO07','$CANPRO07','$PREPRO07','$BONPRO07','$IMPPRO07'),";
		obtenerReceta($conexion,$CODPRO07,$CANPRO07);
	}	
	if ($CANPRO08>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO08','$CANPRO08','$PREPRO08','$BONPRO08','$IMPPRO08'),";
		obtenerReceta($conexion,$CODPRO08,$CANPRO08);
	}	
	if ($CANPRO09>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO09','$CANPRO09','$PREPRO09','$BONPRO09','$IMPPRO09'),";
		obtenerReceta($conexion,$CODPRO09,$CANPRO09);
	}	
	if ($CANPRO10>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO10','$CANPRO10','$PREPRO10','$BONPRO10','$IMPPRO10'),";
		obtenerReceta($conexion,$CODPRO10,$CANPRO10);
	}	

	$consulta = substr($cadena, 0,-1);
	echo "string".$cadena;
//registra los datos de la cabecera de factura
	$sql0 = "INSERT INTO encabezadoFactura (tipComprob,serieComprob,numComprob,fechaComprob,idCliente,formaPago,subtotal,iva,total,tipoCompraVenta) VALUES ('$TIPOFACTURA','$serieFact','$numFact','$fechaFact','$IdCliente','$FormaPago','$SUBTOTAL','$IVA21','$TOTAL','$tipoCompraVenta')";
	$insertar0 = mysqli_query($conexion, $sql0);

//registra los datos del detalle de la factura
// 1
	$sql1 = "INSERT INTO detalleFactura (numComprob,fechaComprob,serieComprob,id_producto,cantidad,precio,bonificacion,importeProducto) VALUES " . $consulta;
	$insertar1 = mysqli_query($conexion, $sql1);


	/* Esto se utiliza para descontar el stock de los productos
	for ($r=1; $r <= 10 ; $r++) { 
		if ($r < 10){
			$codigo   = $_POST ['CODPRO0'.$r];
			$cantidad = $_POST ['CANPRO0'.$r];
		}else{	
			$codigo   = $_POST ['CODPRO'.$r];
			$cantidad = $_POST ['CANPRO'.$r];
		}
		
		//	$consulta = "UPDATE * FROM stockProductos ";
		$respuesta = mysqli_query($conexion,"UPDATE stockProductos SET stock=stock-$cantidad WHERE id_productoSTK = $codigo");
	}*/


	function descontarStockInsumo($conexion,$idInsumo,$cant){
		$respuesta = mysqli_query($conexion,"UPDATE stock_insumos SET cantidad=cantidad-$cant WHERE id_insumo = $idInsumo");
	}
	function obtenerReceta($conexion,$producto,$cantidad){
		$consulta = mysqli_query($conexion, "SELECT * FROM recetas WHERE id_producto=".$producto);
		while ($resultado = mysqli_fetch_array ($consulta)){
			descontarStockInsumo($conexion,$resultado['id_insumo'],$cantidad*$resultado['cantidad']);
		}
	}
?>	