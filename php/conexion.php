<?php
$drive 	= "mysql";
$server	= "localhost";
$base 	= "bd_incidencia";
$usuario 	= "root";
$contrasena = "";
$cadena		="$drive:host=$server;dbname=$base";

try {
    $cnx = new PDO($cadena,$usuario,$contrasena);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>