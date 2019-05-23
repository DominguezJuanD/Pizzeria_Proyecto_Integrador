<?php
require("../conexion.php");


$salida ="";
$query = "SELECT * FROM productos ORDER By id_producto";

if(isset($_POST['consulta'])){
	$ing = $conexion -> real_escape_string($_POST['consulta']);
	$query = "SELECT id_producto, precio, descripcion FROM productos WHERE descripcion like '%".$ing."%' ";
}

$resultado = $conexion -> query($query);

if($resultado->num_rows > 0){

	$salida .= "<table class='tabla_datos table table-striped'>
					<thead>
						<tr>
							<td>ID  Producto</td>
							<td>Descripcion</td>
							<td>Precio</td>
							<td colspan= '3'>  Opciones </td>
						</tr>
					</thead>
					<tbody>";

	while($fila = $resultado -> fetch_assoc()){
		$salida.="<tr>
				<td>".$fila['id_producto']."</td>
				<td>".$fila['descripcion']."</td>
				<td>".$fila['precio']."</td>

				<td><a href='../paginas/modificarProductos.php?id=$fila[id_producto]' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Editar</a></td>

				<td><a href='../paginas/altaReceta.php?id=$fila[id_producto]&desc=$fila[descripcion]' class='btn btn-info btn-sm'><i class='fas fa-edit'></i> Receta</a></td>

				<td><a href='../php/productos/eliminar_producto.php?id=$fila[id_producto]' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</a></td>

		</tr>";

	}
	$salida.="</tbody></table>";

}else{
	$salida.= "<div class='alert alert-danger' role='alert'><b>Datos no Encontrados !!!</b></div>";

}

echo $salida;
echo $msj;

$conexion -> close();
?>
