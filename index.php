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
                    <div class="botoncarrusel1">
                        <a href="https://www.google.com.mx/maps/place/Ferreter%C3%ADa+Azteca/@20.7011506,-103.293847,17z/data=!3m1!4b1!4m6!3m5!1s0x8428b11644072ed9:0xb8248887ef6ccc2a!8m2!3d20.7011456!4d-103.2912721!16s%2Fg%2F11ddx6vqzn?entry=ttu">

                            <button  class="btn btn-warning fs-1">CONOCE NUESTRA SUCURSAL AHORA!</button>
                        </a>
                    </div>
            </div>
            <div class="carousel-item imagenFondo2 imagenCarrusel">
                <div style="margin-top:200px">
                    <a href="/ver_productos.php">
                        <button class="btn btn-light fs-1 p-5">Conoce nuestros productos!</button>
                    </a>
                </div>
            </div>
            <div class="carousel-item imagenFondo3 imagenCarrusel">

                <div style="width:300px; height:300px; margin:0 auto; margin:140px 800px">

                    <img src="./imgs/sale.jpg" class="d-block w-100" alt="...">
                </div>
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
<section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row m-5">
                    <div class="col-lg-4 ">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex "><i class="bi-window m-auto text-primary fs-1"></i></div>
                            <h3>A tu alcance</h3>
                            <p class="lead mb-0">Esta pagina web sin duda ayudara a tu proceso de trabajo en tu mano!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary fs-1"></i></div>
                            <h3>Respaldo de tus datos</h3>
                            <p class="lead mb-0">Nunca te perderas del historial de tus compras ni de ninguno de tus movimientos!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary fs-1"></i></div>
                            <h3>Fácil de usar</h3>
                            <p class="lead mb-0">Con nuestra interfaz sencilla, no tendras problema a la hora de realizar compras ni de gestionar tus productos</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image Showcases-->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/imgs/edificios.jpg'); height:500px; background-repeat: no-repeat;
  background-position: center;"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Con un diseño espectacular
                        </h2>
                        <p class="lead mb-0">Nuestra página web está diseñada para ofrecerte una experiencia de compra fluida y agradable. Con una interfaz limpia y moderna, todo está organizado de manera intuitiva para que encuentres lo que necesitas sin complicaciones. Los menús son claros, los productos se presentan con imágenes de alta calidad, y la navegación es rápida, tanto en computadora como en dispositivos móviles. Además, los colores y tipografías han sido elegidos cuidadosamente para que tu visita sea cómoda y atractiva, permitiéndote enfocarte en lo más importante: tus compras.</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('/imgs/atencionferreteria.jpg'); height:500px; background-repeat: no-repeat;
  background-position: center;"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>La mejor atencion al cliente</h2>
                        <p class="lead mb-0">Nuestro servicio de atención al cliente está siempre disponible para ofrecerte el mejor apoyo posible. Contamos con un equipo amable y capacitado, listo para ayudarte en todo lo que necesites, desde resolver dudas sobre productos hasta guiarte en el proceso de compra. Puedes contactarnos fácilmente por chat, teléfono o correo electrónico, y nos esforzamos por responder rápidamente para asegurarnos de que tu experiencia con nosotros sea siempre positiva. Nos importa que te sientas atendido y valorado en cada interacción.</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/imgs/principal.jpg'); height:500px; background-repeat: no-repeat;
  background-position: center;"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Facil de utilizar</h2>
                        <p class="lead mb-0">Con nuestra aplicación de ferretería, hacer tus compras es sencillo y rápido. Solo necesitas explorar el catálogo, encontrar lo que buscas con nuestra práctica barra de búsqueda, y añadirlo a tu carrito. El proceso de pago es seguro y fácil, con opciones de envío que se adaptan a tus necesidades. Además, siempre cuentas con el apoyo de nuestro equipo de atención al cliente para cualquier consulta que tengas.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials-->
        <section class="testimonials text-center bg-light p-5">
            <div class="container ">
                <h2 class="mb-5">Que dicen nuestros clientes...</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="/imgs/personas/testimonials-1.jpg" alt="..." />
                            <h5>Margaret E.</h5>
                            <p class="font-weight-light mb-0">"La aplicacion funciona de maravilla, muchas gracias chicos!"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="/imgs/personas/testimonials-2.jpg" alt="..." />
                            <h5>Fred S.</h5>
                            <p class="font-weight-light mb-0">"Ahora puedo seguir trabajando sin interrupciones, muchas gracias"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="/imgs/personas/testimonials-3.jpg" alt="..." />
                            <h5>Sarah W.</h5>
                            <p class="font-weight-light mb-0">"Mi agencia de trabajo funciona mucho mejor gracias a Ferretería Azteca!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



<?php
include "layout/footer.php";
?>