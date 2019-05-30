<?php 
	@session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1"/>
	<meta redirect/>
	<title>Validando...</title>
</head>
<body>
<?php 
	//include 'serv.php';
	include("conexion.php");
	if (isset($_POST['login'])){
		$loginCorrecto = 0;
		$idusuario = trim($_POST ['usuario']);
		$idpassword = $_POST ['password'];
		$resultado = mysqli_query($conexion, "SELECT * FROM usuarios");
		while ($consulta = mysqli_fetch_array ($resultado)){
			if (($consulta ['usuario']==$idusuario)and($consulta ['password']==$idpassword)){
				$loginCorrecto = 1;
				$_SESSION['user'] = $idusuario;
			}

			}
		//if ($encontro==1) {
		//	echo "BIENVENIDO AL GRUPO<br>";
		//	echo "<a href=factura.php>FACTURA</a>";
		//}else{
		//	echo "USTED NO PERTENECE AL GRUPO<BR>";
		//	echo("<big>LARGO DE AQUÍ</big>");

		//} 
		if ($loginCorrecto==1){
			echo 'Ingreso correcto, Usuario: '.$_SESSION['user'].' <p>';
			echo "<script> window.location = 'menu.php'; </script>";
		}else{
			echo '<script>alert("No se pudo iniciar sesion");</script>';
			echo "<script> window.location = 'index.php'; </script>";
		}
	}
?>
</center></form>
</body>
</html>
