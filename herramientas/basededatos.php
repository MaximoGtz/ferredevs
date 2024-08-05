<?php 
function crearConexion() {
    $server = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base = "baseferredevs";
    $conexion = new mysqli($server, $usuario, $contrasena, $base);
    if($conexion -> connect_error){
        die("Error al conectar con MySQL: " . $conexion -> connect_error);
    }
    return $conexion;
}



?>