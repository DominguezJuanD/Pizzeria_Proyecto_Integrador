<?php include("Menu2.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar insumo</title>
</head>
<body>
	<center>
		<?php
			$id = $_REQUEST['id'];
			include("../php/conexion.php");
			$query = "SELECT i.*, u.desc_udm FROM insumos as i inner join udm as u on i.udm = u.id_udm WHERE id_insumo ='$id'";
			$resultado = $conexion -> query($query);
			$var = $resultado -> fetch_assoc();
		?>

		<form action="../php/insumos/mod_pro_insumo.php?id=<?php echo $var['id_insumo']; ?>" method="POST" class="col-md-6">

			<br/><br/><br/>
			<h3>Modificanion de Insumo</h3>
			Descripcion<br/>
			<input type="text" REQUIRED name="desc_insumo" placeholder="Descripcion..." class="form-control" value="<?php echo $var['desc_insumo'];?>" /><br/>
			Precio<br/>
			<input type="text" REQUIRED name="precio_compra" placeholder="Precio..." class="form-control" value="<?php echo $var['precio_compra'];?>" /><br/>
      unidad de medida<br/>
			<select name="udm" class="form-control">
				<option value="'<?php echo $var['id_insumo'];?>'"><?php echo $var['desc_udm'];?></option>
				<?php
				$query = $conexion -> query ("SELECT * FROM udm ");
				while ($provedor = mysqli_fetch_array($query)) {
					echo '<option value="'.$provedor[0].'">'.$provedor[1].'</option>';
				}
				?>
			</select>

			<!-- <input type="text" REQUIRED name="udm" placeholder="unidad de medida..." class="form-control" value="<?php echo $var['udm'];?>" /><br/> -->
      <br/>
			<input type="submit"  value="Enviar" id= "submit" name="Aceptar">
		</form>
		<form action="listarInsumos.php">
			<input type="submit" Value="Cancelar" id="cancelar" name="cancelar">
		</form>
	</center>

</body>
</html>
