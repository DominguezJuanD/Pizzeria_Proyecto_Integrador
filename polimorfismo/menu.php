
<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1"/>

		<meta redirect/>

		<title>Polimorfosmico Eventos</title>

		<link rel="stylesheet" href="menu.css">

		<link rel="stylesheet" href="ventanas_modales.css">
		<link rel="icon" type="image/png" href="icon4.png" />
<!-- 		<link rel="icon" type="image/png" href="vehiculoicon.ico" />-->
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="/js/ventanas_modales.js"></script>


	</head>
	<body>

		<?php

			if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'ANDROID')||strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),'MOBILE')){

				echo '<body  style="background-color:LightCyan">';

			}else{

				echo '<body  background = "catering.jpg">';

			}

		?>



			<div id="header">

				<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->

					<ul class="nav">

						<li><a href="menu.php">Inicio</a></li>

						<li><a style="cursor:hand">Devoluciones</a>

							<ul>


							<a href="#" id="mostrar-modal">Devoluciones</a>
	<!--
								<li><a onclick="on()" style="cursor:hand" >A.B.M. Clientes</a></li>

								<div id="overlay" onclick="off()" align="center">
	      							<iframe src="cliente.php" style="width: 40%; height: 80%" name="formularios"></iframe>
								</div> -->

								<!-- <li><a href="#" id="mostrar-listaCliente">Listado de Clientes</a></li> -->


									<!--<ul>

										<li><a href="">Submenu1</a></li>

										<li><a href="">Submenu2</a></li>

										<li><a href="">Submenu3</a></li>

										<li><a href="">Submenu4</a></li>

									</ul>-->

							</ul>

						</li>

<!-- 						<li><a style="cursor:hand">Proveedores</a>

							<ul>


								<a href="#" id="mostrar-modal2">A.B.M Proveedores </a>
								<li><a onclick="on()" style="cursor:hand">A.B.M. Proveedores</a></li>

								<div id="overlay" onclick="off()" align="center">
	      							<iframe src="car_prov.php" style="width: 40%; height: 80%" name="formularios"></iframe>
								</div>

								<!--<li><a href="">Submenu3</a></li>

								<li><a href="">Submenu4</a></li>-->


							<!-- </ul> -->

						</li> 
						<li><a style="cursor:hand">Registro</a>

							<ul>


								<a href="#" id="mostrar-producto">Nuevo Registro </a>

								<!-- <li><a href="#" id="mostrar-listaProducto">Listado de Productos</a></li> -->


							</ul>

						</li>

						<li><a style="cursor:hand">Reservas</a>

							<ul>

								<li><a href="#" id="mostrar-listaCliente">Nueva Reserva</a></li>

								<!-- <li><a href="/polimorfismo/devolucion/devolucion.php">Devoluciones</a></li> -->

								<!--<li><a href="">Submenu3</a></li>

								<li><a href="">Submenu4</a></li>-->

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
		     		<iframe src="/polimorfismo/devolucion/devolucion.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
		<!-- // -------------------------ESTO ES PARA LA VENTANA RESERVA----------- -->
		    <div id="modal2">
				<a href="#" id="cerrar-modal2">
					<span>X</span>
				</a>
		     	<div class="contenido2" align="center">
		     		<iframe src="reserva.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
		<!-- // -------------------------ESTO ES PARA LA VENTANA NUEVOS REGISTROS----------- -->
		    <div id="producto">
				<a href="#" id="cerrar-producto">
					<span>X</span>
				</a>
		     	<div class="contenido_producto" align="center">
		     		<iframe src="nuevo.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>
			
		<!-- // -------------------------ESTO ES PARA LA VENTANA DEVOLUCION----------- -->
		    <div id="listaCliente">
				<a href="#" id="cerrar-listaCliente">
					<span>X</span>
				</a>
		     	<div class="contenido_listaCliente" align="center">
		     		<iframe src="/polimorfismo/reserva.php" style="width: 80%; height: 90%" ></iframe>
		     	</div>
			 </div>

	</body>

</html>

