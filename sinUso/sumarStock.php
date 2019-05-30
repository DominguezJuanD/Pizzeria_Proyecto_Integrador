<?
include "conectarDB.php";
$conn = conectarDB();
$id = $_REQUEST['id'];
$cant = $_REQUEST['cant']
$sql = "UPDATE stock_insumos SET cantidad = cantidad + '$cant' WHERE id_insumo = '$id'";
$conn->query($sql)
$conn->close();
?>