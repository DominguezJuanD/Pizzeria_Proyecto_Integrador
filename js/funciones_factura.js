//variables JS//
var total =0;
var totalneto=0;
var precioTotal =0;
var iva = 0;
var id_tipo = 0;
var sumaArray = [];
var sumaPrecios = [];
var tabla_id = [];
var tabla_cant = [];
var num_id = [];
var arrayprueba = [];
var  id_fila;
var NumeroFactura;
//__________________//




function limpiar()
{
	$("#formulario [type='text']").val("");//limpiar formulario (todos los  type="text")
	$("#formulario [type='number']").val(0);//loimpiar select de los formulario
	$("#formulario [name='provedor']").val(0);
	$("#formulario [name='tipofactura']").val(0);
	$("#formulario [name='formapago']").val(0);
	$("#id_prod").val(0);
}

function ingreso_dinero(){
	var dinero = $('#dinero').val();
	var observacion = $('#observacion').val();
	var fecha = $('#fecha').val();
	if (dinero>0){
		$.ajax({
			url:'/php/consultas.php',
			type:'POST',
			data: 'dinero='+dinero+'&observacion='+observacion+'&fecha='+fecha+'&Boton=ingreso_dinero'
		}).done(function(data){
			alert(data);
			limpiar();
		})
	}else {
		alert("ingreso es cero");
	}
}
function extraer_dinero()
{
	var dinero = $('#dinero').val();
	var observacion = $('#observacion').val();
	var fecha = $('#fecha').val();
	if (dinero>0){
		$.ajax({
			url:'/php/consultas.php',
			type:'POST',
			data: 'dinero='+dinero+'&observacion='+observacion+'&fecha='+fecha+'&Boton=egreso_dinero'
		}).done(function(data){
			alert(data);
			limpiar();
		})
	}else {
		alert("ingreso es cero");
	}
}

//=================================================== Busqueda de factura ==================================================================================

function buscarFacturas(){
	var formBusqueda = $('#formBusqueda').serialize();

	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=buscarFacturas&'+formBusqueda,
		dataType: 'json',
	}).done(function(resp){
		console.log(resp.tabla);
		$('#listas').html(resp.tabla);
		// $('#totalneto').val(resp.totalneto);
		// $('#iva').val(resp.iva);
		// $('#total').val(resp.total);
		//
		// $('#totalnetoC').val(resp.totalnetoC);
		// $('#totalC').val(resp.totalC);
	});
}




//===================================funciones para factura Venta========================

$('#clientes').change(function(){// esto rellena todos los campos de cliente
	 var id_cliente = $('#clientes').val();
	 var direccion =  $('#clientes').find('option:selected').attr('direc');
	 var telefono = $('#clientes').find('option:selected').attr('tel');

	$('#id_cliente').val(id_cliente);
	$('#direccion').val(direccion);
	$('#telefono').val(telefono);

});

$('#tipo_factura').change(function(){
	if ($('#tipo_factura').val() == 'A') {
		$('#triva').show();
	}else{
		$('#triva').hide();
		$('#ivaC').val(0);
	}
});

function agregar_producto(tipo) {// esto agrega los productos a la tabla dinamica//tipo = (1-venta 2-compra)
		id_tipo = tipo;
		var id_prod = $('#id_prod').val();
		var iva = $('#ivaC').val();
		if (tipo == 1) {
			var precio = $('#id_prod').find('option:selected').attr('value2');
		}else {
			var precio = $('#precio').val();
		}
		// var des_pro = $('#id_prod option:selected').text();
		var cantidad = $('#Cantidad').val();
		// $('#productos').load(' #productos');
		if (id_prod>0 && cantidad>0){
			var data_form = $("#formulario").serialize();
			console.log("and");
			$.ajax({
				url:'../php/consultas.php',
				type:'POST',
				data: 'Boton=facturaNovedad&'+data_form+'&cant='+cantidad+'&idProducto='+id_prod+'&tipoCompraVenta='+tipo+'&preUnitario='+precio+'&iva='+iva+'&option=1',
				dataType: 'json',
			}).done(function(resp){
				$('#productos').html(resp.tabla);
				$('#totalneto').val(resp.totalneto);
				$('#total').val(resp.total);
				$('#iva').val(resp.iva);

				$('#ivaC').val(resp.ivaC);
				$('#totalnetoC').val(resp.totalnetoC);
				$('#totalC').val(resp.totalC);
				// console.log(resp.tabla_cant);
				// console.log(resp.tabla_id);
			});
		}else {
			alert("Ingrese un insumo o valor");
		}
}

function eliminarFila(nfila){
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=facturaNovedad&nfila='+nfila+'&option=0&tipoCompraVenta='+id_tipo,
		dataType: 'json',
	}).done(function(resp){
		$('#productos').html(resp.tabla);
		$('#totalneto').val(resp.totalneto);
		$('#iva').val(resp.iva);
		$('#total').val(resp.total);

		$('#totalnetoC').val(resp.totalnetoC);
		$('#totalC').val(resp.totalC);
	});
}


function factura_venta_producto(tipo){//tipo = (1-venta 2-compra)

	var statusConfirm = confirm("¿Son Correctos los datos Ingresados?");
	console.log(tabla_cant);
	console.log(tipo);
	if (statusConfirm == true){
		var data_form = $("#formulario").serialize()
		console.log(data_form)
		$.ajax({
			url:'../php/consultas.php',
			type:'POST',
			data: 'Boton=factura_venta_producto&'+data_form+'&tipoCompraVenta='+tipo,
			dataType: 'json',
		}).done(function(resp){
			console.log(resp);
			if(resp > 0){
				alert("ok");
				location.href='nuevaVenta.php';
			}else {
				if(resp == 0){
					alert("debe rellenar los cambos");

				};
			};
		});
	};
}

//================================funciones para factura compra==================

function factura_compra_insumo(tipo){//tipo = (1-venta 2-compra)

	var statusConfirm = confirm("¿Son Correctos los datos Ingresados?");
	if (statusConfirm == true){
		var data_form = $("#formulario").serialize()
		console.log(data_form)
		console.log(tipo);
		$.ajax({
			url:'../php/consultas.php',
			type:'POST',
			data: 'Boton=factura_compra_insumo&'+data_form+'&tipoCompraVenta='+tipo,
			dataType: 'json',
		}).done(function(resp){
			console.log(resp);
			if(resp > 0){
				alert("ok");
				location.href='compra_insumo.php';
			}else {
				if(resp == 0){
					alert("debe rellenar los cambos");
				};
			};
		});
	};
}












// _______________________factura compra__________________________

// function mostrar()
// {
// 		var num = $('#Buscar').val();
// 		alert(num);

	// $.ajax({
	//   url:'/php/consultas.php',
	//   type:'POST',
	//   data: 'num='+num+"&Boton=factura_ya"
	// }).done(function(resp){
	//   if(resp){
	//     data = eval(resp);
	//     var listado = "";
	//     listado += '<tr>'
	//     listado += '<td  style="width:50%" valign="top">EMPRESA: '
	//     listado += '<br>'
	//     listado += '<p align="center"> Pizeria Lo Vago SA</p>'
	//     listado += '</td>'
	//     listado += '<td style="width:50%">TIPO FACTURA: '+data[0].tipo+' <br>'
	//     listado += 'NUMERO: '+data[0].numero+' <br> FECHA: '+data[0].fecha+' <br> CUIT: MICUIT  <br>'
	//     listado += '</td>'
	//     listado += '</tr>'
	//     $("#numero1").html( listado );
	//     var listado = "";
	//     listado += '<br>NOMBRE CLIENTE: '+data[0].nombre_persona+'  </b>'
	//     listado += '<br>domicilio: '+data[0].direccion+'  '
	//     listado += '<br>LUGAR de EMISION: '+data[0].direccion_emision+' '
	//     $("#numero2").html(listado);
	//     var listado = "";
	//     listado += '<br>'
	//     listado += 'CUIT/CUIL: <br> '+data[0].cuit+' '
	//     $("#numero3").html(listado);
	//     var listado = "";
	//     listado += '<br>'
	//     listado += 'Forma de pago: <br> '+data[0].forma_pago+' '
	//     $("#numero4").html(listado);
	//     mostrar_detalle();
	//   }else{
	//     alert("Factura No Existente");
	//   }
	// });
// }
// function mostrar_detalle()
// {
//   var num = $('#num').val();
//
//   $.ajax({
//   type: "POST",
//   url: 'php/cl_abm.php',
//   data: 'num='+num+"&boton=detalle_factura_ya"
//   }).done(function(resp){
//     datos = eval(resp);
//     var subtotal = 0;
//     var listado = "";
//     for(var i=0;i<datos.length;i++){
//       var bgcolor = (i%2==0) ? "#FFFFFF":"#EDEDED";
//       listado += '	<tr bgcolor="'+bgcolor+'">'
//       listado += ' 		<td style="width:50%">'+datos[i]["NombreProducto"]+'</td>'
//       listado += ' 		<td style="width:20%">'+datos[i]["Cantidad"]+'</td>'
//       listado += ' 		<td style="width:20%">$'+datos[i]["Precio"]+'</td>'
//       listado += ' 		<td style="width:10%">$'+(datos[i]["Precio"]*datos[i]["Cantidad"]).toFixed(2)+'</td>'
//       listado += '	</tr>'
//       subtotal += datos[i]["Precio"]*datos[i]["Cantidad"];
//     }
//     $("#numero5").html(listado);
//     iva = subtotal*(datos[0]["Iva"]);
//     total = (iva + subtotal)-(datos[0]["Descuento"]);
//     var lista = "";
//     lista += ' $'+subtotal.toFixed(2)+''
//     lista += ' <br> $'+datos[0]["Descuento"]+' '
//     lista += '<br> $'+iva.toFixed(2)+''
//     $("#numero6").html(lista);
//
//     var lista = "";
//     lista += 'TOTAL'
//     lista += '<br>'
//     lista += '<p align="center"> $'+total.toFixed(2)+'</p>'
//     $("#numero7").html(lista);
//   });
// }
