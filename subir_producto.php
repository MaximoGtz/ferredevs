<?php
include "herramientas/basededatos.php";

$conn = crearConexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_unitario = $_POST['precio_unitario'];
    $precio_compra = $_POST['precio_compra'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $codigo = $_POST['codigo'];
    $existencia = $_POST['existencia'];

    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            $sql = "INSERT INTO producto (Nombre, descripcion, PrecioUnitario, PrecioDeCompra, Imagen, IdCategoria, Marca, Codigo, Existencias) 
                    VALUES ('$nombre', '$descripcion', $precio_unitario, $precio_compra, '$imagen', $categoria, $marca, $codigo, $existencia)";
            if ($conn->query($sql) === TRUE) {
                echo "El producto ha sido subido exitosamente.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } 

?>
