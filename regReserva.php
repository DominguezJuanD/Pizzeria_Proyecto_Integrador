<?php
	include("conexion.php");
	$numReserva   = $_POST ['numReserva'];
	$fechaReserva = $_POST ['fechaReserva'];
	$IdCliente = $_POST ['IdCliente'];
	
	$CODPRO01 = $_POST ['CODPRO01'];
	$CANPRO01 = $_POST ['CANPRO01'];

	$CODPRO02 = $_POST ['CODPRO02'];
	$CANPRO02 = $_POST ['CANPRO02'];

	$CODPRO03 = $_POST ['CODPRO03'];
	$CANPRO03 = $_POST ['CANPRO03'];

	$CODPRO04 = $_POST ['CODPRO04'];
	$CANPRO04 = $_POST ['CANPRO04'];

	$CODPRO05 = $_POST ['CODPRO05'];
	$CANPRO05 = $_POST ['CANPRO05'];

	$CODPRO06 = $_POST ['CODPRO06'];
	$CANPRO06 = $_POST ['CANPRO06'];

	$CODPRO07 = $_POST ['CODPRO07'];
	$CANPRO07 = $_POST ['CANPRO07'];

	$CODPRO08 = $_POST ['CODPRO08'];
	$CANPRO08 = $_POST ['CANPRO08'];

	$CODPRO09 = $_POST ['CODPRO09'];
	$CANPRO09 = $_POST ['CANPRO09'];

	$CODPRO10 = $_POST ['CODPRO10'];
	$CANPRO10 = $_POST ['CANPRO10'];

	$cadena = "";
	if ($CANPRO01>0) {
		$cadena = $cadena . "('$numReserva','$fechaReserva','$serieFact','$CODPRO01','$CANPRO01','$PREPRO01','$BONPRO01','$IMPPRO01'),";
	}

	if ($CANPRO02>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO02','$CANPRO02','$PREPRO02','$BONPRO02','$IMPPRO02'),";
	}

	if ($CANPRO03>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO03','$CANPRO03','$PREPRO03','$BONPRO03','$IMPPRO03'),";
	}

	if ($CANPRO04>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO04','$CANPRO04','$PREPRO04','$BONPRO04','$IMPPRO04'),";
	}

	if ($CANPRO05>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO05','$CANPRO05','$PREPRO05','$BONPRO05','$IMPPRO05'),";
	}	

	if ($CANPRO06>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO06','$CANPRO06','$PREPRO06','$BONPRO06','$IMPPRO06'),";
	}	
	if ($CANPRO07>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO07','$CANPRO07','$PREPRO07','$BONPRO07','$IMPPRO07'),";
	}	
	if ($CANPRO08>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO08','$CANPRO08','$PREPRO08','$BONPRO08','$IMPPRO08'),";
	}	
	if ($CANPRO09>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO09','$CANPRO09','$PREPRO09','$BONPRO09','$IMPPRO09'),";
	}	
	if ($CANPRO10>0) {
		$cadena = $cadena . "('$numFact','$fechaFact','$serieFact','$CODPRO10','$CANPRO10','$PREPRO10','$BONPRO10','$IMPPRO10'),";
	}	

	$consulta = substr($cadena, 0,-1);
	echo "string".$cadena;
//registra los datos de la cabecera de factura
	$sql0 = "INSERT INTO encabezadoFactura (tipComprob,serieComprob,numComprob,fechaComprob,idCliente,formaPago,subtotal,iva,total) VALUES ('$TIPOFACTURA','$serieFact','$numFact','$fechaFact','$IdCliente','$FormaPago','$SUBTOTAL','$IVA21','$TOTAL')";
	$insertar0 = mysqli_query($conexion, $sql0);

//registra los datos del detalle de la factura
// 1
	$sql1 = "INSERT INTO detalleFactura (numComprob,fechaComprob,serieComprob,id_producto,cantidad,precio,bonificacion,importeProducto) VALUES " . $consulta;
	$insertar1 = mysqli_query($conexion, $sql1);


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
	}
?>	