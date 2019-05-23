$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: '/factura/lista_factura.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta : consulta},
	})
	.done(function(respuesta) {
		$("#datos").html(respuesta);
	}) 
	.fail(function(){
		console.long("error")
	})
};

$(document).on('keyup','#buscar', function(){
	var valor = $(this).val();
	if(valor !=""){
		buscar_datos(valor);
	} else{
		buscar_datos();
	}
});
