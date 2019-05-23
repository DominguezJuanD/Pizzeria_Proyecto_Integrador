<!DOCTYPE html>
<html>
<head>
	<title>Modificar Cliente</title>

	<link rel="stylesheet"  href="../css/Menu2.css">
	<link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<center>
		<?php
			$id = $_REQUEST['id'];
			require("../php/conexion.php");
			$query = "SELECT * FROM persona WHERE id_persona ='$id'";
			$resultado = $conexion -> query($query);
			$var = $resultado -> fetch_assoc();

		?>

		<form action="../php/cliente/mod_pro_cliente.php?id=<?php echo $var['id_persona']; ?>" method="POST" class="col-md-6">

			<br/><br/><br/>
			<h3>Modificanion de Clientes</h3>
			Telefono<br/>
			<input type="text" REQUIRED name="telefono" placeholder="Telefono..." class="form-control" value="<?php echo $var['telefono'];?>" /><br/>
			Nombre<br/>
			<input type="text" REQUIRED name="nombre" placeholder="Nombre..." class="form-control" value="<?php echo $var['nombre'];?>" /><br/>
			Fecha de Nacimiento<br/>
			<input type="date" REQUIRED name="fe_na" placeholder="Fecha Nacimiento..." class="form-control" value="<?php echo $var['fec_nac'];?>" /><br/>
			Direccion<br/>
			<input type="text" REQUIRED name="direccion" placeholder="Direccion..." class="form-control" value="<?php echo $var['direccion'];?>" /><br/>
			<br/>
			<input type="submit"  value="Enviar" id= "submit" name="Aceptar">
		</form>
		<form action="../paginas/listarClientes.php">
			<input type="submit" Value="Cancelar" id="cancelar" name="cancelar">
		</form>
	</center>

</body>
</html>
