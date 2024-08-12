<?php 
include "layout/header.php";
?>

<link rel="stylesheet" href="styles.css" type="text/css">
<br>
<div class="container-lg">
    <div>
       <h1>Carrito de compra</h1>
    </div>
    <div class="contenedorVerProductos">
        <div class="col-3 bg-primary">
            <img class="carrito" src="./imgs/CARRITO.png" alt="">
        </div>
        
        <div class="row objetos_carrito">
        <?php
        include "herramientas/basededatos.php";
        $conn = crearConexion(); 
        $cliente_id = $_SESSION['id'];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete'])) {
                $carrito_id = $_POST['delete'];
                $sql = "DELETE FROM orden WHERE id = $carrito_id AND id_usuario = $cliente_id";
                $conn->query($sql);
            }

            if (isset($_POST['buy_single'])) {
                $carrito_id = $_POST['buy_single'];
                $sql = "SELECT id_producto, cantidad, producto.PrecioDeCompra as precio, producto.Existencias as existencias
                        FROM orden 
                        INNER JOIN producto ON orden.id_producto = producto.IdProducto
                        WHERE id = $carrito_id AND id_usuario = $cliente_id";
                $result = $conn->query($sql);

                if ($row = $result->fetch_assoc()) {
                    $id_producto = $row['id_producto'];
                    $cantidad = $row['cantidad'];
                    $existencias = $row['existencias'];
                    $total = $cantidad * $row['precio'];

                    if ($cantidad <= $existencias) {
                        $sql = "INSERT INTO venta (IdProductos, CantidadesProducto, IdCliente, Total) 
                                VALUES ('$id_producto', '$cantidad', $cliente_id, $total)";
                        if ($conn->query($sql) === TRUE) {
                            $sql = "DELETE FROM orden WHERE id = $carrito_id AND id_usuario = $cliente_id";
                            $conn->query($sql);
                            echo "¡Compra del producto realizada con éxito!";
                        } else {
                            echo "Error: " . $conn->error;
                        }
                    } else {
                        echo "No puedes comprar más de lo que hay en existencias.";
                    }
                }
            }

            if (isset($_POST['update_quantity'])) {
                $carrito_id = $_POST['update_quantity'];
                $new_quantity = $_POST['quantity_' . $carrito_id];

                $sql = "SELECT producto.Existencias as existencias
                        FROM orden 
                        INNER JOIN producto ON orden.id_producto = producto.IdProducto
                        WHERE orden.id = $carrito_id AND orden.id_usuario = $cliente_id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $existencias = $row['existencias'];

                if ($new_quantity <= $existencias) {
                    $sql = "UPDATE orden SET cantidad = $new_quantity WHERE id = $carrito_id AND id_usuario = $cliente_id";
                    $conn->query($sql);
                } else {
                    echo "No puedes agregar más de lo que hay en existencias.";
                }
            }
        }

        $sql = "SELECT orden.id, personal.nombre AS cliente_nombre, producto.Nombre AS producto_nombre, producto.PrecioDeCompra as precio, orden.cantidad as cantidad
                FROM orden 
                INNER JOIN producto ON orden.id_producto = IdProducto
                INNER JOIN personal ON orden.id_usuario = IdPersona
                WHERE orden.id_usuario = $cliente_id";

        $result = $conn->query($sql);

        $total = 0;

        echo "<form method='POST'>"; 

        while($row = $result->fetch_assoc()) {
            $subtotal = $row['precio'] * $row['cantidad'];
            $total += $subtotal;

            echo "<div>";
            echo "<h2>Producto: " . $row['producto_nombre'] . "</h2>";
            echo "<p>Cliente: " . $row['cliente_nombre'] . "</p>";
            echo "<p>Precio: $" . $row['precio'] . "</p>";
            echo "<p>Cantidad: <input type='number' name='quantity_" . $row['id'] . "' value='" . $row['cantidad'] . "' min='1'></p>"; // Spinner para modificar la cantidad
            echo "<p>Subtotal: $" . $subtotal . "</p>";
            echo "<button type='submit' name='update_quantity' value='" . $row['id'] . "'>Actualizar cantidad</button>"; // Botón para actualizar la cantidad
            echo "</div>";
            echo "<button type='submit' name='delete' value='" . $row['id'] . "'>Eliminar</button>";
            echo "<button type='submit' name='buy_single' value='" . $row['id'] . "'>Comprar</button>"; // Botón para comprar individualmente
            echo "</div><hr>";
        }
        echo "<h2>Total: $" . $total . "</h2>";
        echo "</form>"; 
        ?>
        </div>
    </div>
</div>

<?php 
include "layout/footer.php";
?>
