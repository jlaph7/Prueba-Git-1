<?php 
  
if (isset( $_POST['jsaccion'])) {
    $accion = $_POST['jsaccion'];

    switch ($accion) {
        case 'Guardar':
           echo GuardarMultimedia();
            break;
        // case 'Actualizar':
        //    echo Actualizar();
        //     break;
        // case 'Editar':
        //    echo  Editar();
        //     break;
        case 'Eliminar':
           echo EliminarMultimedia();
            break;
        case 'Listar':
           echo ListarMultimedia();
            break;
    }
}

function GuardarMultimedia(){
    include_once("conexion.php");
    $id_inci = $_POST['jsid_incidencia'];
    $ruta = $_POST['jsruta'];

    $sql='call GuardarMultimedia(?,?,?)';

    $stmt = $cnx->prepare($sql);
    $stmt->bind_param('is',$id_inci,$ruta);
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

function EliminarMultimedia(){

    include_once("conexion.php");
    $id = $_POST['idmultimedia'];
    $sql="DELETE FROM multimedia WHERE id_multimedia='$id'";
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

function ListarMultimedia(){
    include_once("conexion.php");
// var_dump($_POST);
    $pag = $_POST['pag'];
    $crxp=10;
    $inicio = ($pag-1)*$crxp;

    $sql="SELECT * FROM multimedia LIMIT $inicio,$crxp";

    $res = $cnx->query($sql);
                $row = $res -> fetchAll(PDO::FETCH_ASSOC);
                return json_encode($row);

}
?>
