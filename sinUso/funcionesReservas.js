function buscarCliente(){
	for (var i = 0; i < $arrayClientesJS.length; i++) {
		if((document.getElementById('idCliente').value) == ($arrayClientesJS[i][0])){
			document.getElementById('nombCliente').value = $arrayClientesJS[i][1];
			//document.getElementById('domicCliente').value = $arrayClientesJS[i][3];
			//document.getElementById('telCliente').value = $arrayClientesJS[i][0];
		}
	}	
}


function buscarDescripcion($producto,$num){
	$encontro = 0
	for (var i = 0; i < $arrayProductosJS.length; i++) {
		if($producto == $arrayProductosJS[i][0]){
			document.getElementById("DETPRO".concat($num)).value = $arrayProductosJS[i][1];
			//document.getElementById("PREPRO".concat($num)).value = $arrayProductosJS[i][2]
			encontro = 1
		}
	}
	if ($encontro = 0){
		alert("Codigo no encontrado")
		document.getElementById("CODPRO".concat($num)).value = ""
	}
}


function buscarIdProducto($Codigo,$Descrip,$precio){
	for (var i = 0; i < $arrayProductosJS.length; i++) {
		if((document.getElementById($Descrip).value).trim() == ($arrayProductosJS[i][1]).trim())
		{
			document.getElementById($Codigo).value = $arrayProductosJS[i][0]
			document.getElementById($precio).value = $arrayProductosJS[i][2]
		}
	}
}
function buscarIdCliente($nombCliente){
	
	for (var i = 0; i < $arrayClientesJS.length; i++) {
		if((document.getElementById($nombCliente).value).trim() == ($arrayClientesJS[i][1]).trim())
		{
			document.getElementById('telCliente').value = $arrayClientesJS[i][0]
			document.getElementById('idCliente').value = $arrayClientesJS[i][4]
			document.getElementById('domicCliente').value = $arrayClientesJS[i][3]
		}
	}
}

