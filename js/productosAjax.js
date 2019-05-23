
$(document).ready(function(){
	$('#ProForm').submit(function(){
//	$('#resultado').text("funciona");
//	var datos = $('#CliForm').serialeze();
	var codProducto = $("#codProducto").val();
	var descripcion = $("#descripcion").val();
	var precio = $("#precio").val();
	alert("hola")	

	$.ajax({
		type : "POST",
		url : 'registrarProductos.php',
		data : {codProducto:codProducto, descripcion:descripcion, precio:precio},
		//cache : false,
		success: function(data){
			$('#resultado').html(data);
		}
	});
	return false;
	});
});

// $(document).ready(function(){
// 			$("#CliForm").on('submit',function(){
// 				var telefono_usuario = $("#telefono").val();
// 				var nombre_usuario = $("#nombre").val();
// 				var fe_na_usuario = $("#fe_na").val();
// 				var direc_usuario = $("#direccion").val();
// 				$.post("conexion_cliente_telefo.php", {telefono:telefono_usuario, nombre:nombre_usuario, fecha_nacimiento:fe_na_usuario, direccion:direccion_usuario }, function(datos){
// 					$("#resultado").html(datos);
// 				});
// 			});
// 		});