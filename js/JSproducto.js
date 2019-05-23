var idProduc=0;

$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: '../php/productos/buscar_productos.php',
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

// funciones para agregar nuevo productos

$(document).ready(function(){
	$('#ProForm').submit(function(){
//	$('#resultado').text("funciona");
//	var datos = $('#CliForm').serialeze();
	var codProducto = $("#codProducto").val();
	var descripcion = $("#descripcion").val();
	var precio = $("#precio").val();
	// alert("hola")

	$.ajax({
		type : "POST",
		url : '../php/altasCliente_Proveedor.php',
		data : {codProducto:codProducto, descripcion:descripcion, precio:precio, modo: '3'},
		//cache : false,
		success: function(data){
			$('#resultado').html(data);
		}
		});
	});
});

// funcion para agregar a la receta de los productos...........

function listar_insumos(id_prod){
	console.log(id_prod);
	idProduc = id_prod;
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=altaRecetas&idProducto='+id_prod+'&option=1',
		dataType: 'json',
	}).done(function(resp){
		$('#insumos').html(resp.tabla);
	});
}

function agregar_insumos() {// esto agrega los productos a la tabla dinamica
		var id_insumo = $('#id_insumo').val();
		var cantidad = $('#Cantidad').val();
		// $('#productos').load(' #productos');
		if (id_insumo>0 && cantidad>0){
			console.log("and");
			$.ajax({
				url:'../php/consultas.php',
				type:'POST',
				data: 'Boton=altaRecetas&cant='+cantidad+'&idProducto='+idProduc+'&id_insumo='+id_insumo+'&option=1',
				dataType: 'json',
			}).done(function(resp){
				$('#insumos').html(resp.tabla);
			});
		}else {
			alert("Ingrese un insumo o valor");
		}
}

function eliminarFila(nfila){
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=altaRecetas&nfila='+nfila+'&option=0',
		dataType: 'json',
	}).done(function(resp){
		$('#insumos').html(resp.tabla);
	});
}
