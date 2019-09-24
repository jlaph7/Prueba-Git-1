<?php
	require_once '../model/usuario.modelo.php';
	$usuario = new Usuario();
	$identidad[	] = $usuario->Sesion();
	//  Usuario::Sesion();
	

	// var_dump($identidad);
	 var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../vendor/bootstrap/js/bootstrap.js" rel="stylesheet">
     <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Crear Cuenta Comercio</title>
</head>
<body>

<div class="container">



<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 500px;">
	<h4 class="card-title mt-3 text-center">Crear Cuenta</h4>
	<!-- <p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p> -->
	<!-- <p class="divider-text">
        <span class="bg-light">OR</span>
    </p> -->
    <div class="alert" id="RegistroMensaje"></div>
	<form>
    <div id="id"></div>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="txtnombres" id="txtnombres" class="form-control" placeholder="Nombres" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="txtusuario" id="txtusuario" class="form-control"  style="max-width: 500px;" placeholder="Username" type="text">
    </div> <!-- form-group// -->

    <!-- <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 120px;">
		    <option selected="">+971</option>
		    <option value="1">+972</option>
		    <option value="2">+198</option>
		    <option value="3">+701</option>
		</select>
    	<input name="" class="form-control" placeholder="Phone number" type="text">
    </div> form-group// -->
    <!-- <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control">
			<option selected=""> Select job type</option>
			<option>Designer</option>
			<option>Manager</option>
			<option>Accaunting</option>
		</select>
	</div> form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name= "txtpassword" id="txtpassword" class="form-control" placeholder="Password" type="password">
    </div> <!-- form-group// -->
    <!-- <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Repeat password" type="password">
    </div> form-group// -->
    <div class="form-group">
        <button type="button" id="btnCrear" class="btn btn-primary btn-block"> Crear Cuenta  </button>
    </div> <!-- form-group// -->
    <p class="text-center">Have an account? <a href="">Log In</a> </p>
</form>
</article>
</div> <!-- card.// -->

</div>
<!--container end.//-->
<script src="../js/usuario.js"></script>

</body>
</html>