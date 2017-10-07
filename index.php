<?php include 'setup/config.php' ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotel California</title>

    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

  </head>
  <body>
    <!-- test -->
    <div class="wrapper">

    <?php if (!isset($_SESSION['nombre_usuario'])) {
      include 'modules/login.php';
    }  else {
    ?>

    <?php include 'modules/header.php' ?>
    <?php include 'modules/aside.php' ?>

      
    <?php
      if ($_GET['cat'] == $seccion) {
        include 'modules/'.$archivo;
      } else {
        include 'modules/reservas.php';
      }
    ?>

    <!-- <footer class="main-footer"></footer> -->

    <?php
    }
    ?>

    </div><!-- wrapper -->


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/ajax-request.js"></script>
    <script src="js/script.js"></script>

    <!-- <script src="js/cargarHabitacion.js"></script> -->

    <script src="js/login.js"></script>
  </body>
</html>