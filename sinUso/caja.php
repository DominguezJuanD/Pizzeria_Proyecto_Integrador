<?php

	@session_start();

	//include 'serv.php';

	if (@isset($_SESSION['user'])){


?>
<html>
  <head>
      <link rel="shortcut icon" href="icono.ico">
      <title>Exrtaer/ingresar Dinero </title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet"  href="menu.css">
        <script src="funciones.js"></script>
      <meta charset="UTF8">
      <style>
      body{
        background: url(fondo3.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      </style>
  </head>
  <body>
  <section id="caja" >
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0 well" >
        <table style="width:100%" >
          <form id="formulario">
            <tr>
              <td style="width:50%" valign="top">
                <fieldset align="center">
                  <legend align="center">Ingreso / Egreso</legend>
                  <b> Cantidad $ </b>
                 <input type="number" value=0 id="dinero" name="dinero">
                 <b>fecha:</b>
                 <input type="date" name="fecha" placeholder="dd/mm/aaaa" id="fecha" value="<?php echo date("Y-m-d");?>">
                  <br>
                  <br>
                  Observación:
                  <input type="text" id="observacion" name="observacion" size="50">
                  <br>
                  <input type="button" value="Limpiar"  onclick="limpiar();" />
                  <input type="button" value="Extraer dinero" onclick="extraer_dinero();" />
                  <input type="button" value="Ingresar dinero" onclick="ingreso_dinero();" />
                </fieldset>
              </td>
            </tr>
          </form>
        </table>
      <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
    </div>
  </section>
  </body>
</html>
<?php


}else{

	echo "<script> window.location = 'index.php'; </script>";

}

?>
