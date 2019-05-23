<?php include("Menu2.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Producto</title>

	<link rel="stylesheet"  href="../css/Menu2.css">
	<link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<center>
		<?php
			$id = $_REQUEST['id'];
			require("../php/conexion.php");
			$query = "SELECT * FROM productos WHERE id_producto ='$id'";
			$resultado = $conexion -> query($query);
			$var = $resultado -> fetch_assoc();

		?>

		<form action="../php/productos/mod_pro_producto.php?id=<?php echo $var['id_producto']; ?>" method="POST" class="col-md-6">

			<br/><br/><br/>
			<h3>Modificanion de Producto</h3>
			Descripcion<br/>
			<input type="text" REQUIRED name="descripcion" placeholder="Descripcion..." class="form-control" value="<?php echo $var['descripcion'];?>" /><br/>
			Precio<br/>
			<input type="text" REQUIRED name="Precio" placeholder="Precio..." class="form-control" value="<?php echo $var['precio'];?>" /><br/>
			<br/>
			<input type="submit"  value="Enviar" id= "submit" name="Aceptar">
		</form>
		<form action="listarProductos.php">
			<input type="submit" Value="Cancelar" id="cancelar" name="cancelar">
		</form>
	</center>

</body>
</html>
