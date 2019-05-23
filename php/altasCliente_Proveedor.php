<?php
	include ('conexion.php');

$modo = $_POST['modo'];

if ($modo == 1) {

	$telefono = $_POST['telefono'];
	$nombre = $_POST['nombre'];
	$fechanacimiento = $_POST['fe_na'];
	$direccion = $_POST['direccion'];

	$sel = "SELECT count(*) as can FROM clientes WHERE telefono = '$telefono'";

	$ejecutar = mysqli_query($conexion , $sel);

	$data = mysqli_fetch_array($ejecutar);
	//$chequear_telefono = mysqli_num_rows($ejecutar);

	if ($data["can"] > 0 ){
		echo "<div class='alert alert-dismissible alert-warning'><strong>El Numero ya Existe</strong><br>Ingrese otro Numero de Telefono</div>";
		exit();
	}else {
		$insert = "INSERT INTO 	clientes(telefono, nombre, fe_na, direccion) VALUES('$_REQUEST[telefono]','$_REQUEST[nombre]','$_REQUEST[fe_na]','$_REQUEST[direccion]')";
		$ejecutar = mysqli_query($conexion, $insert);
		if($ejecutar){
			echo "<div class='alert alert-dismissible alert-success'><strong>CORRECTO!!</strong><br>El Cliente Fue Registrado</div>";
		}

	}
}
if ($modo == 2) {
	$cuit = $_POST['cuit'];
	$razon_social = $_POST['razon_social'];
	$telefono = $_POST['telefono'];
	$tipo = $_POST['tipo'];
	$fe_in = $_POST['fe_in'];

	$sel = "SELECT count(*) as can FROM Proveedores WHERE CUIT = '$cuit'";

	$ejecutar = mysqli_query($conexion , $sel);

	$data = mysqli_fetch_array($ejecutar);

	if ($data["can"] > 0 ){
		echo "<div class='alert  alert-dismissible alert-warning'><strong>ERROR! El CUIT ya Existe.</strong><br>Ingrese otro CUIT</div>";
		exit();
	}else {
		$insert = "INSERT INTO 	Proveedores(CUIT, razon_social,telefono, tipo, fe_ini) VALUES('$_REQUEST[cuit]','$_REQUEST[razon_social]', '$_REQUEST[telefono]','$_REQUEST[tipo]','$_REQUEST[fe_in]')";
		$ejecutar = mysqli_query($conexion, $insert);
		if($ejecutar){
			echo "<div class='alert alert-dismissible alert-success'><strong>CORRECTO!!</strong><br>El Proveedor Fue Registrado</div>";
		}
	}

}

if($modo == 3){

	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];

	$consulta  = mysqli_query($conexion, "SELECT * FROM productos ORDER BY id_producto DESC");
	$resultado = mysqli_fetch_array($consulta);
	$codProducto = $resultado['id_producto']+1;

	$sql = "INSERT INTO productos (id_producto,descripcion,precio) VALUES ('$codProducto','$descripcion','$precio')";
	$insertar = mysqli_query($conexion,$sql) or die ("No se pudo inserar el registro");

}

if ($modo == 4) {

	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];
	$udm = $_POST['udm'];

	$sql = "INSERT INTO insumos (desc_insumo, udm, precio_compra, baja_logica) VALUES ('$descripcion', '$udm','$precio', '1')";

	$insertar = mysqli_query($conexion,$sql) or die ("No se pudo inserar el registro");
	if($insertar){
		echo "<div class='alert alert-dismissible alert-success'><strong>CORRECTO!!</strong><br>El Proveedor Fue Registrado</div>";
	}
}



?>
