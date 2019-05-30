// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

$(document).ready(function(){
	formSubmit()
})

function formSubmit(){
	
	$('#GRABAR').click(function(e){
		e.preventDefault()
		var TIPOFACT  = $('#TIPOFACT').val()
		var serieFact = $('#serieFact').val()
		var numFact   = $('#numFact').val()
		var fechaFact = $('#fechaFact').val()
		var IdCliente = $('#idCliente').val()
		var FormaPago = $('#formaPago').val()
		var SUBTOTAL  = $('#SUBTOTAL').val()		
		var IVA21     = $('#IVA21').val()
		var TOTAL     = $('#TOTAL').val()

		var CODPRO01  = $('#CODPRO01').val()
		var CANPRO01  = $('#CANPRO01').val()
		var PREPRO01  = $('#PREPRO01').val()
		var BONPRO01  = $('#BONPRO01').val()
		var IMPPRO01  = $('#IMPPRO01').val()

		var CODPRO02  = $('#CODPRO02').val()
		var CANPRO02  = $('#CANPRO02').val()
		var PREPRO02  = $('#PREPRO02').val()
		var BONPRO02  = $('#BONPRO02').val()
		var IMPPRO02  = $('#IMPPRO02').val()

		var CODPRO03  = $('#CODPRO03').val()
		var CANPRO03  = $('#CANPRO03').val()
		var PREPRO03  = $('#PREPRO03').val()
		var BONPRO03  = $('#BONPRO03').val()
		var IMPPRO03  = $('#IMPPRO03').val()

		var CODPRO04  = $('#CODPRO04').val()
		var CANPRO04  = $('#CANPRO04').val()
		var PREPRO04  = $('#PREPRO04').val()
		var BONPRO04  = $('#BONPRO04').val()
		var IMPPRO04  = $('#IMPPRO04').val()

		var CODPRO05  = $('#CODPRO05').val()
		var CANPRO05  = $('#CANPRO05').val()
		var PREPRO05  = $('#PREPRO05').val()
		var BONPRO05  = $('#BONPRO05').val()
		var IMPPRO05  = $('#IMPPRO05').val()

		var CODPRO06  = $('#CODPRO06').val()
		var CANPRO06  = $('#CANPRO06').val()
		var PREPRO06  = $('#PREPRO06').val()
		var BONPRO06  = $('#BONPRO06').val()
		var IMPPRO06  = $('#IMPPRO06').val()

		var CODPRO07  = $('#CODPRO07').val()
		var CANPRO07  = $('#CANPRO07').val()
		var PREPRO07  = $('#PREPRO07').val()
		var BONPRO07  = $('#BONPRO07').val()
		var IMPPRO07  = $('#IMPPRO07').val()

		var CODPRO08  = $('#CODPRO08').val()
		var CANPRO08  = $('#CANPRO08').val()
		var PREPRO08  = $('#PREPRO08').val()
		var BONPRO08  = $('#BONPRO08').val()
		var IMPPRO08  = $('#IMPPRO08').val()

		var CODPRO09  = $('#CODPRO09').val()
		var CANPRO09  = $('#CANPRO09').val()
		var PREPRO09  = $('#PREPRO09').val()
		var BONPRO09  = $('#BONPRO09').val()
		var IMPPRO09  = $('#IMPPRO09').val()

		var CODPRO10  = $('#CODPRO10').val()
		var CANPRO10  = $('#CANPRO10').val()
		var PREPRO10  = $('#PREPRO10').val()
		var BONPRO10  = $('#BONPRO10').val()
		var IMPPRO10  = $('#IMPPRO10').val()
		var data = {TIPOFACT:TIPOFACT, serieFact:serieFact, numFact:numFact, fechaFact:fechaFact, IdCliente:IdCliente, FormaPago:FormaPago, SUBTOTAL:SUBTOTAL, IVA21:IVA21, TOTAL:TOTAL, CODPRO01:CODPRO01, CANPRO01:CANPRO01, PREPRO01:PREPRO01, BONPRO01:BONPRO01, IMPPRO01:IMPPRO01,	CODPRO02:CODPRO02, CANPRO02:CANPRO02, PREPRO02:PREPRO02, BONPRO02:BONPRO02, IMPPRO02:IMPPRO02, CODPRO03:CODPRO03, CANPRO03:CANPRO03, PREPRO03:PREPRO03, BONPRO03:BONPRO03, IMPPRO03:IMPPRO03, CODPRO04:CODPRO04, CANPRO04:CANPRO04, PREPRO04:PREPRO04, BONPRO04:BONPRO04, IMPPRO04:IMPPRO04, CODPRO05:CODPRO05, CANPRO05:CANPRO05, PREPRO05:PREPRO05, BONPRO05:BONPRO05, IMPPRO05:IMPPRO05,	CODPRO06:CODPRO06, CANPRO06:CANPRO06, PREPRO06:PREPRO06, BONPRO06:BONPRO06, IMPPRO06:IMPPRO06, CODPRO07:CODPRO07, CANPRO07:CANPRO07, PREPRO07:PREPRO07, BONPRO07:BONPRO07, IMPPRO07:IMPPRO07, CODPRO08:CODPRO08, CANPRO08:CANPRO08, PREPRO08:PREPRO08, BONPRO08:BONPRO08, IMPPRO08:IMPPRO08, CODPRO09:CODPRO09, CANPRO09:CANPRO09, PREPRO09:PREPRO09, BONPRO09:BONPRO09, IMPPRO09:IMPPRO09, CODPRO10:CODPRO10, CANPRO10:CANPRO10, PREPRO10:PREPRO10, BONPRO10:BONPRO10, IMPPRO10:IMPPRO10}
		
		if (confirm("¿Confirma la venta?")==true){
			recarga();
			$.ajax({
				url: 'regFact.php', 
				data: data, 
				type: 'POST',
				beforeSend: function(){
					console.log('Enviando Datos...')
				},
				success: function(resp){
					console.log('resp')
				}
			})
		}else{
			alert("Venta cancelada por el usuario")
		}
	})
}

function recarga(){
	location.href=location.href
}

