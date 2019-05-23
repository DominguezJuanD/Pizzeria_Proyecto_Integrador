//variables JS//
var num = 0;
var tabla_id = [];
var tabla_cant = [];
var tabla_precio = [];
var num_id = [];
var  id_fila;
var NumeroFactura;
//__________________//


function buscar_factura()
{
	var Num_Factura = $('#Num_Factura').val();
	var Tipo_Factura = $('#Tipo_Factura').val();
	var Num_Serie = $('#Num_Serie').val();
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Num_Serie='+Num_Serie+'&Tipo_Factura='+Tipo_Factura+'&Num_Factura='+Num_Factura+'&Boton=buscar_factura'
	}).done(function(data){
		if(data){
			datos = eval(data);
			var TipoFactura = "";
			var listado = "";
			//CABECERA FACTURA//
			if(datos[0]["tipComprob"] == "FA"){
				TipoFactura = "A";
			}
			if(datos[0]["tipComprob"] == "FB"){
				TipoFactura = "B";
			}
			if(datos[0]["tipComprob"] == "FC"){
				TipoFactura = "C";
			}
			alert(datos[0]["idCliente"]);
			listado += '   '+TipoFactura+'  '
			$("#TIPOFACT").html(listado);
			listado = "";
			listado += '   '+datos[0]["serieComprob"]+'  '
			$("#serieFact").html(listado);
			listado = "";
			listado += '   '+datos[0]["numComprob"]+'  '
			$("#numFact").html(listado);
			listado="";
			listado += '  '+datos[0]["fechaComprob"]+'  '
			$("#fechaFact").html(listado);
			listado="";
			listado +='  '+datos[0]["formaPago"]+' '
			$("#formaPago").html(listado);
			listado="";
			listado +='  '+datos[0]["idCliente"]+' '
			$("#idCliente").html(listado);
			listado="";
			listado +='  '+datos[0]["nombre"]+' '
			$("#nombCliente").html(listado);
			listado="";
			listado +='  '+datos[0]["direccion"]+' '
			$("#domicCliente").html(listado);
			listado="";
			listado +='  '+datos[0]["telefono"]+' '
			$("#telCliente").html(listado);
			listado="";
			//DETALLE PRODUCTOS//
			listado ="";
			for(var i=0;i<datos.length;i++){
				var bgcolor = (i%2==0) ? "#FFFFFF":"#EDEDED";
				listado += '	<tr bgcolor="'+bgcolor+'">'
				listado += ' 		<th style="border:thin solid" width=50  align="left">'+datos[i]["id_producto"]+'</th>'
				listado += ' 		<th style="border:thin solid" width=450 align="center">'+datos[i]["descripcion"]+'</th>'
				listado += ' 		<td style="border:thin solid" width=50  align="right">'+datos[i]["cantidad"]+'</th>'
				listado += ' 		<th style="border:thin solid" width=50  align="right">'+datos[i]["bonificacion"]+'</th>'
				listado += '		<th style="border:thin solid" width=80  align="center">'+datos[i]["precio"]+'</th>'
				listado += '		<th style="border:thin solid" width=100 align="center">'+datos[i]["iva"]+'</th>'
				listado += '		<th style="border:thin solid" width=100 align="center">'+datos[i]["importeProducto"]+'</th>'
				listado += '	</tr>'
			}
			$("#DetalleProducto").html(listado)
			//pie factura//
			listado="";
			listado +='SUBTOTAL '+datos[0]["subtotal"]+' '
			$("#SUBTOTAL").html(listado);

			listado="";
			listado +='TOTAL: '+datos[0]["total"]+' '
			$("#TOTAL").html(listado);





		}else {
			alert("Factura no emitida");
		};
		// datos = eval(data);
		// alert(datos[0]["numComprob"]);



	});
}
function cargar_insumo()
{
	var descripcion = $('#descripcion').val();
	var precio_compra = $('#precio_compra').val();
	var udm = $('#udm').val();
	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'descripcion='+descripcion+'&precio_compra='+precio_compra+'&udm='+udm+'&Boton=cargar_insumo'
	}).done(function(data){
		alert(data);
		limpiar();
	})
}
function limpiar()
{
	$("#formulario [type='text']").val("")//limpiar formulario (todos los  type="text")
	$("#formulario select").val(0)//loimpiar select de los formulario
}
//_______________________INSUMO_____________________________
