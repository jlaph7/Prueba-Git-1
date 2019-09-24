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
          <li class="nav-item ">
            <a class="nav-link" href="inicio.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
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
  <header class="bg-primary py-1 mb-1">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-5 text-white mt-4 mb-2"></h1>

        </div>
      </div>
    </div>
  </header>


  <!-- Body -->
 <div class="container">

  <form>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="row">
    <div class="col-md-4 mb-5" >
          <label for="exsampleFormControlTextarea1">Foto o video</label>
        </br>
            <a href="#" class="btn btn-primary">Subir</a>
          </div>
    <div class="col-md-4 mb-5" >
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
    </div>
        <div class="col-md-4 mb-5" >
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
  </div>
   </div>
     <div class="row  justify-content-end" style="height: 50px; margin-bottom: 1rem; margin-right: 1rem" >
          <div class="col-lg-1" >
      <a href="#" class="btn btn-call" >Registrar</a>

    </div>

  </div>

</form>

</div>
  <!-- /.container -->




  <!-- Footer -->
  <footer class="py-5 bg-footer">  <!-- bg-dark-->
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>