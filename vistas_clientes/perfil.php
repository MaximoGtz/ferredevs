<?php

use LDAP\Result;

include "../layout/header.php";


// verifica si el usuario se encuentra logueado, en caso de que no, retorna al index
if (!isset($_SESSION['correo'])) {
    header("location: /index.php");
}
if($_SESSION['privilegio'] != 'administrador'){
    header("location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador</title>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css>
</head>
<body>
    <div  class="container my-5">
        <h2> Lista de Clientes</h2>
        <h2> Acceso adminitrador</h2>
        <a class="btn btn-primary custom-btn" href="/vistas_clientes/crearcliente.php" role="button">Nuevo Cliente</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Creado En</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                        <?php 
            
                $server = "localhost";
                $usuario = "root";
                $contrasena = "";
                $base = "baseferredevs";
                $conexion = new mysqli($server, $usuario, $contrasena, $base);

                //checa la conexion
                if($conexion -> connect_error){
                    die("Error al conectar con MySQL: " . $conexion -> connect_error);
                }
        
            

            //lee todo lo de la fila de la base de datos
            $sql ="SELECT * FROM personal";
            $result = $conexion->query($sql);

            if(!$result) {
                die("consulta falLida: " . $conexion->error);
            }

            while($row = $result-> fetch_assoc()){
                echo" <tr>
                    <td>$row[IdPersona]</td>
                    <td>$row[nombre]</td>
                    <td>$row[rol]</td>
                    <td>$row[correo]</td>
                    <td>$row[telefono]</td>
                    <td>$row[direccion]</td>
                    <td>$row[creado_en]</td>
                    <td>
                        <a class= 'btn btn-primary btn-sm' href='/vistas_clientes/edit.php?IdPersona=$row[IdPersona]'>Editar</a>
                        <a class= 'btn btn-danger btn-sm' href='/vistas_clientes/delete.php?IdPersona=$row[IdPersona]'>Eliminar</a>
                    </td>

                </tr>
                ";
            }
                         ?>
               
            </tbody>

        </table>

    </div>
</body>
</html>
<?php
include "../layout/footer.php";
?>