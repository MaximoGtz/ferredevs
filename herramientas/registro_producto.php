<?php 
if(!empty($_POST['btnagregar'])){
    if (!empty($_POST['nombre']) && !empty($_POST['marca']) && !empty($_POST['descripcion'] ) && !empty($_POST['existencias']) && !empty($_POST['codigo'] )&& !empty($_POST['precio-compra']) && !empty($_POST['precio-venta'])) {
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $existencias = $_POST['existencias'];
        $codigo = $_POST['codigo'];
        $precioCompra = $_POST['precio-compra'];
        $precioVenta = $_POST['precio-venta'];
        $categoria = 5;
        $sql = $conexion->query("INSERT INTO producto( Nombre, IdCategoria, PrecioUnitario, Marca, Codigo, PrecioDeCompra, Existencias,  descripcion) VALUES ('$nombre', $categoria, $precioVenta, '$marca', $codigo, $precioCompra, $existencias, '$descripcion')");
        if($sql == 1){
            echo "<div class='alert alert-success'>Producto Registrado Correctamente </div>";
        }else{
            echo "<div class='alert alert-danger'>Error al registrar </div>";

        }
    }else{
        echo "<div class='alert alert-warning'>Alguno de los campos esta vacío</div>";
    }
}

?>