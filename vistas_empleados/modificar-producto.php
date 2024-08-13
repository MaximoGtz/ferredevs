<?php
include "../layout/header.php";
if ($_SESSION['privilegio'] != 'empleado' && $_SESSION['privilegio'] != 'administrador') {
    header('location: /index.php');
    exit;
}
include '../herramientas/conexion2.php';

$id = $_GET['id'];
$sql = $conexion->query('SELECT * FROM producto WHERE IdProducto = '. $id );
?>
<h2 class="text-center">Modificar Productos</h2>
<form class="container-md w-50" method="POST">
    <input type="hidden" name="id" value="<?= $_GET['id']?>">
    <?php 
    include '../herramientas/modificar-producto.php';
    while ($datos = $sql->fetch_object()) { 
    ?>


    <div class="form-group mt-3">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?= $datos->Nombre?>">
    </div>
    <div class="form-group mt-3">
        <label for="exampleInputEmail1">Marca</label>
        <input type="text" class="form-control" name="marca" value="<?= $datos->Marca?>">
    </div>
    <div class="form-group mt-3">
        <label for="exampleInputEmail1">Descripcion</label>
        <textarea type="text" class="form-control" name="descripcion"><?php echo $datos->descripcion?></textarea>
    </div>
    <div class="form-group mt-3">
        <label for="exampleInputEmail1">Existencias</label>
        <input type="number" min="1" class="form-control" name="existencias" value="<?= $datos->Existencias?>">
    </div>
    <div class="form-group mt-3">
        <label for="exampleInputEmail1">Código</label>
        <input type="number" min="0" class="form-control" name="codigo" value="<?= $datos->Codigo?>">
    </div>
    <div class="form-group mt-3">
        <label for="exampleInputEmail1">Precio de compra</label>
        <input type="text" class="form-control" name="precio-compra" value="<?= $datos->PrecioDeCompra?>">
    </div>
    <div class="form-group mt-3">
        <label for="exampleInputEmail1">Precio de venta</label>
        <input type="text" class="form-control" name="precio-venta" value="<?= $datos->PrecioUnitario?>">
    </div>
    <?php
}?>

    <button type="submit" class="btn btn-primary mt-3" name="btnmodificar" value="ok">Modificar Producto</button>
</form>

<?php 
include "../layout/footer.php";
?>