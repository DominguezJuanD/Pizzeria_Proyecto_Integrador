<?php

	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){

	// include("../php/conexion.php");
	include("Menu2.php");
?>

<body>
  <form id="formBusqueda">


        <div style="margin-left: 10%; margin-right:10%">


            <b>Tipo Comp.</b>


              <select name="tipoComp" id="tipo_comp">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="X">X</option>
              </select>
          <br>

          <b>Tipo Factura</b>


            <select name="tipofactura" id="tipo_factura">
              <option value="1">Venta</option>
              <option value="2">Compra</option>
            </select>

          <br>
          <br>

            <b>Nro de Comprobante</b>
            <input type="number" name="puntoVenta" value="1"></input>
            <input type="number" name="numFactura" value="0"></input>

            <input class="btn btn-primary" role="button" type="button" value="Buscar Factura" onclick="buscarFacturas();" />

          <br>

          <br>
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
