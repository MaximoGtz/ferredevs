<?php 
include "layout/header.php";
?>
<link rel="stylesheet" href="styles.css" type="text/css">
<div class="container-lg">
    <div class="row contenedorVerProductos">
        <div class="col-12 mt-5 mb-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                include "herramientas/basededatos.php";
                $conn = crearConexion();
                $sql = "SELECT * FROM producto";
                $result = $conn->query($sql);
                if(isset($_SESSION['correo'])){
                    $cliente_id = $_SESSION['id'];
                }
                while($row = $result->fetch_assoc()) {
                    if (!empty($row['Imagen'])) {
                        $ruta_imagen = './imgs/' . $row['Imagen'];
                        if (file_exists($ruta_imagen)) {
                            $contenido_imagen = file_get_contents($ruta_imagen);
                            $imagen_base64 = base64_encode($contenido_imagen);
                            $tipo_imagen = mime_content_type($ruta_imagen);
                            $src_imagen = 'data:' . $tipo_imagen . ';base64,' . $imagen_base64;
                        } else {
                            $src_imagen = 'ruta/a/imagen_por_defecto.jpg';
                        }
                    } else {
                        $src_imagen = 'ruta/a/imagen_por_defecto.jpg';
                    }
                    
                    echo '<div class="col">';
                    echo '<div class="card h-100 tarjetaProducto">';
                    echo '<img src="./imgs/productos/'.$row['Nombre'].'.jpg" class="verProductosImagen" alt="No hay martillo"';
                    echo '<div class="card-body">';
                    echo '<h5 class=" textoProducto">' . $row['Nombre'] . '</h5>';
                    echo '<p class="   textoProducto">' . $row['Marca'] . '</p>';
                    
                    echo '<p class="   textoProducto">'. $row['descripcion'] .' as</p>';

                    echo '<p class="   textoProducto"> $' . $row['PrecioDeCompra'] . '</p>';
                    echo '<p class="   textoProducto"> Existencias: ' . $row['Existencias'] . '</p>';


                    if ($row['Existencias'] > 0) {
                        echo '<form method="POST" action="agregar_a_carrito.php">';
                        echo '<input type="hidden" name="id_producto" value="' . $row['IdProducto'] . '">';
                        if(isset($_SESSION['correo'])){
                            echo '<input type="hidden" name="id_usuario" value="' . $cliente_id . '">';
                        }
                        echo '<input type="hidden" name="cantidad" value="1">'; 
                        echo '<div class="contenedorBotonProducto">';
                        echo '<button type="submit" class="btn btn-warning botonProducto">Agregar al carrito</button>';
                        echo '</div>';
                        echo '</form>';
                    } else {
                        
                        echo '<div class="contenedorBotonProducto">';
                        echo '<button type="submit" class="btn btn-danger botonProducto" disabled>Producto agotado</button>';
                        echo '</div>';
                        // echo '<p class="text-danger">Producto agotado</p>';
                    }

                    echo '</div>';
                    echo '</div>';
                }
                ?>
                <!-- <img src="./imgs/productos/Martillo.jpg" alt=""> -->
            </div>
        </div>
    </div>
</div>

<?php 
include "layout/footer.php";
?>