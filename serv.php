<?php  
	$arch = @fopen(rutaArchivos()."auttaller.txt", r);
	if ($arch){
		$linea = fgets($arch);
		$linea =desencriptar($linea);
		$matriz = explode("**", $linea);
	}
	function desencriptar($cadena){
		$nCrypto = 129;
		for ($x=0; $x < strlen($cadena); $x++) { 
			if (ord(substr($cadena,$x,1))<$nCrypto){
  				$cadena=substr($cadena,0,$x).chr($nCrypto-ord(substr($cadena,$x,1))).substr($cadena,$x+1);
 			}
		}
		return $cadena;
	}
	function rutaArchivos(){
		return "\\\\ruben-pc\\w\\vehiculos\\";
	}
?>