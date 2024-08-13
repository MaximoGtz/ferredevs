<?php 
if(!empty($_POST['btnmodificar'])){
    if (!empty($_POST['nombre']) and !empty($_POST['marca']) and !empty($_POST['descripcion']) and!empty($_POST['existencias']) and !empty($_POST['codigo']) and !empty($_POST['precio-compra']) and !empty($_POST['precio-venta'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $existencias = $_POST['existencias'];
        $codigo = $_POST['codigo'];
        $precioCompra = $_POST['precio-compra'];
        $precioVenta = $_POST['precio-venta'];

        $sql = $conexion->query("UPDATE producto SET Nombre = '$nombre', Marca = '$marca', descripcion = '$descripcion', Existencias = $existencias, Codigo = $codigo, PrecioDeCompra = $precioCompra, PrecioUnitario = $precioVenta WHERE IdProducto = " . $id);
        if($sql == 1){
            header("location: agregar-productos.php");
        }else{
            echo '<div class="alert alert-danger">Error al modificar producto</div>';
        }
    }else{
        echo '<div class="alert alert-warning">No has llenado todos los campos</div>';
    }
    
}

?>