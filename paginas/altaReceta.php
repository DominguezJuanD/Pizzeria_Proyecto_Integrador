<?php

	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){

	include("../php/conexion.php");
	include("Menu2.php");

	$id=$_GET['id'];
	$desc=$_GET['desc'];
?>

<!DOCTYPE html>

<html>

<head>

	<title></title>

</head>

<body onload="listar_insumos(<? echo $id ?>);">


<h1 style="align:center" >Reseta del Producto : <input type="text" readonly="readonly" style="border:0" value="<? echo $desc ?>"> </h1>

<div style="margin-left: 10%; margin-right:10%">
<table style="width:100%" bgcolor="white" border="3">
<tr style="width:80% ">
		<fieldset style="text-align:center;"> <!-- aca termina empieza otra parte  -->
			<legend align="center" >Lista de Ingredientes</legend>
			<form id="busqueda">
			<!-- Buscar Insumo <input type="text" name="Buscar" id="Buscar" >
			<input type="button" value="Buscar"  onclick="buscar();" /> -->

				<table style="width:80%" align="center">
					<thead>
						<tr>
								<tr>
									<td>
										<b>Elegir Insumo: </b>
									</td>
									<td>
										<select id="id_insumo">
											<option value="0">Insumo:</option>
											<?php
											$query = $conexion -> query ("SELECT * FROM insumos");
											while ($insumo = mysqli_fetch_array($query)) {
												echo '<option value="'.$insumo[0].'">'.$insumo[1].'</option>';
											}
											?>
										</select>
									</td>

									<td <b>Cantidad </b></td>
									<td><input type="number"  class="outlinenone" id="Cantidad" value="0"></input></td>

									<td align="right">  <input class="btn btn-primary" role="button" type="button" value="Agregar" onclick="agregar_insumos();" ></input></td>
									<td>  </td>
									<td align="right">  <a href='listarProductos.php' class='btn btn-danger' role="button" type="button"> Cacelar </a></td>
								</tr>

						</tr>
					</thead>
				</table>

				</form>
				<br>
					<div >
						<table style="width:100%"  border="3">
							<thead>


							<td style="width:10%">ID Insumo</td>

								<td style="width:50%">Insumo/Ingrediente</td>

								<td style="width:10%"> Cantidad </td>

								<td style="width:10%">________</td>

							</thead>
							<tbody id="insumos" style="width:100%"  class='tabla_datos table table-striped'></tbody>
						</table>

					</div>
			</fieldset> <!-- aca termina una parte  -->
		</tr>
		</tr>
		</table>

	</div>
	<script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
	<script src= "../js/JSproducto.js"></script>
</body>

</html>
