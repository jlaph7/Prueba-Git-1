<?php
$drive 	= "mysql";
$server	= "localhost";
$base 	= "db_incidencia";
$usuario 	= "root";
$contrasena = "3sun4l4rgacontra";
$cadena		="$drive:host=$server;dbname=$base";

try {
    $cnx = new PDO($cadena,$usuario,$contrasena);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>