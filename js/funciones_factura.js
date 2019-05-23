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

function buscarCliente(){
	for (var i = 0; i < $arrayClientesJS.length; i++) {
		if((document.getElementById('idCliente').value) == ($arrayClientesJS[i][4])){
			document.getElementById('nombCliente').value = $arrayClientesJS[i][1];
			document.getElementById('domicCliente').value = $arrayClientesJS[i][3];
			document.getElementById('telCliente').value = $arrayClientesJS[i][0];
		}
	}
}

function numeroFactura(){
	var $fec = new Date();
	if (document.getElementById('TIPOFACT').value.toUpperCase() == 'A'){
		document.getElementById('numFact').value = $numeroFacturaA;
		document.getElementById('serieFact').value = "1";
		document.getElementById('fechaFact').value = $fec.getDate() + "/" + ($fec.getMonth() +1) + "/" + $fec.getFullYear();
	}
	if (document.getElementById('TIPOFACT').value.toUpperCase() == 'B'){
		document.getElementById('numFact').value = $numeroFacturaB;
		document.getElementById('serieFact').value = "1";
		document.getElementById('fechaFact').value = $fec.getDate() + "/" + ($fec.getMonth() +1) + "/" + $fec.getFullYear();
	}
}

function calcularIVA($total){
	if (document.getElementById('TIPOFACT').value.toUpperCase() == 'A'){
		document.getElementById('SUBTOTAL').value = $total;
		document.getElementById('IVA21').value = ($total *0.21);
		document.getElementById('TOTAL').value = parseFloat($total) + ($total *0.21);
	}
	if (document.getElementById('TIPOFACT').value.toUpperCase() == 'B'){
		document.getElementById('SUBTOTAL').value = $total*1.21;
		document.getElementById('IVA21').value = 0;
		document.getElementById('TOTAL').value = parseFloat($total) + ($total *0.21);
	}
}

function buscarDescripcion($producto,$num){
	$encontro = 0
	for (var i = 0; i < $arrayProductosJS.length; i++) {
		if($producto == $arrayProductosJS[i][0]){
			document.getElementById("DETPRO".concat($num)).value = $arrayProductosJS[i][1];
			document.getElementById("PREPRO".concat($num)).value = $arrayProductosJS[i][2]
			encontro = 1
		}
	}
	if ($encontro = 0){
		alert("Codigo no encontrado")
		document.getElementById("CODPRO".concat($num)).value = ""
	}
}

function calcularPrecio($num2){
	document.getElementById('IMPPRO'.concat($num2)).value = (document.getElementById('CANPRO'.concat($num2)).value * document.getElementById('PREPRO'.concat($num2)).value) * (1-(document.getElementById('BONPRO'.concat($num2)).value/100));
}

function calcularTotal(){
	$total = (document.getElementById('IMPPRO01').value*1) +
			(document.getElementById('IMPPRO02').value*1) +
			(document.getElementById('IMPPRO03').value*1) +
			(document.getElementById('IMPPRO04').value*1) +
			(document.getElementById('IMPPRO05').value*1) +
			(document.getElementById('IMPPRO06').value*1) +
			(document.getElementById('IMPPRO07').value*1) +
			(document.getElementById('IMPPRO08').value*1) +
			(document.getElementById('IMPPRO09').value*1) +
			(document.getElementById('IMPPRO10').value*1);
	calcularIVA($total);
}

function buscarIdProducto($Codigo,$Descrip,$precio){
	for (var i = 0; i < $arrayProductosJS.length; i++) {
		if((document.getElementById($Descrip).value).trim() == ($arrayProductosJS[i][1]).trim())
		{
			document.getElementById($Codigo).value = $arrayProductosJS[i][0]
			document.getElementById($precio).value = $arrayProductosJS[i][2]
		}
	}
}
function buscarIdCliente($nombCliente){

	for (var i = 0; i < $arrayClientesJS.length; i++) {
		if((document.getElementById($nombCliente).value).trim() == ($arrayClientesJS[i][1]).trim())
		{
			document.getElementById('telCliente').value = $arrayClientesJS[i][0]
			document.getElementById('idCliente').value = $arrayClientesJS[i][4]
			document.getElementById('domicCliente').value = $arrayClientesJS[i][3]
		}
	}
}

function buscarStock($num){
	$cantidad =	document.getElementById("CANPRO".concat($num)).value
	$codigo   = document.getElementById("CODPRO".concat($num)).value
	for (var i = 0; i < $stockProductos.length; i++) {
		if($codigo == $stockProductos[i][0]){
			if(($cantidad*1) > $stockProductos[i][1]) {
				alert("Stock insuficiente. Quedan " + $stockProductos[i][1] + " unidades de este producto")
				document.getElementById("CANPRO".concat($num)).value = ""
				document.getElementById("IMPPRO".concat($num)).value = ""
			}
		}
	}
}

function controlarVacio($num){
	if (document.getElementById("CODPRO".concat($num)).value > 0){
		calcularPrecio($num)
		calcularTotal($num)
		//buscarStock($num)
	}else{
		document.getElementById("CANPRO".concat($num)).value = 0
	}
}

function limpiar()
{
	$("#formulario [type='text']").val("");//limpiar formulario (todos los  type="text")
	$("#formulario [type='number']").val(0);//loimpiar select de los formulario
	$("#formulario [name='provedor']").val(0);
	$("#formulario [name='tipofactura']").val(0);
	$("#formulario [name='formapago']").val(0);
	$("#id_prod").val(0);
}
function ingreso_dinero()
{
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
//_______________________INSUMO_____________________________

//agrego productos a la tabla dinamica
// function agregar_insumo()
// {
// 		var id_prod = $('#id_prod').val();
//
// 		var Cantidad = $('#Cantidad').val();
// 		tabla_id[tabla_id.length] = id_prod;
// 		tabla_cant[tabla_cant.length] = Cantidad;
// 		if (id_prod>0 && Cantidad>0){
// 			$.ajax({
// 				url:'php/consultas.php',
// 				type:'POST',
// 				data: 'Cantidad='+Cantidad+'&id_prod='+id_prod+'&Boton=agregar_insumo'
// 			}).done(function(resp){
// 					var listado = "";
// 					data = eval(resp);
// 					var id_fila = "name"+num;
// 					listado += '<tr id="'+id_fila+'" bgcolor="white">'
// 					listado += '<td  name=$'+num+'  style="width:30%">'+data[0]["id_insumo"]+'</td>'
// 					listado += '<td  style="width:50%">'+data[0]["desc_insumo"]+'</td>'
// 					listado += '<td  name=$'+num+' style="width:10%">'+Cantidad+'</td>'
// 					listado += '<td style="width:10%"><input type="button" value="Eliminar" onclick="$('+id_fila+').remove();borrar('+num+');" /></td>'
// 					listado += '</tr>'
// 					$('#productos').append(listado);
// 					num +=1;
// 			});
// 		}else {
// 			alert("Ingrese un insumo o valor");
// 		}
//
// }
//================================funciones para factura compra==================
// function agregar_insumo(){
// 		var id_prod = $('#id_prod').val();
// 		var des_pro = $('#id_prod option:selected').text();
// 		var Cantidad = $('#Cantidad').val();
// 		tabla_id[tabla_id.length] = id_prod;
// 		tabla_cant[tabla_cant.length] = Cantidad;
// 		if (id_prod>0 && Cantidad>0){
// 					var listado = "";
// 					var id_fila = "name"+num;
// 					listado += '<tr id="'+id_fila+'" bgcolor="white">'
// 					listado += '<td  name=$'+num+'  style="width:30%">'+id_prod+'</td>'
// 					listado += '<td  style="width:50%">'+des_pro+'</td>'
// 					listado += '<td  name=$'+num+' style="width:10%">'+Cantidad+'</td>'
// 					listado += '<td style="width:10%"><input type="button" value="Eliminar" onclick="$('+id_fila+').remove();" /></td>'
// 					listado += '</tr>'
// 					$('#productos').append(listado);
// 					num +=1;
// 		}else {
// 			alert("Ingrese un insumo o valor");
// 		}
//
// }

function factura_compra_insumo()
{
	var statusConfirm = confirm("¿Son Correctos los datos Ingresados?");
	console.log(tabla_cant);
	if (statusConfirm == true){
		var data_form = $("#formulario").serialize()
		console.log(data_form)
		$.ajax({
			url:'../php/consultas.php',
			type:'POST',
			data: "Boton=factura_compra_insumo&"+data_form+'&tabla_cant='+tabla_cant+'&tabla_id='+tabla_id
		}).done(function(resp){
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
		$('#br').hide();
	}else{
		$('#triva').hide();
		$('#br').show();
	}
});

function agregar_producto(tipo) {// esto agrega los productos a la tabla dinamica
		id_tipo = tipo;
		var id_prod = $('#id_prod').val();
		var ivaC = $('#ivaC').val();
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
				data: 'Boton=facturaNovedad&'+data_form+'&cant='+cantidad+'&idProducto='+id_prod+'&tipoCompraVenta='+tipo+'&preUnitario='+precio+'&ivaC='+ivaC+'&option=1',
				dataType: 'json',
			}).done(function(resp){
				$('#productos').html(resp.tabla);
				$('#totalneto').val(resp.totalneto);
				$('#iva').val(resp.iva);
				$('#total').val(resp.total);
				$('#totalnetoC').val(resp.totalnetoC);
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
	});
}


function factura_venta_producto()
{
	var statusConfirm = confirm("¿Son Correctos los datos Ingresados?");
	console.log(tabla_cant);
	if (statusConfirm == true){
		var data_form = $("#formulario").serialize()
		console.log(data_form)
		$.ajax({
			url:'../php/consultas.php',
			type:'POST',
			data: 'Boton=factura_venta_producto&'+data_form,
		}).done(function(resp){
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
