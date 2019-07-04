<?php

	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){

	// include("../php/conexion.php");
	include("Menu2.php");
  $id = $_GET['id'];
?>

<body onload="listaFacturas( <? echo $id; ?> );">
  <form id="formBusqueda">


        <div style="margin-left: 10%; margin-right:10%">


          <div >

            <table style="width:100%"  class='tabla_datos table table-striped'>
                <thead>


                  <td style="width:10%">Tipo</td>

                  <td style="width:50%">Nro. Comprobante</td>

                  <td style="width:10%"> Facturador </td>
                  <td style="width:10%"> Fecha/Hora </td>
                  <td style="width:10%"> Total $ </td>

                  <td style="width:10%">________ </td>

                </thead>
                <tbody id="listas" style="width:100%"  class='tabla_datos table table-striped'></tbody>
            </table>

          </div>
        </div>
    </form>
</body>
