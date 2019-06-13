<?php

	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){

	include("../php/conexion.php");
	include("Menu2.php");
	$id = $_GET['id'];
	$tipo = $_GET['tipo'];
?>
<html>
  <head>
      <!-- <link rel="shortcut icon" href="icono.ico"> -->
      <title>Compra de Insumos </title>
      <meta charset="UTF8">
			<link rel="stylesheet"  href="../css/Menu2.css">
  </head>

	<body onload="detalleFactura(<? echo $id ?>,<? echo $tipo ?>);">

  <section id="venta">
  	<div style="margin-left: 10%; margin-right:10%">


  				 <!-- aca termina empieza otra parte  -->
  					<fieldset>
  						<h3 align="center" id="titulo"></h3>
							<br>
  						<form id="formulario" >
										<div class="fecha">
											<b>Fecha/Hora:</b>
	  									<input id="fecha" readonly="readonly"/>
										</div>


										<div class="atendio">
											<b>Atendio: </b>
											<input type="text"  readonly="readonly" id="atendio">
											<input type="text" readonly="readonly" id="usuario" size="1">
										</div>


										<!-- <div class="tipoFactura">
											<b>Tipo Factura</b>
                      <input type="text" readonly="readonly" id="facturaTipo" size="1">
											</div> -->
                      <br>
											<br>
										<table style="width:100%">
											<thead>
												<tr>
												<td  >
			                    <b>Cliente: </b>
                          <input type="text" readonly="readonly" id="cliente">
												</td>
												<td>
													<b>ID Cliente:</b>
			                    <input type="text" id="id_cliente" size="1" readonly="readonly">
												</td>

												<td >
			                    <b>Direccion: </b>
			                    <input type="text" id="direccion"  readonly="readonly">
												</td>
												<td>
			                    <b>Telefono: </b>
			                    <input type="text" id="telefono"  readonly="readonly">
												</td>
												</tr>

													<tr>
														<td>
															<br>
															<br>
					                    <b>Forma de pago:</b>

                              <input type="text" readonly="readonly" id="formaPago">
														</td>
															<td>
																<br>
																<br>
					                    <b>Descuento :</b>

					                    <input type="text"  id="Descuento" readonly="readonly" size="1">
															</td>

															<td>
																<br>
																<br>
																<a href="buscarFacturas.php" class='btn btn-danger' role="button" type="button">Volver</a>
															</td>

													</tr>
											</thead>
										</table>
                    <br>
  						</form>
  					</fieldset><!-- aca termina una parte  -->

          <table style="width:100%">
          <tr style="width:80% ">
              <fieldset style="text-align:center;"> <!-- aca termina empieza otra parte  -->
                <legend align="center" >Detalle Factura</legend>
                <form id="busqueda">
                <!-- Buscar Insumo <input type="text" name="Buscar" id="Buscar" >
                <input type="button" value="Buscar"  onclick="buscar();" /> -->

              </form>
              <br>
                <div >
                  <table style="width:100%"  class='tabla_datos table table-striped'>
										<thead>


                    <td style="width:10%">ID</td>

	                    <td style="width:50%">Producto</td>

	                    <td style="width:10%"> Cantidad </td>
	                    <td style="width:15%"> Pre. Unitario $ </td>
	                    <td style="width:15%"> Pre. Total $ </td>

										</thead>
										<tbody id="productos" style="width:100%"  class='tabla_datos table table-striped'></tbody>
                  </table>



                </div>
              <div id="navegador"></div>

							<table style=" float:right; margin-right:10%">
								<td>Total Neto :</td>
								<td> <input type="number" name="totalneto" id="totalneto" value="0"  readonly="readonly"> </td>
								<tr id="triva">
									<td>IVA 21.00% :</td>
									<td > <input type="number" name="iva" id="iva" value="0" readonly="readonly" > </td>
								</tr>
								<br>
								<tr>
									<td> <h5><b> TOTAL $ : </b></h5> </td>
									<td> <input type="number" name="total" id="total" value="0" readonly="readonly"></td>
								</tr>
							</table>
            </fieldset> <!-- aca termina una parte  -->
          </tr>
  			</tr>
  	    </table>
  	  <div  id="mensaje" align="center"></div>
  	</div>

		<div class="">

		</div>
  </section>

	<script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
	<script src= "../js/funciones_factura.js"></script>
 </body>
</html>
  <?php
//   }else{
//
//   	echo "<script> window.location = 'index.php'; </script>";
// }

?>
