<?PHP

$idcliente = $_POST['idCliente'];
$conexion = new mysqli("mysql.hostinger.com.ar","u178713617_poli","baloo12345","u178713617_poli");

$salida= "";
$cont=0;

$query = "SELECT id_reserva FROM reserva WHERE id_cliente = '$idcliente'";

$resultado = $conexion -> query($query);
$cont1 = $resultado -> num_rows;
while($res = $resultado -> fetch_assoc()){

	$reserva = $res['id_reserva'];
	$query2 = "SELECT * FROM Devolucion WHERE Id_reserva = '$reserva'";
	$resultado2 = $conexion -> query($query2);

	$cont = $resultado2 -> num_rows;

	if ($cont == 0) {
		$c=1;
		// $query3 = "SELECT * FROM DetalleReserva WHERE Id_reserva = '$reserva'";
		$query3 = "SELECT pr.*, dr.* FROM Productos pr INNER JOIN DetalleReserva dr WHERE dr.Id_reserva = '$reserva' AND pr.Id_producto = dr.Id_producto;";
		$resultado3 = $conexion -> query($query3);
		// $query4 = "SELECT stock.Stock FROM stock join reserva on stock.Id_productoSTK = reserva.Id"
		while($fila = $resultado3 -> fetch_assoc()){
			if ($c == 1) {
				$salida .= "<table class='tabla_datos'>
							<thead>
								<tr>
								<td>IDReserva: ".$fila['Id_reserva']."<td>
								<td>Fecha de Reserva: ".$fila['fechaReserva']."<td>
								</tr>
								<tr>
									<td>IDProducto</td>
									<td>Descripcion</td>
									<td>Cantidad Producto</td>
									<td>Devuelve</td>
								</tr>
							</thead>
							<tbody>";
			}
			if($c >= 1 ){
				$salida.="<tr>
						<td>".$fila['Id_producto']."</td>
						<td>".$fila['Descripcion']."</td>
						<td>".$fila['Cant_reservada']."</td>

						<td><a href='/polimorfismo/devolucion/devuelve.php?id=$fila[Id_reserva]'>Devuelve</a></td>
				</tr>";
				$c+=1;
			}

			$salida.="</tbody></table><br>";
		}

	}
}

if($cont > 0 or $cont1 == 0){
	$salida .= "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>El usuario no tiene reserva!!</strong></div>";
}

echo $salida;


$conexion -> close();

?>
