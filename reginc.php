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
  <script src="js/maps.js"></script>
</head>


<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-header fixed-top">
    <!-- bg-dark-->
    <div class="container">

      <img class="logo" img src="https://img.elcomercio.pe/bundles/appcms/images/elcomercio/logo_ec.png?1568233897"
        alt="">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link" href="reg_inc.html">Reportar</a>
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
  <div class="container ">
    <div class="row  justify-content-md-center">
      <form class="col-12 col-lg-8">
        <div class="form-group">
          <label for="exampleFormControlInput1">Título</label>
          <input type="email" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descripción</label>
          <textarea class="form-control" id="txtaDescripcion" name="txtaDecripcion" rows="3"></textarea>
        </div>
        <div class="row">

          <!-- <div class="col-md-4 mb-1">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
          </div> -->
          <div class="input-group mb-5 px-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="fileVideo" id="fileVideo">
              
              <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Selecciona un video</label>
              
            </div>

          </div>

        <!-- ENTRADA FOTO  -->

        <div class="input-group mb-5 px-3">
            <div class="custom-file">
                <p class="help-block">Peso máximo de la foto 100MB</p>
            </div>
            <div>
                <img src="images/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>
        </div>
        

        </div>

        

        <div class="row justify-content-md-center w-auto mb-5" style="height: 25rem;">
          <div class="w-100 mx-3" id="map"></div>
        </div>
        <br>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTkoeJJrsOvPo42V_ZbVhRb3uvunNPJ2k&callback=initMap">
        </script>

        <div class="row mb-5 mr-1">
          <div class="ml-auto">
            <a href="#" class="btn btn-call">Registrar</a>
          </div>

        </div>

      </form>
    </div>


  </div>
  <!-- /.container -->




  <!-- Footer -->
  <footer class="py-5 bg-footer">
    <!-- bg-dark-->
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