<?php 

function subirImagen(){{
    if(isset($_FILES['imagen-producto'])){
        $extension = explode('.', $_FILES['imagen_producto']['name']);
        $nuevo_nombre = rand() . '.'. $extension[1];
        $ubicacion= '../imgs/productos' . $nuevo_nombre;
        move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $ubicacion);
        return $nuevo_nombre;
    }
}}

function obtenerNombreImagen($id_producto){
    include 'conexiondb.php';
    $statement = $conexion->prepare("SELECT imagen FROM productos WHERE id = '$id_producto'");
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach($resultado as $fila){
        return $fila["imagen"];
    }
}
function obtenerProductos(){
    include 'conexiondb.php';
    $statement = $conexion->prepare("SELECT IdProducto, Nombre, categoria, Marca, Codigo, PrecioDeCompra, PrecioUnitario, Existencias  FROM producto");
    $statement->execute();
    $resultado = $statement->fetchAll();
    return $statement->rowCount();
}

?>