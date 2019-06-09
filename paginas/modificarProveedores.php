<!--  -->

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Proveedores</title>
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

		<form action="../php/proveedores/mod_proveedores.php?id=<?php echo $var['id_persona']; ?>" method="POST" class="col-md-6">

			<br/><br/><br/>
			<h3>Modificanion de Proveedores</h3>

			Razon Social<br/>
			<input type="text" REQUIRED name="razon_social" placeholder="Razon Social..." class="form-control" value="<?php echo $var['nombre'];?>" /><br/>

			Telefono<br/>
			<input type="number" REQUIRED name="telefono" placeholder="xxxxxxxxxx" class="form-control" value="<?php echo $var['telefono'];?>" /><br/>

			Tipo<br/>
			<input type="text" REQUIRED name="direccion" class="form-control" value="<?php echo $var['direccion'];?>" /><br/>

			Fecha de Inicio<br/>
			<input type="date" REQUIRED name="fe_ini" class="form-control" value="<?php echo $var['fec_nac'];?>" /><br/>


			<br/>
			<input type="submit"  value="Enviar" id= "submit" name="Aceptar">
		</form>
		<form action="listarProveedores.php">
			<input type="submit" Value="Cancelar" id="cancelar" name="cancelar">
		</form>
	</center>

</body>
</html>
