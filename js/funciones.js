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
			alert('logincorrecto');
			window.location="paginas/Menu2.php";
		}else {
			alert('error');
		}
	});
}



//_______________________INSUMO_____________________________
