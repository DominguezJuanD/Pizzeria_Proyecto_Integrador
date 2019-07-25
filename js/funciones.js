//variables JS//


function login(){

	var usuario = $('#usuario').val();
	var pass = $('#clave').val();
	console.log(usuario,pass);
	$.ajax({
		url:'php/consultas.php',
		type:'POST',
		data: 'Boton=login&usuario='+usuario+'&pass='+pass,
	}).done(function(resp){
		if (resp) {
			alert('login correcto');
			window.location="paginas/inicio.php";
		}else {
			alert('error');
		}
	});
}

function cerrarSesion(){

	$.ajax({
		url:'../php/consultas.php',
		type:'POST',
		data: 'Boton=logout',
	}).done(function(resp){
		if (resp) {
			alert('logout correcto');
			window.location="../index.php";
		}else {
			alert('error');
		}
	});


}




//_______________________INSUMO_____________________________
