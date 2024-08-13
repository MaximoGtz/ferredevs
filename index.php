<?php
include "layout/header.php";
// if (!isset($_SESSION['correo'])) {
//     header("location: ../index.php");
// }
?>
<link rel="stylesheet" href="styles.css" type="text/css">
<div >
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner  ">
            <div class="carousel-item active imagenFondo imagenCarrusel w-100  anchoo">
                <h1>Hola mundo </h1>
            </div>
            <div class="carousel-item imagenFondo2 imagenCarrusel">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item imagenFondo3 imagenCarrusel">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden mt-5">Next</span>
        </button>
    </div>
</div>




<?php
include "layout/footer.php";
?>