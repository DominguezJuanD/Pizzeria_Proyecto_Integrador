
<!DOCTYPE html>


<?
include("../php/conexion.php");
session_start();

if (!isset($_SESSION['Id'])) {

    header("Location: ../index.php");
}



?>
<html lang="en" dir="ltr">
  <head>

    <link rel="stylesheet" href="../css/Menu2.css">
    <script src="../librerias/fontawesome-V5/js/all.js"></script>


    <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../librerias/alertifyjs/css/alertify.css">
    <meta charset="utf-8">

    <title>Baloo Pizza</title>

  </head>
  <body>

<!-- ----------------------------------------------------------------ESTILO DE PAGINA -------------------------------------------------------------------------------- -->
  <div class="fijo">
    <b><? echo $_SESSION['Usuario']; ?></b>
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

                    <a href="buscarFacturas.php" > Num. Factura </a>

                    <a href="desdeHastaFactura.php"> Fac. Desde-Hasta </a>

                    <a href="clienteProductoFactura.php"> Cliente - Producto </a>
                  </ul>

              </li>
              <ul class="cerrar">

                <li><button class=" btn btn-warning" onclick="cerrarSesion();"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</button> </li>
            </ul>

          </ul>

        </nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
      </div>
    </div>
    <input type="date" id="ffecha" style="display:none" value="<?php echo date('Y-m-d',time());?>"/> <!-- de aca saco la fecha para comprar -->
    <div class="contenido"></div>
    <span class="usuario"><b>Bienvenido: <? echo $_SESSION['Nombre']?>[<?echo $_SESSION['Id']?>]</b></span>
<!-- ----------------------------------------------------------------ESTILO DE PAGINA -------------------------------------------------------------------------------- -->


<!-- aca estan todos los js que se nececitan para las paginas  -->
  <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../librerias/alertifyjs/alertify.min.js"></script>
  <!-- <script type="../librerias/alertifyjs/css/alertify.css"></script> -->
  <script src="../js/funciones.js"></script>
  <script src= "../js/funciones_factura.js"></script>
  </body>
</html>
