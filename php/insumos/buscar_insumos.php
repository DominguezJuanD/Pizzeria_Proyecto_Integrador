<?php
include("../conexion.php");


$salida ="";
$query = "SELECT i.*, u.desc_udm FROM insumos as i inner join udm as u on i.udm = u.id_udm WHERE baja_logica = '1'";

if(isset($_POST['consulta'])){
	$ing = $conexion -> real_escape_string($_POST['consulta']);
	$query = "SELECT i.id_insumo, i.descripcion, u.desc_udm, i.precio_compra, i.cantidad FROM insumos as i inner join udm as u on i.udm = u.id_udm  WHERE descripcion like '%".$ing."%' ";
}

$resultado = $conexion -> query($query);

if($resultado->num_rows > 0){

	$salida .="<table class='tabla_datos table table-striped'>
					<thead>
						<tr>
							<td>ID  Insumos</td>
							<td>Descripcion</td>
							<td>Unidad de Medida</td>
							<td>Cantidad</td>
              <td>Precio de Compra</td>
							<td colspan='3'>  Opciones </td>
						</tr>
					</thead>
					<tbody>";

	while($fila = $resultado -> fetch_assoc()){
		$salida.="<tr>
				<td>".$fila['id_insumo']."</td>
				<td>".$fila['descripcion']."</td>
				<td>".$fila['desc_udm']."</td>
				<td>".$fila['cantidad']."</td>
        <td>$".$fila['precio_compra']."</td>

				<td><a href='../paginas/modificarInsumos.php?id=$fila[id_insumo]' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Editar</a></td>

				<td><a href='../php/insumos/eliminar_insumo.php?id=$fila[id_insumo]' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</a></td>

				</tr>";

	}
	$salida.="</tbody></table>";

}else{
	$salida.= "<div class='alert alert-danger' role='alert'><b>Datos no Encontrados !!!</b></div>";

}

echo $salida;

$conexion -> close();
?>
