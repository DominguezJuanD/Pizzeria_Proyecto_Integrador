<?php
	//$conexion = new mysqli ("mysql.hostinger.com.ar","u178713617_baloo","baloo12345","u178713617_piza");
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$conexion = new mysqli("localhost","root","12345678","baloopizza1");
	if (!($conexion)){
		$mjs= "Conexion no Exitosa";
	}else {
		$mjs= "Conectado!";
	}
	echo $msj;
?>
