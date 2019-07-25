
<?
include("../php/conexion.php");
include("Menu2.php");
session_start();

if (!isset($_SESSION['Id'])) {

    header("Location: ../index.php");
}



?>
<style>
  body{

    background-image: url('../img/fondo3.jpg');

    background-position: center center;
    background-repeat: no-repeat;
    background-Attachment:fixed;

    /* -webkit-background-size: cover; */
    /* -moz-background-size: cover; */
    /* -o-background-size: cover; */
    background-size: cover;
    }
</style>
<body >
  <div class="contenido">

  </div>
  <img class="fondo"/>

</body>
