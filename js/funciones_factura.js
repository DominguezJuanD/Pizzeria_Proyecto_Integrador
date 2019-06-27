//variables JS//
var precioTotal =0;
var iva = 0;
var id_tipo = 0;
var sumaArray = [];
var sumaPrecios = [];
var cant = 140;
var tipo=0;
var num_id = [];
// var iva = TRUE;
var  id_fila;
var NumeroFactura;
//__________________//




function limpiar(){
	$("#formulario [type='text']").val("");//limpiar formulario (todos los  type="text")
	$("#formulario [type='number']").val(0);//loimpiar select de los formulario
	$("#formulario [name='provedor']").val(0);
	$("#formulario [name='tipofactura']").val(0);
	$("#formulario [name='formapago']").val(0);
	$("#observacion").val("");
	$("#dinero").val(0);
	// console.log("asdasd");
	$("#id_prod").val(0);
}

function ingreso_dinero(){
	var dinero = $('#dinero').val();
	var justificar = $('#observacion').val();
	// var fecha = $('#fecha').val();
	console.log(dinero);
	console.log(justificar);
	if ($('#dinero').val() > 0){
		$.ajax({
			url:'../php/consultas.php',
			type:'POST',
			data: 'dinero='+dinero+'&justificar='+justificar+'&Boton=ingreso_dinero'
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
	var justificar = $('#observacion').val();
	// var fecha = $('#fecha').val();
	if ($('#dinero').val() > 0){
		$.ajax({
			url:'../php/consultas.php',
			type:'POST',
			data: 'dinero='+dinero+'&justificar='+justificar+'&Boton=egreso_dinero'
		}).done(function(data){
			alert(data);
			limpiar();
		})
	}else {
		alert("ingreso es cero");
	}
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
		// iva = TRUE;
	}else{
		// iva=FALSE;
		$('#triva').hide();
		$('#ivaC').val(0);
	}
});

$("#observacion").keyup(function descuento() {
	var cant1 = cant - $('#observacion').val().length;
if (cant1 >= 0) {
	$('#extraer').attr("disabled", false);
	$('#ingreso').attr("disabled", false);
	$('#cant').text(cant1 +"/140");
	$('#cant').css({"color":"black"});
}else {
	$('#extraer').attr("disabled", true);
	$('#ingreso').attr("disabled", true);
	$('#cant').css({"color":"red"});
}

});

// =======================================================================agrega los productos a las facturas ==============================
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
			alertify.error("Ingrese un insumo o valor");
		}
}


// ============================================================elimina filas en de las productos en las facturas ======================================
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

// ========================================facturas ventas =============================================================================

function factura_venta_producto(tipo){//tipo = (1-venta 2-compra)
 	if ($('#formapago').val() != 0) {
		if ($('#clientes').val() != 0) {
			var statusConfirm = confirm("¿Son Correctos los datos Ingresados?");
			// console.log(tabla_cant);
			console.log(tipo);
			if (statusConfirm == true){
				var data_form = $("#formulario").serialize()
				console.log(data_form)
				$.ajax({
					url:'../php/consultas.php',
					type:'POST',
					data: 'Boton=factura_venta_producto&'+data_form+'&tipoCompraVenta='+tipo,
				}).done(function(resp){
					console.log(resp);
					if(resp != 0){
						alert(" FC: "+resp);
						location.href='nuevaVenta.php';
					}else {
						alertify.error("Agregar almenos un Producto!!!");
					};
				});
			};
		}else {
			alertify.error("Elija un Cliente");
		}
 	}else {
 		alertify.error("Elija forma de pago");
 	}

}

//================================funciones para factura compra==================

function factura_compra_insumo(tipo){//tipo = (1-venta 2-compra)
	if ($('#formapago').val() != 0) {
		if ($('#provedor').val() != 0) {
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
								alertify.error("Agregar almenos un Producto!!!");
							};
						};
					});
				};
			}else {
				alertify.error("Elija un Cliente");
			}
		}else {
			alertify.error("Elija forma de pago");
		}
}

//=================================================== Busqueda de factura por numero ==================================================================================

function buscarFacturas(){
	var formBusqueda = $('#formBusqueda').serialize();
	console.log(formBusqueda);
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=buscarFacturas&'+formBusqueda,
		dataType: 'json',
	}).done(function(resp){
		// console.log(resp.puntoVenta);
		$('#listas').html(resp.tabla);
		// $('#totalneto').val(resp.totalneto);
		// $('#iva').val(resp.iva);
		// $('#total').val(resp.total);
		//
		// $('#totalnetoC').val(resp.totalnetoC);
		// $('#totalC').val(resp.totalC);
	});
}


// =========================================================detalle de facturas =====================================
function detalleFactura(id,tipo){
	console.log(tipo);
 console.log(id);
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=detalleFactura&id='+id+'&tipo='+tipo,
		dataType: 'json',
	}).done(function(resp){

		// console.log(resp.cosas);

		$('#productos').html(resp.tabla);
		var titulo = "Factura Tipo "+resp.tipComprob+" : "+ponerCeros(resp.puntoVenta,4)+"-"+ponerCeros(resp.numComprob,8);
		$('#titulo').text(titulo);
		console.log(resp.idFactura);
		$('#fecha').val(resp.fecha);
		$('#usuario').val(resp.usuario_carga);
		$('#atendio').val(resp.atendio);
		$('#facturaTipo').val(resp.tipComprob);
	 	$('#cliente').val(resp.nombre);
		$('#id_cliente').val(resp.idCliente);
		$('#direccion').val(resp.direccion);
		$('#telefono').val(resp.telefono);
		$('#formaPago').val(resp.descFormapago);
		$('#Descuento').val(resp.bonificacion);
		$('#totalneto').val(resp.subtotal);
		$('#iva').val(resp.iva);
		$('#total').val(resp.total);
	});
}

// =======================================================esta gilada rellena de ceros==================
function ponerCeros(obj, lon) {
  while (obj.length < lon)
    obj = '0'+obj;
		return obj;
}


// ==========================================factura desde hasta =========================================

$('#tipofactura2').change(function(){
	$('#saldo').html(0);
	$('#listasSola').html("");
	$('#listas').html("");
	$('#listas1').html("");

	if ($('#tipofactura2').val() == '0') {
		$("#tabla_sola").hide();
		$("#tabla_doble").show();
	}else {
		if ($('#tipofactura2').val() =='1') {
			$('#tituloFactura').text("Fac. Venta");
		}else{
			$('#tituloFactura').text("Fac. Compra");
		}
		$("#tabla_sola").show();
		$("#tabla_doble").hide();
	}
});



function desdeHasta(){

	var formBusqueda = $('#formBusqueda').serialize();
	// console.log(formBusqueda);
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=desdeHasta&'+formBusqueda,
		dataType: 'json',
	}).done(function(resp){

		// console.log(resp.tabla);
		$("#saldo").text(resp.saldoAnterior);
		$('#saldoTotal').text(resp.saldoTotal);
		if (resp.tipo == "0") {
			$("#tabla_doble").show();
			if (resp.tabla || resp.tabla2) {
				$('#listas').html(resp.tabla);
				$('#listas1').html(resp.tabla2);
			}else {
				alertify.error("No se Encontraron Faturas");
			}

		}else if (resp.tipo == "1") {
			$("#tabla_sola").show();
			if (resp.tabla) {
				$('#listasSola').html(resp.tabla);
			}else {
				alertify.error("No se Encontraron Faturas");
			}
		}else {
			$("#tabla_sola").show();

			if (resp.tabla) {
					$('#listasSola').html(resp.tabla);
			}else {
				alertify.error("No se Encontraron Faturas");
			}

		}
	});
}

// ===============================================================caja desde hasta =======================================================

function desdeHastaCaja(){
	var formBusqueda = $("#formBusqueda").serialize();
	console.log(formBusqueda);


	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=caja_desde_hasta&'+formBusqueda,
		dataType: 'json',
	}).done(function(resp){
			console.log(resp.tabla);
			$('#listas').html(resp.tabla);
			$('#listas1').html(resp.tabla1);
	});



}



// ============================================================== facturas cliente proctos ================================================

function clienteProveedor(){
	var formBusqueda = $('#formBusqueda').serialize();
	// console.log(formBusqueda);
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=clienteProducto&'+formBusqueda,
		dataType: 'json',
	}).done(function(resp){
		if (resp.tabla == null) {
			alertify.error("No se Encontraron Faturas");
			$('#listasSola').html("");
		}else{
				// console.log(resp.saldoAnterior);
				// console.log(resp.tabla);
					$('#listasSola').html(resp.tabla);
					$('#saldo').text(resp.saldoAnterior);
				}
	});

}
// =================================================================carga los select con datos de la bd=========================================
function cargaSelect(){
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=cargaClienteProducto&',
		dataType: 'json',
	}).done(function(resp){

		// console.log(resp);
		$(resp.clientes).each(function(key, registro) {
			$("#cliente").append('<option value="'+registro.id_persona+'">'+registro.nombre+'</option>');
		});
		$(resp.productos).each(function(key, registro) {
			$("#producto").append('<option value="'+registro.id_producto+'">'+registro.descripcion+'</option>');
		});
	});

}


// =========================================================== control de la fecha en las busquedas ====================================
$('#desde').change(function(){
	if ($('#desde').val() > $('#hasta').val()) {
		$('#buscar').attr("disabled", true);
		alertify.error("ERORR!! fecha DESDE no puede ser mayor a fecha HASTA");
	}else{
		$('#buscar').attr("disabled", false);
	}
});
$('#hasta').change(function(){
	// console.log($('#hasta').val());
	// console.log($('#ffecha').val());
	if ($('#hasta').val() < $('#desde').val()) {
		$('#buscar').attr("disabled", true);
		alertify.error("ERORR!! fecha HASTA no puede ser menor a fecha DESDE");
	}else if ($('#hasta').val() > $('#ffecha').val()){
		$('#buscar').attr("disabled", true);
		alertify.error("ERORR!! fecha HASTA no puede ser mayor a HOY");
	}else {
		$('#buscar').attr("disabled", false);
	}

});

// =============================================================================borra la tabla novedad ====================================
function borrar(tipo){
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=borrar&tipoCompraVenta='+tipo
	}).done(function(data){
		console.log(data);
	})
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
