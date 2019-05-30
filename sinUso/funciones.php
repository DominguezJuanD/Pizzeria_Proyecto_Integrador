<script type="text/javascript">
	var $arrayProductosJS = eval (<?php echo $objJson;?>);
	var $arrayClientesJS = eval (<?php echo $objJsonClientes;?>);
	var $numeroFacturaA = eval (<?php echo $objJsonUltFactA;?>);
	var $numeroFacturaB = eval (<?php echo $objJsonUltFactB;?>);
	
	function buscarDescripcion($producto,$num){
		for (var i = 0; i < $arrayProductosJS.length; i++) {
			if($producto == $arrayProductosJS[i][0]){
				document.getElementById("DETPRO".concat($num)).value = $arrayProductosJS[i][1];
				document.getElementById("PREPRO".concat($num)).value = $arrayProductosJS[i][2]
			}
		}
	}

	function calcularPrecio($num2){
		document.getElementById('IMPPRO'.concat($num2)).value = (document.getElementById('CANPRO'.concat($num2)).value * document.getElementById('PREPRO'.concat($num2)).value) * (1-(document.getElementById('BONPRO'.concat($num2)).value/100));
	}
	function calcularTotal(){
		$total = (document.getElementById('IMPPRO01').value*1) + 
				(document.getElementById('IMPPRO02').value*1) + 
				(document.getElementById('IMPPRO03').value*1) +
				(document.getElementById('IMPPRO04').value*1) +	
				(document.getElementById('IMPPRO05').value*1) +	
				(document.getElementById('IMPPRO06').value*1) +
				(document.getElementById('IMPPRO07').value*1) +	
				(document.getElementById('IMPPRO08').value*1) +	
				(document.getElementById('IMPPRO09').value*1) +
				(document.getElementById('IMPPRO10').value*1);
		calcularIVA($total);
	}
	function calcularIVA($total){
		if (document.getElementById('TIPOFACT').value.toUpperCase() == 'A'){
			document.getElementById('SUBTOTAL').value = $total;
			document.getElementById('IVA21').value = ($total *0.21);
			document.getElementById('TOTAL').value = parseFloat($total) + ($total *0.21);
		}
		if (document.getElementById('TIPOFACT').value.toUpperCase() == 'B'){
			document.getElementById('SUBTOTAL').value = $total*1.21;
			document.getElementById('IVA21').value = 0;
			document.getElementById('TOTAL').value = parseFloat($total) + ($total *0.21);
		}
	}
	function buscarCliente(){
		for (var i = 0; i < $arrayClientesJS.length; i++) {
			if((document.getElementById('idCliente').value) == ($arrayClientesJS[i][4])){
				document.getElementById('nombCliente').value = $arrayClientesJS[i][1];
				document.getElementById('domicCliente').value = $arrayClientesJS[i][3];
				document.getElementById('telCliente').value = $arrayClientesJS[i][0];
			}
		}	
	}

	function numeroFactura(){
		var $fec = new Date();
		if (document.getElementById('TIPOFACT').value.toUpperCase() == 'A'){
			document.getElementById('numFact').value = $numeroFacturaA;
			document.getElementById('serieFact').value = "1";
			document.getElementById('fechaFact').value = $fec.getDate() + "/" + ($fec.getMonth() +1) + "/" + $fec.getFullYear();
		}
		if (document.getElementById('TIPOFACT').value.toUpperCase() == 'B'){
			document.getElementById('numFact').value = $numeroFacturaB;
			document.getElementById('serieFact').value = "1";
			document.getElementById('fechaFact').value = $fec.getDate() + "/" + ($fec.getMonth() +1) + "/" + $fec.getFullYear();
		}
	}

	function controlarVacio(){
		alert("entro")
		if (document.getElementById($cod).value > 0){
			alert("anda")
		}else{
			document.getElementById($cod).value
		}
	}

</script>