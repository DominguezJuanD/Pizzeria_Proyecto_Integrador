<?php
	include('conexion.php');
	$producto = 3;
	$cantidad = 1;  
	$consulta = mysqli_query($conexion, "SELECT * FROM recetas WHERE id_producto=".$producto);
	$rcount=mysqli_num_rows($consulta);
	$arrayinsumos = array([$rcount],[3]);
	$i = 0;
	while ($resultado = mysqli_fetch_array ($consulta)){
		echo"Id Ingrediente: ".$resultado['id_ingrediente'];
		echo"  Id Insumo: ".$resultado['id_insumo'];
		echo"  Cantidad: ".$resultado['cantidad']."<br>";
		$arrayinsumos[$i][0]=$resultado['id_ingrediente'];
		$arrayinsumos[$i][1]=$resultado['id_insumo'];
		$arrayinsumos[$i][2]=$resultado['cantidad'];
		descontarStockInsumo($conexion,$arrayinsumos[$i][1],$cantidad);
		$i = $i + 1;
	}

	function descontarStockInsumo($conexion,$idInsumo,$cant){
		echo "Insumo: ".$idInsumo."<br>";
		echo "Cantidad: ".$cant."<br>";
		$respuesta = mysqli_query($conexion,"UPDATE stock_insumos SET cantidad=cantidad-$cant WHERE id_insumo = $idInsumo");
		if ($respuesta){
			echo "Anda";
		}else{
			echo "No Anda";
		}
	}
?>