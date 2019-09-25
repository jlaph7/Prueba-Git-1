<?php
include_once("reginc.php");

class ControladorIncidencias{

    /*========================
	REGISTRO DE INCIDENCIA
	========================*/

	static public function ctrCrearIncidencia(){

		if(isset($_POST["txtTitulo"])){
			/*========================
			VALIDAR IMAGEN
			========================*/

			$ruta = "";

			if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

				list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=======================================================
				CREAMOS EL DIRECTORIO DONDE GUARDAMOS LA FOTO DEL USUARIO
				========================================================*/

				$directorio = "images/incidencias/".$_POST["idUsuario"];

				mkdir($directorio, 0755);//permisos de lectura y escritura

				/*=======================================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES PHP
				========================================================*/

				if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

					/*=======================================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					========================================================*/
						
					$aleatorio = mt_rand(100,999);

					$ruta = "images/incidencias/".$_POST["idUsuario"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if ($_FILES["nuevaFoto"]["type"] == "image/png") {

					/*=======================================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					========================================================*/
						
					$aleatorio = mt_rand(100,999);

					$ruta = "image/incidencias/".$_POST["idUsuario"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}
					
			}
			echo $ruta;
			return  $ruta;
			// header("Location: ../view/prueba.php");
			
			/*========================
			FIN VALIDAR IMAGEN
			========================*/
		}
    
        

	}

}
?>