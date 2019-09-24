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
            echo  Ver();
            break;
        case 'Eliminar':
            echo Eliminar();
            break;
        case 'Listar':
            echo Listar();
            break;
    }
}

function Guardar()
{
    include_once("../controller/conexion.php");

    $nom = $_POST['jsnombres'];
    $user = $_POST['jsusername'];
    $pass = $_POST['jspassword'];

    $sql = 'call GuardarUsuario(:nom,:user,:pass)';
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":user", $user);
    $stmt->bindParam(":pass", $pass);
    if ($stmt->execute()) {
        $resp = 1;
    } else {
        $resp = 0;
    }

    $stmt = null;
    $cnx = null;

    return $resp;
}

function Actualizar()
{
    include_once("../controller/conexion.php");
    $id = $_POST['jsid_usuario'];
    $nom = $_POST['jsnombres'];
    $user = $_POST['jsusername'];
    $pass = $_POST['jspassword'];

    $sql = 'call ActualizarUsuario(:id,:nom,:user,:pass)';

    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":user", $user);
    $stmt->bindParam(":pass", $pass);
    if ($stmt->execute()) {
        $resp = 1;
    } else {
        $resp = 0;
    }

    $stmt = null;
    $cnx = null;

    return $resp;
}

function Ver()
{
    include_once("../controller/conexion.php");
    $id = $_POST['jsid_usuario'];

    $sql = "SELECT * FROM persona WHERE idpersona='$id'";
    $res = $cnx->query($sql);
    $reg = $res->fetchObject();
    $cnx=null;
    return json_encode($reg);
}

function Eliminar()
{
    include_once("../controller/conexion.php");
    $id = $_POST['jsid_usuario'];

    $sql = "DELETE FROM persona WHERE idpersona='$id'";
    $resp = 1;
    $cnx->query($sql) or $resp = 0;
    $cnx=null;
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
    $cnx=null;
    return json_encode($row);
}
class Usuario{
    public static  function Sesion(){
        // $_SESSION['id_usuario']=1;  
        session_start();     
        $user= array(
            $_SESSION['sesion']['id_usuario']=null,
            $_SESSION['sesion']['nombres']='Daniel Farro Vela',
            $_SESSION['sesion']['username']='daniel0505',
            
        );

        return  $user;
    }
}

