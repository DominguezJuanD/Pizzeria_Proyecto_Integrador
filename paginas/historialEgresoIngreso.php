<?php
	include("Menu2.php");
?>

<body onload="ingresoEngreso();">
  <form id="formBusqueda">


        <div style="margin-left: 10%; margin-right:10%">
          <h4  align= "center">Historial de Ingreso y Egreso</h4>

          <!-- <b>Tipo Factura</b>


            <select name="tipofactura" id="tipofactura2">
              <option value="0">Todo</option>
              <option value="1">Venta</option>
              <option value="2">Compra</option>
            </select>

            <b>Desde</b>
            <input type="date" name="desde" id="desde" value="<?php echo date('Y-m-d',time());?>"></input>
            <b>Hasta</b>
            <input type="date" name="hasta" id="hasta" value="<?php echo date('Y-m-d',time());?>"></input>

            <input class="btn btn-primary" role="button" type="button" value="Buscar Factura" onclick="desdeHasta();"  id="buscar"/>

          <br>

          <br>
					<span><b>Saldo Anterrior: $</b><b id="saldo"></b></span>
					<span  style="float: right" ><b>Saldo Total: $</b><b id="saldoTotal" value="0"></b></span>
					<br>
					<br> -->
          <div id="tabla_doble" >

            <table style="width:100%"  class='tabla_datos table table-striped'>
	                 <td style="width:50%" >
											<table>
												<h5 align="center"><b>Productos</b></h4>
												<thead>
				                  <td style="width:20%">Descripcion</td>

				                  <td style="width:20%">Fec. Ult. venta</td>

				                  <td style="width:5%"> Ultimas Vendidas </td>
				                  <td style="width:5%">  total vendidas </td>
				                  <!-- <td style="width:10%"> Total $ </td> -->

				                  <!-- <td style="width:5%">________ </td> -->
												</thead>
												<tbody  bgcolor="white" id="listas"></tbody>
											</table>
	                </td>

									<td style="width:50%" >
										<table>
											<h5 align="center"><b>Insumos</b></h4>
											<thead>
												<td style="width:20%">Descripcion</td>

												<td style="width:15%">Fec. Ult. venta</td>

												<td style="width:5%"> Stock Actual </td>
												<td style="width:5%"> Can. ingreso </td>
												<td style="width:5%"> Can. Egreso</td>

												<!-- <td style="width:5%">________ </td> -->
											</thead>
											<tbody  bgcolor="white" id="listas1"></tbody>
										</table>
									</td>

            </table>

          </div>

					<!-- <div id="tabla_sola"  style="display: none">

						<table style="width:100%"  class='tabla_datos table table-striped'>
								<h5 align="center"><b id="tituloFactura" ></b></h4>
								<thead>

									<tr>
										<td style="width:10%">Tipo</td>
										<td style="width:50%">Nro. Comprobante</td>
										<td style="width:10%"> Facturador </td>
										<td style="width:10%"> Fecha/Hora </td>
										<td style="width:10%"> Total $ </td>
										<td style="width:10%">________ </td>
									</tr>
								</thead>
								<tbody id="listasSola" style="width:100%"  class='tabla_datos table table-striped'></tbody>
						</table>

					</div> -->
        </div>
    </form>
</body>
  <script src= "../js/funciones_factura.js"></script>
