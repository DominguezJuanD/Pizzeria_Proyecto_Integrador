<?php
  include("conexion.php");
  $boton = $_POST['Boton'];

  switch($boton){

    case 'buscarFacturas':
      $numFactura = $_POST['numFactura'];
      $puntoVenta = $_POST['puntoVenta'];
      $tipo_factura = $_POST['tipofactura'];
      $tipoComp = $_POST['tipoComp'];
      $tabla = array();
      $result = mysqli_query($conexion,"SELECT *  FROM encabezadofactura
                                        WHERE tipComprob = '$tipoComp' and puntoVenta = '$puntoVenta' and numComprob = '$numFactura' and tipoCompraVenta = '$tipo_factura' ");

        while( $fila = $result -> fetch_assoc()){
          $salida.="
          <tr bgcolor='white'>
          <td style='width:10%'>".$fila['tipComprob']."</td>
          <td style='width:50%'>".zero_fill($fila['puntoVenta'],4)."-".zero_fill($fila['numComprob'],8)."</td>
          <td style='width:10%'>".$fila['usuario_carga']."</td>
          <td style='width:10%'>".date_format(date_create($fila['fechaComprob']),'d/m/Y')."</td>
          <td style='width:10%'>".$fila['total']."</td>
          <td style='width:10%'><input type='button'  value='Ver Detalle' class='btn btn-danger btn-sm' onclick='eliminarFila(".$fila['numFila'].");'/></td></tr>";
          }

          $tabla['tabla'] = $salida;

          echo json_encode($tabla);
      break;

    case 'ingreso_dinero':
      $fecha = $_POST['fecha'];
      $ff= explode("/",$fecha);
      $dinero = $_POST['dinero'];
      $observacion = $_POST['observacion'];
      mysqli_query($conexion, "INSERT INTO IEDinero(numMov, importe, tipo, concepto, fecha) VALUES(NULL,'$dinero','1','$observacion','".$ff[0]."-".$ff[1]."-".$ff[2]."');")  or
       die("Problemas en:".mysqli_error($conexion));
      echo "ok";
      break;

    case 'egreso_dinero':
      $fecha = $_POST['fecha'];
      $ff= explode("/",$fecha);
      $dinero = $_POST['dinero'];
      $observacion = $_POST['observacion'];
      mysqli_query($conexion, "INSERT INTO IEDinero(numMov, importe, tipo, concepto, fecha) VALUES(NULL,'$dinero','2','$observacion','".$ff[0]."-".$ff[1]."-".$ff[2]."');")  or
       die("Problemas en:".mysqli_error($conexion));
      echo "ok";
      break;


// ========================================guardar factura tipo compra insumo ======================================================
    case 'factura_compra_insumo':

      $fecha = date_format(date_create($_POST['fecha']),'Y/m/d');

      $prove = $_POST['cliente_proveedor'];
      $formapago = $_POST['formapago'];
      $tipo_factura = $_POST['tipofactura'];
      $descuento = $_POST['Descuento'];
      $tipoCompraVenta = $_POST['tipoCompraVenta'];//1-venta 2-compra
      $cont=0;

      $query = mysqli_query($conexion,"SELECT cantidad, idProducto, preUnitario, iva FROM detalle_novedad WHERE ventaCompra ='$tipoCompraVenta'");//traigo todo la tabla detalle factura para la carga final

      while($fila = $query -> fetch_assoc()){ //busco todos el pedido que esta en detalle novedad

        $tabla_cant[$cont] = $fila['cantidad'];
        $tabla_id[$cont] = $fila['idProducto'];

        $preTotal = round($fila['preUnitario'] * $fila['cantidad'], 3);
        $totalNetoC+=$preTotal;
        $iva = $fila['iva'];
        $totalC = $totalNetoC +$iva;

        $tabla_preUni[$cont] = $fila['preUnitario'];
        $tabla_preTotal[$cont] = $preTotal;
        $cont++;
      }

      if ($tabla_cant[0] > 0 ){
        $num_factura = ulti_factura($tipoCompraVenta, $tipo_factura);// busco el ultimo numero de factura dependiendo si es compra o venta

        $total = $total - $descuento;
        //el descuento lo hice general y no por producto kbe el chori
        //por ahora agrego 0 al iva, y compro como cons final
        mysqli_query($conexion, "INSERT INTO encabezadofactura (tipComprob, puntoVenta, numComprob, fechaComprob, idCliente, formaPago, subtotal, iva, total, tipoCompraVenta)
        VALUES('$tipo_factura','1','$num_factura','$fecha','$prove','$formapago','$totalNetoC','$iva','$totalC','$tipoCompraVenta')");//1-venta 2-compra

        $idFactura = idFactura($tipo_factura,$num_factura);

        for ($i=0; $i < sizeof($tabla_id); $i++) {
          if ($tabla_id[$i] > 0){
            $resultInsumo = mysqli_query($conexion,"SELECT cantidad FROM insumos WHERE id_insumo ='$tabla_id[$i]'"); //busco el precio del insumo
            $reg_ins = mysqli_fetch_array($resultInsumo);

            $stock_actual = $reg_ins['cantidad'] + $tabla_cant[$i];
            mysqli_query($conexion, "UPDATE insumos SET cantidad = '$stock_actual' WHERE id_insumo = '$tabla_id[$i]'");
            //agregar a detalle factura

            mysqli_query($conexion, "INSERT INTO detallefactura (idFactura, id_producto, cantidad, preUnitario, bonificacion, preTotal)
             VALUES('$idFactura','$tabla_id[$i]','$tabla_cant[$i]',$tabla_preUni[$i],'$descuento','$tabla_preTotal[$i]')");
          };
        };
        echo $num_factura;
      }else {
        echo 0;
      }

      break;
// =================================================================guardar factura tipo venta productos ============================================
      case 'factura_venta_producto':
        $cont=0;
        $fecha = date_format(date_create($_POST['fecha']),'Y/m/d');
        // $ff= explode("/",$fecha);
        $cliente = $_POST['cliente_proveedor'];
        $formapago = $_POST['formapago'];
        $tipo_factura = $_POST['tipofactura'];
        $descuento = $_POST['Descuento'];
        $tipoCompraVenta = $_POST['tipoCompraVenta'];//1-venta 2-compra

        $query = mysqli_query($conexion,"SELECT cantidad, idProducto, preUnitario FROM detalle_novedad WHERE ventaCompra ='$tipoCompraVenta'");

        while($fila = $query -> fetch_assoc()){ //busco todos el pedido que esta en detalle novedad

          $tabla_cant[$cont] = $fila['cantidad'];
          $tabla_id[$cont] = $fila['idProducto'];
          if ($tipo_factura == 'A') {// hago el calculo si es que es fatura A o factura B
            $preTotal = round($fila['preUnitario'] * $fila['cantidad'], 3);
            $totalNeto+=$preTotal;
            $iva = round($totalNeto * 0.21, 3);
          }else{
            $iva = 0;
            $preUnitario = round($fila['preUnitario'] * 1.21, 3);
            $preTotal = $preUnitario * $fila['cantidad'];
            $totalNeto+=$preTotal;

          }
          $tabla_preUni[$cont] = $fila['preUnitario'];
          $tabla_preTotal[$cont] = $preTotal;
          $cont++;
        }
        $total = $totalNeto + $iva;
        if ($tabla_cant[0] > 0 ){
          $num_factura = ulti_factura($tipoCompraVenta, $tipo_factura);

          $total = $total - $descuento;
          //el descuento lo hice general y no por producto kbe el chori
          //por ahora agrego 0 al iva, y compro como cons final
          mysqli_query($conexion, "INSERT INTO encabezadofactura (tipComprob, puntoVenta, numComprob, fechaComprob, idCliente, formaPago, subtotal, iva, total, tipoCompraVenta)
          VALUES('$tipo_factura','1','$num_factura','$fecha','$cliente','$formapago','$totalNeto','$iva','$total','$tipoCompraVenta')");//1-venta 2-compra

          $idFactura = idFactura($tipo_factura,$num_factura);

          for ($i=0; $i < sizeof($tabla_id); $i++) {
            if ($tabla_id[$i] > 0){
              $contRes = 0;
              $insumoReceta = mysqli_query($conexion,"SELECT r.id_insumo, r.cantidad as cantidadRes, i.cantidad as cantidadIns
                                                      FROM recetas  as r inner join insumos as i on r.id_insumo = i.id_insumo
                                                      where r.id_producto  ='$tabla_id[$i]'"); //busco el precio del insumo

              while($reg_res = $insumoReceta -> fetch_assoc()){

                $cantTotal = $reg_res['cantidadRes'] * $tabla_cant[$i]; //multiplico cantidad de insumo de la receta x cantidad de productos comprados
                $cantResta[sizeof($cantResta)] =  $reg_res['cantidadIns'] - $cantTotal; //resto del stock de insumos la catidad que usa los productos que se vendieron
                $arrayId_insumo[sizeof($arrayId_insumo)] = $reg_res['id_insumo'];
              }

              for ($i=0; $i < sizeof($cantResta); $i++) {
                mysqli_query($conexion, "UPDATE insumos SET cantidad = '$cantResta[$i]' WHERE id_insumo = '$arrayId_insumo[$i]'");
              }

              //agregar a detalle factura
              //existe info redundante respecto a la fecha, y total del importe total por productos ya que estos se encuentran en el encabezado
              mysqli_query($conexion, "INSERT INTO detallefactura (idFactura, id_producto, cantidad, preUnitario, bonificacion, preTotal)
               VALUES('$idFactura','$tabla_id[$i]','$tabla_cant[$i]',$tabla_preUni[$i],'$descuento','$tabla_preTotal[$i]')");
              // or die("Problemas en el select4:".mysqli_error($conexion));
            };
          };
          echo $num_factura;
        }else {
          echo 0;
        };
        break;

// =================================================================guardar factura tipo venta-compra NOVEDAD ============================================
        case 'facturaNovedad':
          $option = $_POST['option'];
          $tipoCompraVenta = $_POST['tipoCompraVenta'];
          if ($option == '1') {
            $array = array();
            $cliente = $_POST['cliente_proveedor'];
            $formapago = $_POST['formapago'];
            $cant= $_POST['cant'];
            $idProducto=$_POST['idProducto'];
            $preUnitario = $_POST['preUnitario'];
            $tipo_factura = $_POST['tipofactura'];
            $ivaC = $_POST['ivaC'];
            $id_array = array();
            $cant_array = array();
            if ($cant > 0 ){
              $query = mysqli_query($conexion, "SELECT max(numFila) FROM detalle_novedad WHERE ventaCompra = $tipoCompraVenta");
              $canFila = mysqli_fetch_array($query);
              $canFila= $canFila[0] + 1;
               mysqli_query($conexion,"INSERT INTO detalle_novedad (numfila, idCliente, idProducto,cantidad, preUnitario, iva, formaPago,tipoFactura, ventaCompra)
               VALUES ('$canFila','$cliente','$idProducto','$cant','$preUnitario', '$ivaC', '$formapago','$tipo_factura','$tipoCompraVenta')");
             }else {
               echo 0;
             };

          }else{
              $nfila = $_POST['nfila'];
              mysqli_query($conexion, "DELETE FROM detalle_novedad WHERE numFila = $nfila AND ventaCompra = $tipoCompraVenta");
          };

            $salida ="";
            if ($tipoCompraVenta == '1') {
              $resultProducto = mysqli_query($conexion,"SELECT p.descripcion, dn.* FROM detalle_novedad as dn
                                                                                   INNER JOIN productos as p on dn.idProducto = p.id_producto
                                                                                   WHERE dn.ventaCompra ='$tipoCompraVenta'");
            }else {

              $resultProducto = mysqli_query($conexion,"SELECT i.descripcion, dn.* FROM detalle_novedad as dn
                                                                                   INNER JOIN insumos as i on dn.idProducto = i.id_insumo
                                                                                   WHERE dn.ventaCompra ='$tipoCompraVenta'");
            }

           	while($fila = $resultProducto -> fetch_assoc()){

              $preUnitario = $fila['preUnitario'];

              if ($fila['tipoFactura'] == 'A' && $fila['ventaCompra'] == '1') {
                $preTotal = round($preUnitario * $fila['cantidad'], 3);
                $totalNeto+=$preTotal;
                $iva = round($totalNeto * 0.21, 3);
                $total = $totalNeto + $iva;
              }else if ($fila['tipoFactura'] != 'A' && $fila['ventaCompra'] == '1'){
                $preUnitario = round($preUnitario * 1.21, 3);
                $preTotal = $preUnitario * $fila['cantidad'];
                $total = $totalNeto+=$preTotal;
              }else{
                $preTotal = round($preUnitario * $fila['cantidad'], 3);
                $totalNetoC+=$preTotal;
                $totalC = $totalNetoC +$fila['iva'];
              }

           		$salida.="
              <tr bgcolor='white'>
    					<td style='width:10%'>".$fila['idProducto']."</td>
    					<td style='width:50%'>".$fila['descripcion']."</td>
    					<td style='width:10%'>".$fila['cantidad']."</td>
    					<td style='width:10%'>".$preUnitario."</td>
    					<td style='width:10%'>".$preTotal."</td>
    					<td style='width:10%'><input type='button'  value='Eliminar' class='btn btn-danger btn-sm' onclick='eliminarFila(".$fila['numFila'].");'/></td></tr>";
              $nfila++;
              $id_array[$nfila] = $fila['idProducto'];
              $cant_array[$nfila] = $fila['cantidad'];
           	}

            $array['tabla_id'] = $id_array;
            $array['tabla_cant']= $cant_array;
            $array['tabla'] = $salida;
            $array['totalneto'] = $totalNeto;
            $array['iva'] = $iva;
            $array['total'] = $total;

            $array['ivaC'] = $ivaC;
            $array['preTotalC'] = $preTotal;
            $array['totalnetoC'] = $totalNetoC;
            $array['totalC'] = $totalC;

            echo json_encode($array);
        break;

// =================================================================guardar Retas ============================================
        case 'altaRecetas':
          $option = $_POST['option'];
          $idProducto=$_POST['idProducto'];

          if ($option == '1') {
            $cant= $_POST['cant'];
            $idInsumo = $_POST['id_insumo'];
            if ($cant > 0 ){
              $query = mysqli_query($conexion, "SELECT max(id_ingrediente) FROM recetas WHERE id_producto = '$idProducto'");
              $canFila = mysqli_fetch_array($query);
              $canFila= $canFila[0] + 1;
               mysqli_query($conexion,"INSERT INTO recetas (id_ingrediente, id_producto, id_insumo,cantidad)
               VALUES ('$canFila','$idProducto','$idInsumo','$cant')");
             }

          }else{
              $nfila = $_POST['nfila'];
              mysqli_query($conexion, "DELETE FROM recetas WHERE id_ingrediente = $nfila");
          };

            $salida ="";
            $resultProducto = mysqli_query($conexion,"SELECT i.descripcion, r.* FROM recetas as r INNER JOIN insumos as i on r.id_insumo = i.id_insumo WHERE r.id_producto ='$idProducto'");

           	while($fila = $resultProducto -> fetch_assoc()){
           		$salida.="
              <tr bgcolor='white'>
    					<td style='width:10%'>".$fila['id_insumo']."</td>
    					<td style='width:50%'>".$fila['descripcion']."</td>
    					<td style='width:10%'>".$fila['cantidad']."</td>
    					<td style='width:10%'><input type='button'  value='Eliminar' class='btn btn-danger btn-sm' onclick='eliminarFila(".$fila['id_ingrediente'].");'/></td></tr>";
           	}

            $array['tabla'] = $salida;

            echo json_encode($array);
        break;

// ===============================================================================================================================================================================================
    case 'factura_ya':

      $ulti = $_POST['num'];
      $registros=mysqli_query($conexion,"SELECT * FROM encabezadoFactura WHERE numComprob = '$ulti' AND tipoCompraVenta = '2';") or
          die("Problemas en el select:".mysqli_error($conexion));
      if($reg_factura=mysqli_fetch_array($registros))
      {
        $registros=mysqli_query($conexion,"SELECT * FROM Proveedores WHERE id_proveedor = '$reg_factura[4]';") or
          die("Problemas en el select:".mysqli_error($conexion));
        $reg_persona=mysqli_fetch_array($registros);

        $registros=mysqli_query($conexion,"SELECT * FROM detalleFactura WHERE numComprob = '$ulti' AND tipoCompraVenta = '2';") or
          die("Problemas en el select:".mysqli_error($conexion));
        $reg_detalle=mysqli_fetch_array($registros);

        $registros=mysqli_query($conexion,"SELECT desc_insumo FROM insumos WHERE id_insumo = '$reg_detalle[4]';") or
          die("Problemas en el select:".mysqli_error($conexion));
        $reg_prod =mysqli_fetch_array($registros);

        $datos[] = array("tipo" => $reg_factura[4], "numero" => $ulti, "fecha" => $reg_factura[8], "formapago" => $reg_factura[5],
          "nombre_persona" => $reg_persona[2], "direccion" => $reg_persona[4], "cuit" => $reg_persona[5], "cantidad" => $reg_detalle[3], "precio" => $reg_detalle[4], "nombre_producto" => $reg_prod[0],
          "forma_pago" => $reg_factura[5], "direccion_emision" => $reg_factura[11]);
        echo json_encode($datos);
      }else{
        echo FALSE;
      }
      break;


  }

// ===========================================================funcion que busca el ultimo nuemro de factura ==============================================

  function ulti_factura($tipo,$tipoComb){
    include ('conexion.php');
    $registros=mysqli_query($conexion,"SELECT max(numComprob) as ultimo FROM encabezadofactura WHERE tipoCompraVenta = '$tipo' and tipComprob = '$tipoComb'");  //1- venta 2-compra

    $reg = mysqli_fetch_array($registros);
    $ultimo = $reg[0];

    $ultimo += 1;   //aumento en 1 cada vez q llamo//
    return $ultimo;
   }

   function idFactura($tipo_factura, $num_factura){
     include ('conexion.php');
     $queryIdFactura = mysqli_query($conexion," SELECT idFactura FROM encabezadofactura WHERE tipComprob = '$tipo_factura' AND puntoVenta = '1' AND numComprob = '$num_factura'");
     $idFactura = mysqli_fetch_array($queryIdFactura);

     $idFactura = $idFactura[0];

     return $idFactura;
   }

   function zero_fill($valor, $long = 0){
    return str_pad($valor, $long, '0', STR_PAD_LEFT);
  }





$conexion -> close();
 ?>
