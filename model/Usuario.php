<?php
if (isset( $_POST['jsaccion'])) {
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
    include_once("controller/conexion.php");

    $nomb = $_POST['jsnombres'];
    $user = $_POST['jsusername'];
    $pass = $_POST['jspassword'];

    $Guardar='call GuardarUsuario(?,?,?)';

    $stmt = $cnx->prepare($Guardar);
    $stmt->bind_param('sss',$nomb,$user,$pass);
    $stmt->execute();
    $resp=$stmt->get_result();
    $stmt->close();
    $cnx->close();
    return $resp;

}

?>