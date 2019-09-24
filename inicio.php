<?php
session_start();
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Business Frontpage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>


<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-header fixed-top"> <!-- bg-dark-->
    <div class="container">

      <img class="logo" img src="https://img.elcomercio.pe/bundles/appcms/images/elcomercio/logo_ec.png?1568233897"  alt="">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="inicio.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reg_inc.php">Reportar</a>
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
  <header class="bg-primary py-4 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-4 mb-2"></h1>

        </div>
      </div>
    </div>
  </header>


  <!-- Body -->
 <div class="container">


    <!-- /.row -->

   <div class="row">
      <div class="col-md-12 mb-5">
        <div class=" card h-100">
            
    <div class="row" style="  margin-right: 15px; margin-left: 15px;">
          <div class="col-md-8 card-body">
            <h4 class="card-title"> </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
          </div>

          <div class="col-md-4 card-body">
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
          </div>

    </div>

          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

       <div class="col-md-12 mb-5">
        <div class=" card h-100">
            
    <div class="row" style="  margin-right: 15px; margin-left: 15px;">
          <div class="col-md-8 card-body">
            <h4 class="card-title"> </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
          </div>

          <div class="col-md-4 card-body">
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
          </div>

    </div>

          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>




<?php

  include ("conexion.php");
     $consulta="select * from ";
  $query=mysqli_query($conexion, $consulta); 

  while ($f=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
  ?>

 <!--
   <div class="producto">
   <center>
    <img src="images/<?php echo $f['imagen'];?>">


    <br>
    <span><?php echo $f['nombre'];?></span><br><br>
     
    <a href="./inicio.php?id=<?php echo $f['idb'];?>">ver</a>
   </center>
  </div>-->

  <div class="row">
      <div class="col-md-12 mb-5">
        <div class=" card h-100">
            
    <div class="row" style="  margin-right: 15px; margin-left: 15px;">
          <div class="col-md-8 card-body">
            <h4 class="card-title"> </h4>
            <p class="card-text"> <?php echo $f['descripcion'];?> </p>
          </div>

          <div class="col-md-4 card-body">
          <img class="card-img-top" src="images/<?php echo $f['imagen'];?>" alt="">
          </div>

    </div>

          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

 <?php
  }
 ?>﻿  
    



    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->




  <!-- Footer -->
  <footer class="py-4 bg-footer"  style="padding-top: -1rem !important; padding-bottom: -1rem !important;">  <!-- bg-dark-->
    <div class="container">
      <p class="m-0 text-center text-white"></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
