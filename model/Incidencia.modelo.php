<?php

if (isset( $_POST['jsaccion'])) {
    $accion = $_POST['jsaccion'];

    switch ($accion) {
        case 'Guardar':
           echo GuardarIncidencia();
            break;
        case 'Actualizar':
           echo ActualizarIncidencia();
            break;
        case 'Editar':
           echo  EditarIncidencia();
            break;
        case 'Eliminar':
           echo EliminarIncidencia();
            break;
        case 'ListarIncidencia':
           $valor = $_POST['jsid_usuario'];
           if ($valor='null') {
            echo ListarIncidencia(null);
           }else{
            echo ListarIncidencia($valor);
           }
            break;
    }
}

function insertarImagen(){

    // $id_usu = $_POST['jsid_usuario'];
    // $imagen = $_FILES['jsimagen'];
    /*========================
	    VALIDAR IMAGEN
    ========================*/

	$ruta = "";

	if (isset($_FILES['jsimagen']["tmp_name"])) {

		list($ancho, $alto) = getimagesize($_FILES['jsimagen']["tmp_name"]);

		$nuevoAncho = 500;
		$nuevoAlto = 500;

		/*=======================================================
			CREAMOS EL DIRECTORIO DONDE GUARDAMOS LA FOTO DEL USUARIO
		========================================================*/

		$directorio = "../images/incidencias/".$_POST['jsid_usuario'];

		mkdir($directorio, 0755);//permisos de lectura y escritura

		/*=======================================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES PHP
		========================================================*/

		if ($_FILES['jsimagen']["type"] == "image/jpeg") {

			/*=======================================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
			========================================================*/
						
			$aleatorio = mt_rand(100,999);

			$ruta = "../images/incidencias/".$_POST['jsid_usuario']."/".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($_FILES['jsimagen']["tmp_name"]);

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagejpeg($destino, $ruta);

	    }

		if ($_FILES['jsimagen']["type"] == "image/png") {

			/*=======================================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
			========================================================*/
						
		$aleatorio = mt_rand(100,999);

		$ruta = "../images/incidencias/".$_POST['jsid_usuario']."/".$aleatorio.".png";

		$origen = imagecreatefrompng($_FILES['jsimagen']["tmp_name"]);

		$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

		imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

		imagepng($destino, $ruta);


		}

        return $ruta;
					
	}
	/*========================
		FIN VALIDAR IMAGEN
	========================*/
}


function GuardarIncidencia(){
    include_once("../controller/conexion.php");
    
    $id_usu = $_POST['jsid_usuario'];
    $titu = $_POST['jstitulo'];
    $desc = $_POST['jsdescripcion'];
    $lat = $_POST['jslatitud'];
    $lon = $_POST['jslongitud'];
    $imagen = $_FILES['jsimagen'];
    $ruta = insertarImagen();
    
    var_dump(insertarImagen());
    var_dump($id_usu);
    var_dump($titu);
    var_dump($desc);
    var_dump($lat);
    var_dump($lon);
    // var_dump($ruta);

    $sql = 'call sp_CrearIncidencia_2(:id_usu,:titu,:desc,:lat,:lon,:ruta)';
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(":id_usu", $id_usu);
    $stmt->bindParam(":titu", $titu);
    $stmt->bindParam(":desc", $desc);
    $stmt->bindParam(":lat", $lat);
    $stmt->bindParam(":lon", $lon);
    $stmt->bindParam(":ruta", $ruta);
    if ($stmt->execute()) {
        $resp = 1;
    } else {
        $resp = 0;
    }

    $stmt = null;
    $cnx = null;

    $resp=1;
    return $resp;
}

function ActualizarIncidencia()
{
    include_once("../controller/conexion.php");
    $id = $_POST['jsid_incidencia'];
    $id_usu = $_POST['jsid_usuario'];
    $titu = $_POST['jstitulo'];
    $desc = $_POST['jsdescripcion'];
    $fecha = $_POST['jsfecha'];
    $hora = $_POST['jshora'];
    $lat = $_POST['jslatitud'];
    $lon = $_POST['jslongitud'];
    $video = $_POST['jsvideo'];
    
    $sql = 'call ActualizarIncidencia(:id,:id_usu,:titu,:desc,:fecha,:hora,:lat,:lon,:video)';
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":id_usu", $id_usu);
    $stmt->bindParam(":titu", $titu);
    $stmt->bindParam(":desc", $desc);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":hora", $hora);
    $stmt->bindParam(":lat", $lat);
    $stmt->bindParam(":lon", $lon);
    $stmt->bindParam(":video", $video);
    if ($stmt->execute()) {
        $resp = 1;
    } else {
        $resp = 0;
    }

    $stmt = null;
    $cnx = null;

    return $resp;
    
}

function EliminarIncidencia(){

    include_once("../controller/conexion.php");
    $id = $_POST['idincidencia'];
    $sql="DELETE FROM incidencia WHERE id_incidencia='$id'";
    $resp=1;
    $cnx->query($sql) or $resp=0;
    return $resp;
}

function EditarIncidencia(){
    include_once("../controller/conexion.php");
    $id = $_POST['id'];

    $sql="SELECT * FROM incidencia WHERE id_incidencia='$id'";
    $res = $cnx->query($sql);
    $reg = $res->fetchObject();

     return json_encode($reg);
}




    function ListarIncidencia($valor){

        include_once("../controller/conexion.php");
        include_once("../model/usuario.modelo.php");
        $pag = $_POST['pag'];

        
        $crxp=10 ;
        $inicio = ($pag-1)*$crxp;

        if ($valor != null) {

            $sql="SELECT * FROM incidencia WHERE id_usuario = :$valor LIMIT $inicio,$crxp";

            $stmt = $cnx->prepare($sql);
            $stmt -> bindParam(":".$valor, $valor, PDO::PARAM_INT);
            $stmt -> execute();

            $row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //var_dump($row);
            return json_encode($row);

        }else{

            $sql="SELECT * FROM incidencia LIMIT $inicio,$crxp";
            $res = $cnx->query($sql);
            $row = $res ->fetchAll(PDO::FETCH_ASSOC);
            // // $array = unserialize($row); 
            // $input = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($row));
            
            
            // $error = json_last_error();
            // var_dump($row);
            // die();
            return json_encode($row);
        }

        $stmt = null;
        $cnx = null;

    }
?>
