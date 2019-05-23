<?php
	@session_start();
	@session_destroy();
	echo "Se ha cerrado sesion";
	echo "<script> window.location = 'index.php'; </script>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1"/>
	<meta redirect/>
	<title>Cerrando Sesion...</title>
</head>
<body>
</body>
</html>