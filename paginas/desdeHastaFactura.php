<?php


	include("Menu2.php");
?>

<body>
  <form id="formBusqueda">


        <div style="margin-left: 10%; margin-right:10%">
          <h4  align= "center">Buscar Facturas</h4>

          <b>Tipo Factura</b>


            <select name="tipofactura" id="tipofactura2">
              <option value="0">Todo</option>
              <option value="1">Venta</option>
              <option value="2">Compra</option>
            </select>

            <b>Desde</b>
            <input type="date" name="desde" id="desde"></input>
            <b>Hasta</b>
            <input type="date" name="hasta" id="hasta"></input>

            <input class="btn btn-primary" role="button" type="button" value="Buscar Factura" onclick="desdeHasta();" />

          <br>

          <br>
					<span><b>Saldo Anterrior:</b><b id="saldo" value="0"></b> </span>
					<br>
					<br>
          <div id="tabla_doble" >

            <table style="width:100%"  class='tabla_datos table table-striped'>

	                 <td style="width:50%" >
											<table>
												<thead>
				                  <td style="width:5%">Tipo</td>

				                  <td style="width:10%">Nro. Comprobante</td>

				                  <td style="width:10%"> Facturador </td>
				                  <td style="width:10%"> Fecha/Hora </td>
				                  <td style="width:10%"> Total $ </td>

				                  <td style="width:5%">________ </td>
												</thead>
												<tbody  bgcolor="white" id="listas"></tbody>
											</table>
	                </td>

									<td style="width:50%" >
										<table>
											<thead>
												<td style="width:5%">Tipo</td>

												<td style="width:10%">Nro. Comprobante</td>

												<td style="width:10%"> Facturador </td>
												<td style="width:10%"> Fecha/Hora </td>
												<td style="width:10%"> Total $ </td>

												<td style="width:5%">________ </td>
											</thead>
											<tbody  bgcolor="white" id="listas1"></tbody>
										</table
									</td>

            </table>

          </div>

					<div id="tabla_sola"  style="display: none">

						<table style="width:100%"  class='tabla_datos table table-striped'>
								<thead>


									<td style="width:10%">Tipo</td>

									<td style="width:50%">Nro. Comprobante</td>

									<td style="width:10%"> Facturador </td>
									<td style="width:10%"> Fecha/Hora </td>
									<td style="width:10%"> Total $ </td>

									<td style="width:10%">________ </td>

								</thead>
								<tbody id="listasSola" style="width:100%"  class='tabla_datos table table-striped'></tbody>
						</table>

					</div>
        </div>
    </form>
</body>
  <script src= "../js/funciones_factura.js"></script>
