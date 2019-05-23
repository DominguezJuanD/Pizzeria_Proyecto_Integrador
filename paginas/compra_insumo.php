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
      <!-- <style>
      body{
        background: url(fondo3.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      </style> -->
  </head>
<body>
  <section id="compra">
  	<div style="margin-left: 10%; margin-right:10%">
  	  <table style="width:100%">
  	    <tr>
  	      <td style="width:50%" valign="top">
  						<fieldset>
  							<legend align="center" >Insumos</legend>
  							<form id="formulario">
  							<!-- Buscar Insumo <input type="text" name="Buscar" id="Buscar" >
  							<input type="button" value="Buscar"  onclick="buscar();" /> -->

  						<table style="width:100%" align="center">
  							<thead>
  								<tr>
  										<tr>
                        <td>
                          <b>Elegir inusmo: </b>
                        </td>
                        <td>
                          <select id="id_prod">
                            <option value="0">Insumo:</option>
                            <?php
                            $query = $conexion -> query ("SELECT * FROM insumos WHERE baja_logica = 1");
                            while ($insumo = mysqli_fetch_array($query)) {
                              echo '<option value="'.$insumo[0].'">'.$insumo[1].'</option>';
                            }
                            ?>
                          </select>
                        </td>
  										</tr>
  										<tr>
  											<td <b>Cantidad : </b></td>
  											<td><input type="number" id="Cantidad" value="0"></td>
  										</tr>
											<tr>
  											<td <b>Precio : </b></td>
  											<td><input type="number" id="precio" value="0"></td>
  										</tr>
  										<tr>
  											<td align="right"> <br> <input class="btn btn-primary" role="button" type="button" value="Agregar" onclick="agregar_producto(2);" /></td>
  										</tr>
  								</tr>
  							</thead>
  						</table>

  						<br>
  						<div id="navegador"></div>
  					</fieldset>
  	      </td>
  				<td style="width:50%" valign="top">
  					<fieldset>
  						<legend>Formulario Compra Insumo</legend>

  							<table bgcolor="white" border="3">
  								<tr>
  									<td><b>fecha:</b></td>
  									<td><input name="fecha" value="<?php echo date("d-m-Y");?>" readonly="readonly"/> </td>
  								</tr>
  								<tr>
                    <td><b>Seleccionar Proveedor: </b></td>
                    <td>
                    <select name="provedor" id="provedor">
                    	<option value="0">proveedor:</option>
                    	<?php
                      $query = $conexion -> query ("SELECT * FROM Proveedores ");
                      while ($provedor = mysqli_fetch_array($query)) {
                        echo '<option value="'.$provedor[0].'">'.$provedor[2].'</option>';
                      }
                    	?>
                    </select>
                    </td>
  								</tr>
  								<tr>
  									<td><b>Forma de pago</b></td>
                    <td>
                    <select name="formapago">
                      <option value="0">forma de pago:</option>
                      <?php
                      $query = $conexion -> query ("SELECT * FROM FormaPago");
                      while ($formp = mysqli_fetch_array($query)) {
                        echo '<option value="'.$formp[0].'">'.$formp[1].'</option>';
                      }
                      ?>
                    </select>
                    </td>
                  </tr>
  								</tr>
  								<tr>
  									<td><b>Descuento </b></td>
  									<td><input type="number" name="Descuento" id="Descuento" value="0"></td>
  								</tr>
  								<tr>
  									<td><b>Tipo Factura</b></td>
  									<td>
  										<select name="tipofactura" id="tipo_factura">
  											<option value="A">A</option>
  											<option value="B">B</option>
  											<option value="C">C</option>
  											<option value="X">X</option>
  										</select>
  									</td>
  								</tr>
									<tr id="triva">
										<td><b>IVA $ :</b></td>
										<td><input type="number" name="ivaC" id="ivaC" value="0"></td>
									</tr>
  							</table>
  							<input type="button" value="Limpiar"  onclick="limpiar();" />
  							<input type="button" value="Generar Factura" onclick="factura_compra_insumo();" />
  						</form>
  					</fieldset>
  				</td>
  			</tr>
  	    </table>
				<br><br>
				<div >
					<table style="width:100%" border="3" bgcolor="white">
						<td style="width:10%">ID</td>

							<td style="width:50%">Insumo</td>

							<td style="width:10%"> Cantidad </td>
							<td style="width:10%"> Pre. Unitario $ </td>
							<td style="width:10%"> Pre. Total $ </td>

							<td style="width:10%">________ </td>
							<tbody id="productos" style="width:100%"  class='tabla_datos table table-striped'></tbody>
					</table>
					<table style=" float:right; margin-right:10%">
						<td>Total Neto :</td>
						<td> <input type="number" name="totalnetoC" id="totalnetoC" value="0"  readonly="readonly"> </td>
						<br>
						<tr>
							<td> <h5><b> TOTAL $ : </b></h5> </td>
							<td> <input type="number" name="total" id="total" value="0" readonly="readonly"></td>
						</tr>
					</table>
				</div>
  	  <div  id="mensaje" align="center"></div>
  	</div>
  </section>
	<br>
	<br>
	<div class="">

	</div>
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
