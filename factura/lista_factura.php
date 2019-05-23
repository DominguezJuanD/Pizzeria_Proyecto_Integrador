
<?php
require("../config/conexion.php");
$salida ="";
$query = "SELECT * FROM encabezadoFactura WHERE tipoCompraVenta = 1";

if(isset($_POST['consulta'])){
	$id = $conexion -> real_escape_string($_POST['consulta']);
	$query = "SELECT tipComprob, serieComprob, numComprob, fechaComprob, formaPago, subtotal, iva, total, tipoCompraVenta FROM encabezadoFactura WHERE fechaComprob like '%".$id."%' or numComprob like '%".$id."%' or tipComprob like '%".$id."%' ";

}

$resultado = $conexion -> query($query);

if($resultado->num_rows > 0){

	$salida .= "<table class='tabla_datos'>
					<thead>
						<tr>
							<td>Tipo de Factura</td>
							<td>serie Comprobante</td>
							<td>Numero Comprobante</td>
							<td>Fecha Factura</td>
							<td>Forma de Pago</td>
							<td>Sub Total</td>
							<td>IVA</td>
							<td>Total</td>
							<td>  Detalles </td>
						</tr>
					</thead>
					<tbody>";

	while($fila = $resultado -> fetch_assoc()){

		$salida.="<tr>
				<td>".$fila['tipComprob']."</td>
				<td>".$fila['serieComprob']."</td>
				<td>".$fila['numComprob']."</td>
				<td>".$fila['fechaComprob']."</td>
				<td>".$fila['descFormaPago']."</td>
				<td>".$fila['subtotal']."</td>
				<td>".$fila['iva']."</td>
				<td>".$fila['total']."</td>

				<td><a href='../buscar_factura.php?numero=$fila[numComprob]&serie=$fila[serieComprob]&tipo=$fila[tipComprob]' class='btn btn-success btn-sm'>Ver detalle</a></td>

		</tr>";

	}

	$salida.="</tbody></table>";

}else{
	$salida.= "<div class='alert alert-danger' role='alert'><b>Datos no Encontrados !!!</b></div>";

}
//
echo $salida;

$conexion -> close();

function tipo(){
	if ($value == "") {
		# code...
	}
}
?>
