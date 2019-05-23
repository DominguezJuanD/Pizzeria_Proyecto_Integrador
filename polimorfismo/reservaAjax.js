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
		var numReserva  = $('#numReserva').val()
		var fechaReserva = $('#fechaReserva').val()
		var idCliente   = $('#idCliente').val()

		var CODPRO01  = $('#CODPRO01').val()
		var CANPRO01  = $('#CANPRO01').val()

		var CODPRO02  = $('#CODPRO02').val()
		var CANPRO02  = $('#CANPRO02').val()

		var CODPRO03  = $('#CODPRO03').val()
		var CANPRO03  = $('#CANPRO03').val()

		var CODPRO04  = $('#CODPRO04').val()
		var CANPRO04  = $('#CANPRO04').val()

		var CODPRO05  = $('#CODPRO05').val()
		var CANPRO05  = $('#CANPRO05').val()

		var CODPRO06  = $('#CODPRO06').val()
		var CANPRO06  = $('#CANPRO06').val()

		var CODPRO07  = $('#CODPRO07').val()
		var CANPRO07  = $('#CANPRO07').val()

		var CODPRO08  = $('#CODPRO08').val()
		var CANPRO08  = $('#CANPRO08').val()

		var CODPRO09  = $('#CODPRO09').val()
		var CANPRO09  = $('#CANPRO09').val()

		var CODPRO10  = $('#CODPRO10').val()
		var CANPRO10  = $('#CANPRO10').val()

		var data = {numReserva:numReserva, fechaReserva:fechaReserva, idCliente:idCliente, CODPRO01:CODPRO01, CANPRO01:CANPRO01, CODPRO02:CODPRO02, CANPRO02:CANPRO02, CODPRO03:CODPRO03, CANPRO03:CANPRO03, CODPRO04:CODPRO04, CANPRO04:CANPRO04, CODPRO05:CODPRO05, CANPRO05:CANPRO05, CODPRO06:CODPRO06, CANPRO06:CANPRO06, CODPRO07:CODPRO07, CANPRO07:CANPRO07, CODPRO08:CODPRO08, CANPRO08:CANPRO08, CODPRO09:CODPRO09, CANPRO09:CANPRO09, CODPRO10:CODPRO10, CANPRO10:CANPRO10}		
		if (confirm("¿Confirma la Reserva?")==true){
			$.ajax({
				url: 'regReserva.php', 
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
			alert("Reserva cancelada por el usuario")
		}
	})
}