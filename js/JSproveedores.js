$(buscar_datos());
// funcion para buscar los proveedores
function buscar_datos(consulta){
	console.log(consulta);
	$.ajax({
		url: '../php/proveedores/buscar_proveedores.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta : consulta},
	})
	.done(function(respuesta) {
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error")
	})
}

$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if(valor !=""){
		buscar_datos(valor);
	} else{
		buscar_datos();
	}
});


// funcion para dar el alta a un nuevo proveedor
function altaProveedor(){
	$('#resultado').text("funciona");
  var cuit = $('#cuit').val();
	var razon_social = $("#razon_social").val();
	var telefono = $('#telefono').val();
	var tipo = $("#tipo").val();
	var fe_in = $("#fe_in").val();
	var direccion =$("#direccion").val();

	$.ajax({
		type : "POST",
		url : '../php/altasCliente_Proveedor.php',
		data : {razon_social:razon_social, cuit:cuit ,telefono:telefono,direccion:direccion , tipo:tipo, fe_in:fe_in, modo: '2'},
		//cache : false,
		success: function(data){
			if (data) {
				alertify.success("CORRECTO!! El Proveedor Fue Registrado");
				limpiar();
				// $('#resultado').html(data);
			}else {
				alertify.error("Usuario no disponible.");
				limpiar();
				$('#resultado').html(data);
			}
		}
	});
}

function limpiar(){
	$("#ProForm [type='text']").val("");//limpiar formulario (todos los  type="text")
	$("#ProForm [type='number']").val(0);//loimpiar select de los formulario
	$("#ProForm [type='date']").val("");
}
