$(buscar_datos());
// funcion que trae todo de la base de datos para listar
function buscar_datos(consulta){
	$.ajax({
		url: '../php/cliente/buscar_cliente.php',
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
}

// funcion para buscar por coincidencia de letras
$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if(valor !=""){
		buscar_datos(valor);
	} else{
		buscar_datos();
	}
});

//funciones para registrar los clientes

$(document).ready(function(){
	$('#CliForm').submit(function(){
//	$('#resultado').text("funciona");
//	var datos = $('#CliForm').serialeze();
	var telefono = $("#telefono").val();
	var nombre = $("#nombre").val();
	var fe_na = $("#fe_na").val();
	var direccion = $("#direccion").val();

	$.ajax({
		type : "POST",
		url : '../php/altasCliente_Proveedor.php',
		data : {telefono:telefono, nombre:nombre, fe_na:fe_na, direccion:direccion, modo: '1'},
		//cache : false,
		success: function(data){
			$('#resultado').html(data);
		}
	});
	return false;
	});
});
