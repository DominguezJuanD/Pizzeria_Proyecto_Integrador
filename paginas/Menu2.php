<?
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <link rel="stylesheet" href="../css/Menu2.css">
    <script src="../librerias/fontawesome-V5/js/all.js"></script>


    <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
    <meta charset="utf-8">

    <title>prueba</title>

  </head>
  <body>
<!-- ----------------------------------------------------------------ESTILO DE PAGINA -------------------------------------------------------------------------------- -->
  <div class="fijo">
      <div class="img"></div>
      <div id="menuH" >
        <nav>
          <ul class="nav">

              <li><a href="Menu2.php"><i class="fas fa-home"></i> Inicio</a></li>

              <li><a href="listarClientes.php" ><i class="far fa-list-alt"></i> A.B.M's</a>

                  <ul>
                    <li><a href="listarClientes.php" ><i class="fas fa-users"></i> Clientes</a></li>

                    <li><a href="listarProveedores.php"><i class="fas fa-store-alt"></i> Proveedores</a></li>

                    <li><a href="listarProductos.php"><i class="fas fa-utensils"></i> Productos</a></li>

                    <li><a href="listarInsumos.php"><i class="fas fa-mug-hot"></i> Insumos</a></li>

                    <!-- <li><a href=""><i class="fas fa-cookie-bite"></i> Recetas</a></li> -->

                  </ul>

              </li>

              <li><a href=""><i class="fas fa-file-invoice-dollar"></i> Facturas</a>
                  <ul>

                    <li><a href="nuevaVenta.php"> Factura Venta</a></li>

                    <li><a href="compra_insumo.php"> Factura Compra</a></li>

                  </ul>

              </li>
              <li><a href=""><i class="fas fa-database"></i> Movimientos</a>

                  <ul>

                    <a href="buscarFacturas.php" id="mostrar-compras"> Num. Factura </a>
                    <a href="buscarFacturas.php" id="mostrar-compras"> Fac. Desde-Hasta </a>

                  </ul>

              </li>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="cerrarSesion.php" class=" btn btn-warning"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a> </li>
            </ul>

          </ul>

        </nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
      </div>
    </div>
    <div class="contenido"></div>
<!-- ----------------------------------------------------------------ESTILO DE PAGINA -------------------------------------------------------------------------------- -->
  </body>
</html>
