<?php
require("../conexion.php");
$salida ="";
$query = "SELECT * FROM persona WHERE baja_logica = '1' and id_tipo_persona = '1'";

if(isset($_POST['consulta'])){
	$id = $conexion -> real_escape_string($_POST['consulta']);
	$query = "SELECT * FROM persona WHERE id_tipo_persona = '1' and baja_logica ='1' and (nombre like '%".$id."%' or telefono like '%".$id."%' or cuit like '%".$id."%'  or direccion like '%".$id."%')  ";
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
				<td>".$fila['id_persona']."</td>
				<td>".$fila['cuit']."</td>
				<td>".$fila['nombre']."</td>
				<td>".$fila['telefono']."</td>
				<td>".$fila['direccion']."</td>
				<td>".date_format(date_create($fila['fec_nac']),'d/m/Y')."</td>

				<td><a href='../paginas/modificarProveedores.php?id=$fila[id_persona]' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Editar</a></td>

				<td><a href='../php/proveedores/eliminar_proveedores.php?id=$fila[id_persona]' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</a></td>

		</tr>";

	}
	$salida.="</tbody></table>";

}else{
	$salida.= "<div class='alert alert-danger' role='alert'><b>Datos no Encontrados !!!</b></div>";

}

echo $salida;

$conexion -> close();
?>
