<?php
require("../conexion.php");
$salida ="";
$query = "SELECT * FROM proveedores WHERE baja_logica = '1'";

if(isset($_POST['consulta'])){
	$id = $conexion -> real_escape_string($_POST['consulta']);
	$query = "SELECT id_proveedor,CUIT, razon_social ,telefono, tipo, fe_ini FROM proveedores WHERE baja_logica ='1' and (razon_social like '%".$id."%' or telefono like '%".$id."%' or CUIT like '%".$id."%' or fe_ini like '%".$id."%')  ";
}

$resultado = $conexion -> query($query);

if($resultado->num_rows > 0){

	$salida .= "<table class='tabla_datos table table-striped'>
					<thead>
						<tr>
							<td>ID  Proveedor</td>
							<td>CUIT</td>
							<td>Razon Social</td>
							<td>Telefono</td>
							<td>Tipo</td>
							<td>Fecha Inicio</td>
							<td colspan= '2'>  Opciones </td>
						</tr>
					</thead>
					<tbody>";

	while($fila = $resultado -> fetch_assoc()){
		$salida.="<tr>
				<td>".$fila['id_proveedor']."</td>
				<td>".$fila['CUIT']."</td>
				<td>".$fila['razon_social']."</td>
				<td>".$fila['telefono']."</td>
				<td>".$fila['tipo']."</td>
				<td>".date_format(date_create($fila['fe_ini']),'d/m/Y')."</td>

				<td><a href='../paginas/modificarProveedores.php?id=$fila[id_proveedor]' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Editar</a></td>

				<td><a href='eliminar_proveedores.php?id=$fila[id_proveedor]' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</a></td>

		</tr>";

	}
	$salida.="</tbody></table>";

}else{
	$salida.= "<div class='alert alert-danger' role='alert'><b>Datos no Encontrados !!!</b></div>";

}

echo $salida;

$conexion -> close();
?>
