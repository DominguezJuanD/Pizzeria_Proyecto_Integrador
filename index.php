<!DOCTYPE html>
<html lang="es">

<head>

    <title>Baloo Pizza</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="css/index.css">



</head>
<body>
	<div class="container"  >

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar Sesion</h3>
                    </div>
                    <div class="panel-body">

                            <fieldset>
                                <div class="form-group">
                                    <input type="text" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="clave" class="form-control" placeholder="Clave" required>
                                </div>
                                <button name="enviar" class="btn btn-primary btn-block" onclick="login();">Ingresar</button>
                            </fieldset>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="librerias/jquery/jquery-3.2.1.min.js"></script>
<script src="librerias/bootstrap/js/bootstrap.js"></script>
<script src="js/funciones.js"></script>

</html>

<?php
// session_start();
// require_once "php/conexion.php";
// $conexion = conexion();
//
// if (isset($_POST['enviar'])) {
//
//     if ((isset($_POST['usuario'])) && (isset($_POST['clave']))) {
//
//         $usuario=$_POST['usuario'];
//         $clave=$_POST['clave'];
//
//         $sql=" SELECT id,usuario,clave,tipo FROM alumno";
//         $consulta=mysqli_query($conexion,$sql);
//
//         while($valor=mysqli_fetch_row($consulta)){
//             if ($valor[1]==$usuario && $valor[2]==$clave) {
//                 if ($valor[3]==0) {
//                     $_SESSION['id_admin']=$valor[0];
//                     header("location: paginas/informes.php");
//                     break;
//                 }else{
//                     $_SESSION['id_usuario']=$valor[0];
//                     header("location: paginas/alumno.php");
//                     break;
//                 }
//             }else{
//                 header("location: index.php");
//             }
//         }
//
//     }else{
//         header("location: index.php");
//     }
// }
?>
