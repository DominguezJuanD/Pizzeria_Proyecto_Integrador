<!DOCTYPE html>
<html>
<head>
	<title>asd</title>
</head>
<body>
<form method="GET" action="restarStock.php">
id:<input type="text" name="id">
cant:<input type="text" name="mult">
<input type="submit" name="submit">
</form>
</body>
</html>
<?php
include "ListarIngredientes.php";
function restarStock($id,$mult)
{
    $conn = conectarDB();
    $listado = listarIngredientes($id);
    for ($i=0; $i < count($listado); $i++) {
        $id=obtenerIdInsumo($conn,$listado[$i][0]);
        $cant = $listado[$i][1];
        $cantidad = $cant * $mult;
        $sql = "UPDATE stock_insumos SET cantidad = cantidad-'$cantidad' WHERE id_insumo = '$id'";
	    if($conn->query($sql) === TRUE){
		    echo "todo bien<br>";
	    }else{
		    echo "todo mal".$conn->error;
	    }   
    }
    //$conn->close();
}
function obtenerIdInsumo($conn, $descripcion)
{
	$sql = "SELECT id_insumo FROM insumos WHERE desc_insumo = '$descripcion'";
	$result_id = $conn->query($sql)->fetch_assoc();
	$result_id = $result_id['id_insumo'];
	return $result_id;
}

if(isset($_POST['submit'])){
    restarStock($_POST['id'],$_POST['mult']);
}
?>