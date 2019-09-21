<?php
if (isset($_POST['jsaccion'])) {
    $accion = $_POST['jsaccion'];
    switch ($accion) {
        case 'Guardar':
            echo Guardar();
            break;
        case 'Actualizar':
            echo Actualizar();
            break;
        case 'Editar':
            echo  Editar();
            break;
        case 'Eliminar':
            echo Eliminar();
            break;
        case 'Listar':
            echo Listar();
            break;
    }
}

function Guardar(){
    include_once("../controller/conexion.php");   

    $nom = $_POST['jsnombres'];
    $user = $_POST['jsusername'];
    $pass = $_POST['jspassword'];

    $stmt = $cnx->prepare("CALL GuardarUsuario(:$nom, :$user, :$pass)");
    $stmt -> bindParam(":".$nom, $nom, PDO::PARAM_STR);
    $stmt -> bindParam(":".$user,$user, PDO::PARAM_STR);
    $stmt -> bindParam(":".$pass, $pass, PDO::PARAM_STR);
    if ($stmt->execute()) {
			
        return "ok";

<<<<<<< HEAD
    }else{

        return "error";

    }

    $stmt -> close();
    $stmt = null;
    
=======
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param('sss', $nom, $user, $pass);
    $stmt->execute();
    $resp = $stmt->get_result();
    $stmt->close();
    $cnx->close();
    return $resp ;
<<<<<<< HEAD

=======
>>>>>>> a967aa4c64f7e475dd6e65e37b8ff944e71259e0
>>>>>>> 5af0cffa5d6d3c74f6890dfbf447413238298ac9
}

function Actualizar()
{
    include_once("../controller/conexion.php");
    $id = $_POST['jsid_usuario'];
    $nom = $_POST['jsnombres'];
    $user = $_POST['jsusername'];
    $pass = $_POST['jspassword'];

    $sql = 'call ActualizarUsuario(?,?,?,?)';
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param('isss', $id, $nom, $user, $pass);
    $stmt->execute();
    $resp = $stmt->get_result();
    $stmt->close();
    $cnx->close();
    return $resp;
}

function Editar()
{
    include_once("../controller/conexion.php");
    $id = $_POST['jsid_usuario'];

    $sql = "SELECT * FROM persona WHERE idpersona='$id'";
    $res = $cnx->query($sql);
    $reg = $res->fetchObject();

    return json_encode($reg);
}

function Eliminar()
{
    include_once("../controller/conexion.php");
    $id = $_POST['jsid_usuario'];

    $sql = "DELETE FROM persona WHERE idpersona='$id'";
    $resp = 1;
    $cnx->query($sql) or $resp = 0;
    $cnx->close();
    return $resp;
}

function Listar()
{
    include_once("controller/conexion.php");
    $pag = $_POST['pag'];
    $crxp = 10;
    $inicio = ($pag - 1) * $crxp;

    $sql = "SELECT * FROM persona LIMIT $inicio,$crxp";
    $res = $cnx->query($sql);
    $row = $res->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($row);
}
