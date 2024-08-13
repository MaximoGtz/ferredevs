<?php
if (isset($_GET["IdPersona"])){
    $IdPersona = $_GET["IdPersona"];

    $server = "localhost";
$usuario = "root";
$contrasena = "";
$base = "baseferredevs";
$conexion = new mysqli($server, $usuario, $contrasena, $base);

$sql = "DELETE FROM personal WHERE IdPersona = $IdPersona";
$conexion->query($sql);

}

header("location: /vistas_clientes/perfil.php");
exit;
?>