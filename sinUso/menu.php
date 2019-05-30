<?php
	//
	// @session_start();
	//
	// //include 'serv.php';
	//
	// if (@isset($_SESSION['user'])){
		?>

<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1"/>

		<meta redirect/>

		<title>Baloo Pizzeria</title>

		<link rel="stylesheet" href="css/menu.css">

		<link rel="stylesheet" href="css/ventanas_modales.css">

		<link rel="icon" type="image/png" href="img/icon3.png" />
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="js/ventanas_modales.js"></script>


<!-- 		<style>
			#overlay {
		    position: fixed;
		    display: none;
		    width: 100%;
		    height: 100%;
		    top: 5%;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    background-color: rgba(0,0,0,0.5);
		    z-index: 2;
		    cursor: pointer;
		}
		</style>

 -->
 <!-- ------------------SCRIPT PARA LAS VENTANAS MODALES------------ -->
<!--  		<script type="text/javascript">
 // -------------------------ESTO ES PARA LA VENTANA CLEINTES-----------
// 	 		$(document).on("ready", function(){
// 				$("#mostrar-modal").on("click", function(){
// 					$("#modal").addClass("mostrar-modal");
// 				});

// 				$("#cerrar-modal").on("click", function(){
// 					$("#modal").removeClass("mostrar-modal");
// 				});
// 			});
// // -------------------------ESTO ES PARA LA VENTANA PROVEEDORES-----------
// 	 		$(document).on("ready", function(){
// 				$("#mostrar-modal2").on("click", function(){
// 					$("#modal2").addClass("mostrar-modal");
// 				});

// 				$("#cerrar-modal2").on("click", function(){
// 					$("#modal2").removeClass("mostrar-modal");
// 				});
// 			})
// // -------------------------ESTO ES PARA LA VENTANA LISTA_CLIENTE-----------
// 	 	// 	$(document).on("ready", function(){
// 			// 	$("#mostrar-lista_cliente").on("click", function(){
// 			// 		$("#modal2").addClass("mostrar-modal");
// 			// 	});

// 			// 	$("#cerrar-modal2").on("click", function(){
// 			// 		$("#modal2").removeClass("mostrar-modal");
// 			// 	});
// 			// })
// // -------------------------ESTO ES PARA LA VENTANA PRODUCTOS-----------
// 	 		$(document).on("ready", function(){
// 				$("#mostrar-producto").on("click", function(){
// 					$("#producto").addClass("mostrar-modal");
// 				});

// 				$("#cerrar-producto").on("click", function(){
// 					$("#producto").removeClass("mostrar-modal");
// 				});
// 			})
	 	</script> -->

	</head>
	<body>

		<?php
			
			if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'ANDROID')||strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'MOBILE')){

				echo '<body  style="background-color:LightCyan">';

			}else{

				echo '<body  background = "fondo1.jpg">';

			}

		?>



			<div id="header">

				<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->

					<ul class="nav">

						<li><a href="menu.php">Inicio</a></li>

						<li><a style="cursor:hand">Clientes</a>

							<ul>


							<a href="#" id="mostrar-modal">A.B.M Cliente</a>
	<!--
								<li><a onclick="on()" style="cursor:hand" >A.B.M. Clientes</a></li>

								<div id="overlay" onclick="off()" align="center">
	      							<iframe src="cliente.php" style="width: 40%; height: 80%" name="formularios"></iframe>
								</div> -->

								<li><a href="#" id="mostrar-listaCliente">Listado de Clientes</a></li>


									<!--<ul>

										<li><a href="">Submenu1</a></li>

										<li><a href="">Submenu2</a></li>

										<li><a href="">Submenu3</a></li>

										<li><a href="">Submenu4</a></li>

									</ul>-->

							</ul>

						</li>

						<li><a style="cursor:hand">Proveedores</a>

							<ul>


								<a href="#" id="mostrar-modal2">A.B.M Proveedores </a>

								<li><a href="#" id="mostrar-listaProveedores">Listado de Proveedores</a></li>
								<!-- <li><a onclick="on()" style="cursor:hand">A.B.M. Proveedores</a></li>

								<div id="overlay" onclick="off()" align="center">
	      							<iframe src="car_prov.php" style="width: 40%; height: 80%" name="formularios"></iframe>
								</div> -->

								<!--<li><a href="">Submenu3</a></li>

								<li><a href="">Submenu4</a></li>-->


							</ul>

						</li>
						<li><a style="cursor:hand">Productos</a>

							<ul>


								<a href="#" id="mostrar-producto">A.B.M Producto </a>

								<li><a href="#" id="mostrar-listaProducto">Listado de Productos</a></li>


							</ul>

						</li>
						<li><a style="cursor:hand">Insumos</a>

							<ul>

								<a href="#" id="mostrar-insumo">Nuevo Insumo </a>

								<li><a href="#" id="mostrar-lista_insumo">Listado Insumos</a></li>

							</ul>


						</li>

						<li><a style="cursor:hand">Ventas</a>

							<ul>

								<li><a href="factura.php">Nueva Venta</a></li>

								<li><a href="buscar_factura.php">Facturas Emitidas</a></li>

							</ul>


						</li>
						<li><a style="cursor:hand">Compras</a>

							<ul>

								<a href="#" id="mostrar-compras">Nueva compra </a>

							</ul>


						</li>
						<li><a href="cerrarSesion.php">Cerrar Sesion</a></li>

					</ul>

				</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->

			</div>
	<!-- 		<script>
			function on() {
			    document.getElementById("overlay").style.display = "block";
			}

			function one() {
			    document.getElementById("overlay").style.display = "block";
			}

			function off() {
			    document.getElementById("overlay").style.display = "none";
			}
			</script> -->
		<!-- // -------------------------ESTO ES PARA LA VENTANA CLIENTES----------- -->
		    <div id="modal">
				<a href="#" id="cerrar-modal">
					<span>X</span>
				</a>
		     	<div class="contenido" align="center">
		     		<iframe src="cliente.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
		<!-- // -------------------------ESTO ES PARA LA VENTANA PROVEEDORES----------- -->
		    <div id="modal2">
				<a href="#" id="cerrar-modal2">
					<span>X</span>
				</a>
		     	<div class="contenido2" align="center">
		     		<iframe src="proveedores.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
		<!-- // -------------------------ESTO ES PARA LA VENTANA PRODUCTOS----------- -->
		    <div id="producto">
				<a href="#" id="cerrar-producto">
					<span>X</span>
				</a>
		     	<div class="contenido_producto" align="center">
		     		<iframe src="productos.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>

		<!-- // -------------------------ESTO ES PARA LA VENTANA LISTA_CLIENTE----------- -->
		    <div id="listaCliente">
				<a href="#" id="cerrar-listaCliente">
					<span>X</span>
				</a>
		     	<div class="contenido_listaCliente" align="center">
		     		<iframe src="/cliente/lista_cliente.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
		<!-- // -------------------------ESTO ES PARA LA VENTANA LISTA_PRODUCTO----------- -->
		    <div id="listaProducto">
				<a href="#" id="cerrar-listaProducto">
					<span>X</span>
				</a>
		     	<div class="contenido_listaProducto" align="center">
		     		<iframe src="/productos/lista_producto.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
<!-- 		// -------------------------ESTO ES PARA LA VENTANA Insumo----------- -->
 		     	<div id="insumo">
				<a href="#" id="cerrar-insumo">
					<span>X</span>
				</a>
		     	<div class="contenido_insumo" align="center">
		     		<iframe src="/compras/compras.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
<!-- 		// -------------------------ESTO ES PARA LA VENTANA Insumo-----------
 -->		 	    <div id="lista_insumo">
				<a href="#" id="cerrar-lista_insumo">
					<span>X</span>
				</a>
		     	<div class="contenido_lista_insumo" align="center">
		     		<iframe src="/compras/lista_insumos.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>

<!-- 		// -------------------------ESTO ES PARA LA VENTANA lista-proveedores----------- -->
 		     	<div id="listaProveedores">
				<a href="#" id="cerrar-listaProveedores">
					<span>X</span>
				</a>
		     	<div class="contenido_proveedores" align="center">
		     		<iframe src="/proveedores/lista_proveedores.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
			 <!-- 		// -------------------------ESTO ES PARA LA VENTANA COMPRAS----------- -->
 		     	<div id="compras">
				<a href="#" id="cerrar-compras">
					<span>X</span>
				</a>
		     	<div class="contenido_compras" align="center">
		     		<iframe src="compra_insumo.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
	</body>

</html>

<?php

// }else{
//
// 	echo "<script> window.location = 'index.php'; </script>";
//
// }

?>
