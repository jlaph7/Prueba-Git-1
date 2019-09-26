<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Registrar incidencia</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>


<body>

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

  <div class="container ">


    <div class="row  justify-content-md-center">
    <div class="alert" id="RegistroMensaje"></div>
      <form class="col col-md-8 col-lg-6" enctype="multipart/form-data">
        <div class="d-flex justify-content-center mt-4">
          <h2>Registrar incidencia</h2>
        </div>

        <div class="form-group">
          <input type="hidden" name="idUsuario" id="idUsuario" value="5">
          <label for="exampleFormControlInput1">Título</label>
          <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descripción</label>
          <textarea class="form-control" id="txtaDescripcion" name="txtaDecripcion" rows="3"></textarea>
        </div>
        <div class="d-flex flex-column">


          <div class="input-group mt-2 ">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="nuevaFoto" id="nuevaFoto">
              <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Selecciona una imagen</label>
            </div>
          </div>

          <!-- ENTRADA FOTO  -->
          <div class="d-flex flex-column my-3 justify-content-center">
            <div>
              <img src="images/default/anonymous.png" class="img-thumbnail previsualizar w-50" id="previsualizar">
            </div>
            <div class="custom-file">
              <p class="help-block">Peso máximo de la foto 100MB</p>
            </div>

          </div>


        </div>


        <div class="d-flex w-auto mb-5" style="height: 25rem;">
          <div class="w-100  rounded-lg border" id="map"></div>
          <p id="plat" hidden>
          </p>
          <p id="plng" hidden>
          </p>
        </div>
        <div class="d-flex mb-5 ">
          <!-- <button type="submit" class="ml-auto btn btn-primary">Guardar incidencia</button> -->
          <button type="button" id="btnCrearIncidencia" class="btn btn-primary btn-block"> Crear Incidencia </button>
        </div>

      </form>
    </div>


  </div>
  <!-- /.container -->


  <!-- Footer -->
  <footer class="py-5 bg-footer">
    <!-- bg-dark-->
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Google maps -->
  <script src="js/maps.js"></script>
  <script src="js/incidencia.js"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTkoeJJrsOvPo42V_ZbVhRb3uvunNPJ2k&callback=initMap">
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script src="js/incidencia.js"></script>

</body>

</html>