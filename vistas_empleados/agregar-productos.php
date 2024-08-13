<?php
include "../layout/header.php";
if ($_SESSION['privilegio'] != 'empleado' && $_SESSION['privilegio'] != 'administrador') {
    header('location: /index.php');
    exit;
}
$data;
?>






<div class="container-fluid">
    <h1 class="text-center">
        Productos
    </h1>
    <!-- contenedorPrincipal -->
    <div class="d-flex">
        <!-- formulario -->
        <div class="col-4">
            <h2 class="text-center">Nuevo Producto</h2>
    <?php 
        include '../herramientas/conexion2.php';
        include '../herramientas/eliminar-producto.php';
    ?>
            <?php 
            include '../herramientas/registro_producto.php';
            ?>
            <form method="POST">
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Marca</label>
                    <input type="text" class="form-control" name="marca">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <textarea type="text" class="form-control" name="descripcion"></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Existencias</label>
                    <input type="number" min="1" class="form-control" name="existencias" p>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Código</label>
                    <input type="number" min="0" class="form-control" name="codigo">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Precio de compra</label>
                    <input type="text" class="form-control" name="precio-compra">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Precio de venta</label>
                    <input type="text" class="form-control" name="precio-venta">
                </div>

                <button type="submit" class="btn btn-primary mt-3" name="btnagregar" value="ok">Agregar
                    Producto</button>
            </form>
        </div>
        <!-- productos -->
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">IdProducto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Existencias</th>
                        <th scope="col">Código</th>
                        <th scope="col">Precio de compra</th>
                        <th scope="col">Precio de venta</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../herramientas/conexion2.php';
                    $sql = $conexion ->query('SELECT * FROM producto');
                    while ($data = $sql->fetch_object()) { ?>
                    
                    <tr>
                        <td><?= $data-> IdProducto?></td>
                        <td><?= $data-> Nombre?></td>
                        <td><?= $data-> Marca?></td>
                        <td><?= $data-> descripcion?></td>
                        <td><?= $data-> Existencias?></td>
                        <td><?= $data-> Codigo?></td>
                        <td><?= $data-> PrecioDeCompra?></td>
                        <td><?= $data-> PrecioUnitario?></td>
                        <td>
                            <a href="modificar-producto.php?id=<?= $data->IdProducto?>" class="btn btn-small btn-warning"><i class="bi bi-pen"></i></a>
                            <a href="agregar-productos.php?id=<?= $data->IdProducto?>" class="btn btn-small btn-danger"><i class="bi bi-trash"></i></a>
                        
                        </td>
                    </tr>
                    
                    
                    <?php
                    }
                    
                    ?>

                    
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php 
include  "../layout/footer.php";
?>