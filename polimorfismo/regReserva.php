<?php
	include ('conexion.php');
	$numReserva   = $_POST ['numReserva'];
	$fechaReserva = $_POST ['fechaReserva'];
	$idCliente = $_POST ['idCliente'];

	$CODPRO01 = $_POST ['CODPRO01']*1;
	$CANPRO01 = $_POST ['CANPRO01']*1;

	$CODPRO02 = $_POST ['CODPRO02']*1;
	$CANPRO02 = $_POST ['CANPRO02']*1;

	$CODPRO03 = $_POST ['CODPRO03']*1;
	$CANPRO03 = $_POST ['CANPRO03']*1;

	$CODPRO04 = $_POST ['CODPRO04']*1;
	$CANPRO04 = $_POST ['CANPRO04']*1;

	$CODPRO05 = $_POST ['CODPRO05']*1;
	$CANPRO05 = $_POST ['CANPRO05']*1;

	$CODPRO06 = $_POST ['CODPRO06']*1;
	$CANPRO06 = $_POST ['CANPRO06']*1;

	$CODPRO07 = $_POST ['CODPRO07']*1;
	$CANPRO07 = $_POST ['CANPRO07']*1;

	$CODPRO08 = $_POST ['CODPRO08']*1;
	$CANPRO08 = $_POST ['CANPRO08']*1;

	$CODPRO09 = $_POST ['CODPRO09']*1;
	$CANPRO09 = $_POST ['CANPRO09']*1;

	$CODPRO10 = $_POST ['CODPRO10']*1;
	$CANPRO10 = $_POST ['CANPRO10']*1;

	$cadena = "";
	if ($CANPRO01>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO01','$CANPRO01','$fechaReserva'),";
	}

	if ($CANPRO02>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO02','$CANPRO02','$fechaReserva'),";
	}

	if ($CANPRO03>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO03','$CANPRO03','$fechaReserva'),";
	}

	if ($CANPRO04>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO04','$CANPRO04','$fechaReserva'),";
	}

	if ($CANPRO05>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO05','$CANPRO05','$fechaReserva'),";
	}

	if ($CANPRO06>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO06','$CANPRO06','$fechaReserva'),";
	}

	if ($CANPRO07>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO07','$CANPRO07','$fechaReserva'),";
	}

	if ($CANPRO08>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO08','$CANPRO08','$fechaReserva'),";
	}

	if ($CANPRO09>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO09','$CANPRO09','$fechaReserva'),";
	}

	if ($CANPRO10>0) {
		$cadena = $cadena . "('$numReserva','$CODPRO10','$CANPRO10','$fechaReserva'),";
	}
	
	$consulta = substr($cadena, 0,-1);
//registra los datos de la cabecera de factura
	$sql0 = "INSERT INTO reserva (id_reserva,fecha,id_cliente) VALUES ('$numReserva','$fechaReserva','$idCliente')";
	$insertar0 = mysqli_query($conexion, $sql0);

//registra los datos del detalle de la factura
// 1
	$sql1 = "INSERT INTO DetalleReserva (Id_reserva,Id_producto,Cant_reservada,fechaReserva) VALUES ". $consulta ;
	$insertar1 = mysqli_query($conexion, $sql1);
?>	