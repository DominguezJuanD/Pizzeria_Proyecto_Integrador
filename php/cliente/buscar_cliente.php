<?php
require("../../php/conexion.php");
$salida ="";
$query = "SELECT * FROM persona WHERE baja_logica='1' ";

if(isset($_POST['consulta'])){
	$id = $conexion -> real_escape_string($_POST['consulta']);
	$query = "SELECT id_persona,nombre, telefono, direccion, fec_nac FROM persona WHERE baja_logica = '1' and (nombre like '%".$id."%' or telefono like '%".$id."%' or direccion like '%".$id."%' or fec_nac like '%".$id."%') ";
}

$resultado = $conexion -> query($query);

if($resultado->num_rows > 0){

	$salida .= "
			<table class='tabla_datos table table-striped' id='tabla_datos'>
					<thead>
						<tr>
							<td>ID  Cliente</td>
							<td>Nombre</td>
							<td>Telefono</td>
							<td>Direccion</td>
							<td>Fecha Nacimiento</td>
							<td colspan= '2'>  Opciones </td>
						</tr>
					</thead>
					<tbody>";

	while($fila = $resultado -> fetch_assoc()){
		$salida.="<tr>
				<td>".$fila['id_persona']."</td>
				<td>".$fila['nombre']."</td>
				<td>".$fila['telefono']."</td>
				<td>".$fila['direccion']."</td>
				<td>".date_format(date_create($fila['fec_nac']),'d/m/Y')."</td>

				<td><a href='../paginas/modificar_cliente.php?id=$fila[id_persona]' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Editar</a></td>

				<td><a href='../../cliente/eliminar_cliente.php?id=$fila[id_persona]' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</a></td>

		</tr>";

	}
	$salida.="</tbody></table>";

}else{
	$salida.= "<div class='alert alert-danger' role='alert'><b>Datos no Encontrados !!!</b></div>";

}

echo $salida;


$conexion -> close();
?>
