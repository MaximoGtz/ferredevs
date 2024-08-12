<?php
include "../layout/header.php";
if (!isset($_SESSION['correo'])) {
    header("location: ../login.php");
}
if($_SESSION['privilegio'] != 'empleado'){
    header('location: ../index.php');
}


?>
<link rel="stylesheet" href="./styles.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css"> -->




<div class="container-lg">


    <h1 class="text-center mt-5">Agregar producto</h1>

    <div class="row">
        <div class="col-2 offset-10">
            <div class="text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalProducto"
                    id="botonCrear">
                    <i class="bi bi-plus-circle-fill"> </i>Agregar
                </button>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="table-responsive">
        <table id="datos_productos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> IdProducto </th>
                    <th> Nombre</th>
                    <th> Categoria</th>
                    <th> Marca</th>
                    <th> Codigo</th>
                    <th> PrecioCompra</th>
                    <th> PrecioVenta</th>
                    <th> Existencias</th>
                    <th> Imagen</th>
                    <th> Editar</th>
                    <th> Borrar</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<!-- MODAL -->
<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="formularioProducto" enctype="multipart/form-data">
                <div class="modal-content">
                        <div class="modal-body">
                        <label for="nombre">Ingrese el nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                        <br />
                        <label for="categoria">Ingrese la categoria</label>
                        <input type="text" name="categoria" id="categoria" class="form-control">
                        <br />
                        <label for="marca">Ingrese la marca</label>
                        <input type="text" name="marca" id="marca" class="form-control">
                        <br />
                        <label for="codigo">Ingrese el código</label>
                        <input type="text" name="codigo" id="codigo" class="form-control">
                        <br />
                        <label for="precio-compra">Ingrese el precio de compra</label>
                        <input type="text" name="precio-compra" id="precio-compra" class="form-control">
                        <br />
                        <label for="precio-venta">Ingrese el precio de venta</label>
                        <input type="text" name="precio-venta" id="precio-venta" class="form-control">
                        <br />
                        <label for="existencias">Ingrese las existencias</label>
                        <input type="text" name="existencias" id="existencias" class="form-control">
                        <br />
                        <label for="imagen">Seleccione una imagen</label>
                        <input type="file" name="imagen_producto" id="imagen_producto" class="form-control">
                        <span id="imagen-subida"></span>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id-producto" id="id-producto">
                        <input type="hidden" name="operacion" id="operacion">
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                    </div>
                </div>
                </form>

        </div>
    </div>
</div>
<!-- CIERRA MODAL -->

<!-- <script -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $('#datos_productos').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"../herramientas/obtenerProductos.php",
                type:"POST"
            },
            "columnsDefs":[
                {
                "targets":[1,3],
                "orderable":false,
                }
            ]
        })
    });
</script>
<!-- <script>
    $('#datos_productos').DataTable({
        // "ajax:"
    })
</script> -->
<?php 
include "../layout/footer.php";
?>