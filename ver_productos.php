<?php 
include "layout/header.php";
?>
<!-- importo la hoja de estilos -->
<link rel="stylesheet" href="styles.css" type="text/css">
<div class="container-lg">
    <!-- Este es el contenedor que divide el buscador de los productos -->
    <div class="row contenedorVerProductos">
        <div class="col-3 bg-primary">
            Aqui va a estar el buscador de los productos
        </div>
        <div class="col-9 bg-secondary row align-items-start">
            <div class="card col gy-2 gx-2" style="width: 18rem;">
                <img src="./imgs/martillo.png" class="productImg" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col gy-2 gx-2" style="width: 18rem;">
                <img src="./imgs/palas.jpg" class="productImg" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col gy-2 gx-2" style="width: 18rem;">
                <img src="./imgs/palas.jpg" class="productImg" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php 
include "layout/footer.php"
?>