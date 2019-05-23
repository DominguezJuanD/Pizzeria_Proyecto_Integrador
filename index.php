<!DOCTYPE html>
<html lang="es">

<head>

    <title>ISARM</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">    

    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/dist/css/select2.css">
    <link rel="stylesheet" type="text/css" href="librerias/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/css/styles.css">

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/dist/js/select2.js"></script>

</head>
<body class="" background="fondo.jpg">
	<div class="container">
		<!--<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner">
				<div class="item active">
					<img src="imagen1.jpg" alt="" style="width:100%;">
				</div>
	        	<div class="item">
					<img src="imagen2.jpg" alt="" style="width:100%;">
				</div>
			 
				<div class="item">
					<img src="imagen3.jpg" alt="" style="width:100%;">
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>-->

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar Sesion</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-signin" method="post" action="index.php">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="clave" class="form-control" placeholder="Clave" required>
                                </div>
                                <button type="submit" name="enviar" class="btn btn-primary btn-block">Ingresar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php 
session_start();
require_once "php/conexion.php";
$conexion = conexion();

if (isset($_POST['enviar'])) {

    if ((isset($_POST['usuario'])) && (isset($_POST['clave']))) {

        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];

        $sql=" SELECT id,usuario,clave,tipo FROM alumno";
        $consulta=mysqli_query($conexion,$sql);

        while($valor=mysqli_fetch_row($consulta)){
            if ($valor[1]==$usuario && $valor[2]==$clave) { 
                if ($valor[3]==0) {
                    $_SESSION['id_admin']=$valor[0];
                    header("location: paginas/informes.php");
                    break;
                }else{
                    $_SESSION['id_usuario']=$valor[0];
                    header("location: paginas/alumno.php");
                    break;
                }
            }else{
                header("location: index.php");
            }
        }   

    }else{
        header("location: index.php");
    }
}
?>
