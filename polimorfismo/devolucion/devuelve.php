<!DOCTYPE html>
<html>
<head>
	<title>Devoluciones</title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<center>
		<?php
			$id = $_REQUEST['id'];
			$conexion = new mysqli("mysql.hostinger.com.ar","u178713617_poli","baloo12345","u178713617_poli");
			$query = "SELECT * FROM DetalleReserva WHERE Id_reserva = '$id'";
			$resultado = $conexion -> query($query);
			$var = $resultado -> fetch_assoc();

		?>

		<form action="/polimorfismo/devolucion/guardardevolucion.php?id=<?php echo $id; ?>" method="POST" class="col-md-6">

			<br/><br/><br/>
			<h3>Devoluciones</h3>
			Id producto<br/>
			<input type="text" REQUIRED name="Id_producto" placeholder="Id Producto..." class="form-control" value="<?php echo $var['Id_producto'];?>" /><br/>
			Cant_reservada<br/>
			<input type="text" REQUIRED name="Cant_reservada" placeholder="Can. Reservada..." class="form-control" value="<?php echo $var['Cant_reservada'];?>" /><br/>
			cant_devuelta <br/>
			<input type="num" REQUIRED name="cant_devuelta" placeholder="can Devuelta..." class="form-control" value="" /><br/>
			<input type="submit"  value="Enviar" id= "submit" name="Aceptar">
		</form>
		<form action="/polimorfismo/devolucion/devolucion.php">
			<input type="submit" Value="Cancelar" id="cancelar" name="cancelar">
		</form>
	</center>

</body>
</html>
