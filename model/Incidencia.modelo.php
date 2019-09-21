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
        case 'Listar':
           echo ListarIncidencia();
            break;
    }
}

function GuardarIncidencia(){
    include_once("conexion.php");
    $id_usu = $_POST['jsid_usuario'];
    $titu = $_POST['jstitulo'];
    $desc = $_POST['jsdescripcion'];
    $fecha = $_POST['jsfecha'];
    $hora = $_POST['jshora'];
    $lat = $_POST['jslatitud'];
    $lon = $_POST['jslongitud'];

    $sql='call GuardarIncidencia(?,?,?,?,?,?,?)';

    $stmt = $cnx->prepare($sql);
    $stmt->bind_param('issssss', $id_usu, $titu, $desc, $fecha, $hora, $lat, $lon);
    $stmt->execute();
    $resp=$stmt->get_result();
    $stmt->close();
    $cnx->close();
    return $resp;
}

function ActualizarIncidencia()
{
    include_once("controller/conexion.php");
    $id = $_POST['jsid_incidencia'];
    $id_usu = $_POST['jsid_usuario'];
    $titu = $_POST['jstitulo'];
    $desc = $_POST['jsdescripcion'];
    $fecha = $_POST['jsfecha'];
    $hora = $_POST['jshora'];
    $lat = $_POST['jslatitud'];
    $lon = $_POST['jslongitud'];

    $sql = 'call ActualizarUsuario(?,?,?,?,?,?,?,?)';
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param('iissssss', $id, $id_usu, $titu, $desc, $fecha, $hora, $lat, $lon);
    $stmt->execute();
    $resp = $stmt->get_result();
    $stmt->close();
    $cnx->close();
    return $resp;
}

function EliminarIncidencia(){

    include_once("conexion.php");
    $id = $_POST['idincidencia'];
    $sql="DELETE FROM incidencia WHERE id_incidencia='$id'";
    $resp=1;
    $cnx->query($sql) or $resp=0;
    return $resp;
}

function EditarIncidencia(){
    include_once("conexion.php");
    $id = $_POST['id'];

    $sql="SELECT * FROM incidencia WHERE id_incidencia='$id'";
    $res = $cnx->query($sql);
    $reg = $res->fetchObject();

     return json_encode($reg);
}

function ListarIncidencia(){
    include_once("conexion.php");
// var_dump($_POST);
    $pag = $_POST['pag'];
    $crxp=10;
    $inicio = ($pag-1)*$crxp;

    $sql="SELECT * FROM incidencia LIMIT $inicio,$crxp";

    $res = $cnx->query($sql);
                $row = $res -> fetchAll(PDO::FETCH_ASSOC);
                return json_encode($row);

}
?>
