<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../vendor/bootstrap/js/bootstrap.js" rel="stylesheet">
	 <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	 <link href="../css/business-frontpage.css" rel="stylesheet">	 
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Incidencias</title>
</head>



<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-header fixed-top">
        <!-- bg-dark-->
        <div class="container">
            <a class="navbar-brand" href="#">Titulo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="inicio.html">Inicio
              <span class="sr-only">(current)</span>
            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reg_inc.html">Registrar Incidencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mis incidencias</a>
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
                    <h1 class="display-4 text-black mt-4 mb-2">Incidencias</h1>

                </div>
            </div>
        </div>
    </header>
<body>

<div class="container">


    <!-- Body -->
    <div class="container">


        <!-- /.row -->
        <div class="row" id="incidencias_row">

            
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->


</div>
<!--container end.//-->
<script src="../js/incidencia.js"></script>
<script type="text/javascript">
		window.onload = MostrarIncidencia();
	</script>
</body>
</html>