<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registrar incidencia</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">
  <!-- Google maps -->
  <link href="css/maps.css" rel="stylesheet">


</head>


<body>
<?php
$actual = explode("/",strrev($_SERVER['PHP_SELF']), -1);
$actual = strrev($actual[0]);
?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-header fixed-top">
    <!-- bg-dark-->
    <div class="container">

      <img class="logo" img src="https://img.elcomercio.pe/bundles/appcms/images/elcomercio/logo_ec.png?1568233897" alt="">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="inicio.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="reg_inc2.php" <?php if ($actual == "reg_inc2.php") echo "class='actual'"; ?>>Reportar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Perfil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Header -->

  <!-- py ..bottom || mt ..top -->
  <header class="bg-primary py-1 mb-1">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-5 text-white mt-4 mb-2"></h1>

        </div>
      </div>
    </div>
  </header>


</html>