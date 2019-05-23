$(buscar_datos());

function buscar_datos(consulta){
	console.log(consulta);
	$.ajax({
		url: '../php/insumos/buscar_insumos.php',
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

$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if(valor !=""){
		buscar_datos(valor);
	} else{
		buscar_datos();
	}
});

// funciones para agregar nuevo insumos

$(document).ready(function(){
	$('#ProForm').submit(function(){
//	$('#resultado').text("funciona");
//	var datos = $('#CliForm').serialeze();
	var udm = $("#udm").val();
	var descripcion = $("#descripcion").val();
	var precio = $("#precio").val();
	// alert("hola")

	$.ajax({
		type : "POST",
		url : '../php/altasCliente_Proveedor.php',
		data : {udm:udm, descripcion:descripcion, precio:precio, modo: '4'},
		//cache : false,
		success: function(data){
			$('#resultado').html(data);
		}
		});
	});
 });
	// var produ = 'holaaa';
	// var mensaje = "<h1 style='color:#19C357'> Receta del producto : "+produ+"</h1>";
	//
	// $('#mensaje').html(mensaje);
