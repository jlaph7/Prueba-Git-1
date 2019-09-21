<?php 
  
if (isset( $_POST['jsaccion'])) {
    $accion = $_POST['jsaccion'];

    switch ($accion) {
        case 'Guardar':
           echo GuardarIncidencia();
            break;
        // case 'Actualizar':
        //    echo Actualizar();
        //     break;
        // case 'Editar':
        //    echo  Editar();
        //     break;
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
    $stmt->bind_param('issssss',$id_usu,$titu,$desc,$fecha,$hora,$lat,$lon);
    $stmt->execute();
    $resp=$stmt->get_result();
    $stmt->close();
    $cnx->close();
    return $resp;
}

// function Actualizar(){
//     include_once("conexion.php");
//     $id = $_POST['id'];
//     $nom = $_POST['jsnombres'];
//     $ape = $_POST['jsapellidos'];
//     $ema = $_POST['jsemail'];

//     $sql="UPDATE persona SET nombres='$nom', apellidos='$ape', email='$ema' WHERE idpersona='$id'";
//     $resp=1;
//     $cnx->query($sql) or die($sql);
//     return $resp;
// }

function EliminarIncidencia(){

    include_once("conexion.php");
    $id = $_POST['idincidencia'];
    $sql="DELETE FROM incidencia WHERE id_incidencia='$id'";
    $resp=1;
    $cnx->query($sql) or $resp=0;
    return $resp;
}

// function Editar(){
//     include_once("conexion.php");
//     $id = $_POST['id'];

//     $sql="SELECT * FROM persona WHERE idpersona='$id'";
//     $res = $cnx->query($sql);
//     $reg = $res->fetchObject();

//      return json_encode($reg);
// }

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
