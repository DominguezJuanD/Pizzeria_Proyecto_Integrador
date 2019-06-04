<?php

	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){

	include("../php/conexion.php");
	include("Menu2.php");
?>
<html>
  <head>
      <!-- <link rel="shortcut icon" href="icono.ico"> -->
      <title>Compra de Insumos </title>
      <meta charset="UTF8">
			<link rel="stylesheet"  href="../css/Menu2.css">
  </head>
<body>
  <section id="venta">
  	<div style="margin-left: 10%; margin-right:10%">


  				 <!-- aca termina empieza otra parte  -->
  					<fieldset>
  						<h3 align="center" >Facturacion</h3>
  						<form id="formulario">
										<div class="fecha">
											<b>Fecha:</b>
	  									<input name="fecha" value="<?php echo date('d/m/Y',time());?>" readonly="readonly"/>
										</div>


										<div class="atendio">
											<b>Atendio: </b>
											<input type="text"  value="yo">
											<input type="text" name="id_usuario" value="1309">
										</div>


										<div class="tipoFactura">
											<b>Tipo Factura</b>
	                      <select name="tipofactura" id="tipo_factura">
	                        <option value="A">A</option>
	                        <option value="B">B</option>
	                        <option value="C">C</option>
	                        <option value="X">X</option>
	                      </select>
											</div>
                      <br>
										<table style="width:100%">
											<thead>
												<tr>
												<td  >
			                    <b>Seleccionar Cliente: </b>

			                    <select name="cliente_proveedor" id="clientes">
			                      <option value="0">Cliente:</option>
			                      <?php
			                      $query = $conexion -> query ("SELECT * FROM persona ");
			                      while ($provedor = mysqli_fetch_array($query)) {
			                        echo '<option value="'.$provedor[0].'" direc="'.$provedor[3].'" tel="'.$provedor[4].'" >'.$provedor[1].'</option>';
			                      }
			                      ?>
			                    </select>
												</td>
												<td>
													<b>ID Cliente:</b>
			                    <input type="text" id="id_cliente" size="1">
												</td>

												<td >
			                    <b>Direccion: </b>
			                    <input type="text" id="direccion" value="alla">
												</td>
												<td>
			                    <b>Telefono: </b>
			                    <input type="text" id="telefono" value="123" size="10">
												</td>
												</tr>

													<tr>
														<td>
															<br>
															<br>
					                    <b>Forma de pago:</b>

					                    <select name="formapago">
					                      <option value="0">forma de pago :</option>
					                      <?php
					                      $query = $conexion -> query ("SELECT * FROM FormaPago");
					                      while ($formp = mysqli_fetch_array($query)) {
					                        echo '<option value="'.$formp[0].'">'.$formp[1].'</option>';
					                      }
					                      ?>
					                    </select>
														</td>
															<td>
																<br>
																<br>
					                    <b>Descuento :</b>

					                    <input type="text" name="Descuento" id="Descuento" value="0" size="1">
															</td>
															<td>
					                    <input type="button" value="Limpiar"  onclick="limpiar();" />
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
                <legend align="center" >Nueva Venta</legend>
                <form id="busqueda">
                <!-- Buscar Insumo <input type="text" name="Buscar" id="Buscar" >
                <input type="button" value="Buscar"  onclick="buscar();" /> -->

              <table style="width:80%" align="center">
                <thead>
                  <tr>
                      <tr>
                        <td>
                          <b>Elegir Producto: </b>
                        </td>
                        <td>
                          <select id="id_prod">
                            <option value="0">Insumo:</option>
                            <?php
                            $query = $conexion -> query ("SELECT * FROM productos");
                            while ($insumo = mysqli_fetch_array($query)) {
                              echo '<option value="'.$insumo[0].'" value2="'.$insumo[1].'">'.$insumo[2].'</option>';

                            }
                            ?>
                          </select>
                        </td>

                        <td <b>Cantidad </b></td>
                        <td><input type="number" id="Cantidad" value="0"></td>

                        <td style="float:right"> <br> <input class="btn btn-primary" role="button" type="button" value="Agregar" onclick="agregar_producto(1);" />
													<input class="btn btn-success" role="button" type="button" value="Generar Factura" onclick="factura_venta_producto(1);" />
												</td>
                      </tr>

                  </tr>
                </thead>
              </table>

              </form>
              <br>
                <div >
                  <table style="width:100%"  class='tabla_datos table table-striped'>
										<thead>


                    <td style="width:10%">ID</td>

	                    <td style="width:50%">Producto</td>

	                    <td style="width:10%"> Cantidad </td>
	                    <td style="width:10%"> Pre. Unitario $ </td>
	                    <td style="width:10%"> Pre. Total $ </td>

	                    <td style="width:10%">________ </td>

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
