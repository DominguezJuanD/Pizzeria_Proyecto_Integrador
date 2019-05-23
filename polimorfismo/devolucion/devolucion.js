function buscarCliente(){
	for (var i = 0; i < $arrayClientesJS.length; i++) {
		if((document.getElementById('idcliente').value) == ($arrayClientesJS[i][0])){
			document.getElementById('nombre').value = $arrayClientesJS[i][1];
		}
	}	
}
function buscarIdCliente($nombCliente){	
	for (var i = 0; i < $arrayClientesJS.length; i++) {
		if((document.getElementById($nombCliente).value).trim() == ($arrayClientesJS[i][1]).trim()){
			document.getElementById('idcliente').value = $arrayClientesJS[i][0]
		}
	}
}

function nombre($nombre){
	if ($nombre == 1) {
		$nombre = "vaso";
	}
}



$(document).ready(function(){
	$('#buscar').click(function(){
	$('#datos').text("Comprobando...");
	var idCliente = $("#idcliente").val();


	$.ajax({
		type : "POST",
		url : '/polimorfismo/devolucion/devolucion_proceso.php',
		dataType: "html",
		data : {idCliente:idCliente},
		cache : false,
		success: function(data){
			$('#datos').html(data);
		}
	});
	return false;
	});
});

$(document).ready(function(){
	$('#formulario').submit(function(){
	$('#datos2').text("funciona");
//	var datos = $('#CliForm').serialeze();
	var id_cliente = $("#id_cliente").val();
	var id_reserva = $("#id_reserva").val();
	var id_producto = $("#id_producto").val();
	var can_devuelta= $("#can_devuelta").val();
	// var nombre = $("#nombre").val();
	// var fe_na = $("#fe_na").val();
	// var direccion = $("#direccion").val();
	

	$.ajax({
		type : "POST",
		url : '/polimorfismo/devolucion/guardardevolucion.php',
		data : {id_cliente:id_cliente,id_reserva:id_reserva,id_producto:id_producto, can_devuelta:can_devuelta},
		cache : false,
		success: function(data){
			$('#datos2').html(data);
		}
	});
	return false;
	});
});