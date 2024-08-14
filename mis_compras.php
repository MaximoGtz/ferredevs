<?php 
include "layout/header.php";
?>

<link rel="stylesheet" href="styles.css" type="text/css">
<br>
<div class="container-lg">
    <div>
       <h1 class="text-center" style="margin:20px 0px">Mis compras</h1>
    </div>
    <div class="contenedorVerProductos">
        <div class="col-3 bg-primary">
            <!-- <img class="carrito" src="./imgs/CARRITO.png" alt=""> -->
        </div>
        
        <div class="objetos_carrito">
        <?php
        include "herramientas/basededatos.php";
        $conn = crearConexion(); 
        $cliente_id = $_SESSION['id'];
        $cliente_nombre = $_SESSION['nombre'];
        // echo "<h2 class='colornegro m-5'>Usuario: " . htmlspecialchars($cliente_nombre) . "</h2>";

        $sql = "SELECT `v`.`IdVenta` AS `IdVenta`, `p`.`nombre` AS `nombre`,
                GROUP_CONCAT(CONCAT(`o`.`Nombre`, ' (', `v`.`CantidadesProducto`, ')') ORDER BY 
                `o`.`Nombre` ASC SEPARATOR ', ') AS `PRODUCTOS`, `v`.`Total` AS `Total`, 
                `v`.`fecha_de_venta` AS `fecha_de_venta` 
                FROM `venta` `v` 
                JOIN `personal` `p` ON (`v`.`IdCliente` = `p`.`IdPersona`)
                JOIN `producto` `o` ON (`v`.`IdProductos` = `o`.`IdProducto`)
                WHERE p.nombre = '$cliente_nombre'
                GROUP BY `v`.`IdVenta`";

        $result = $conn->query($sql);

        if ($result === false) {

            echo "Error en la consulta: " . $conn->error;
        } else {
            $total = 0;

            echo "<form method='POST' class='tablaMisCompras'>"; 

            while($row = $result->fetch_assoc()) {
                echo "<div class='card m-5 tarjetaMisCompras' style='width: 18rem;'>";
                echo '<div class="card-header">Fecha: '. htmlspecialchars($row['fecha_de_venta']) .'</div>';
                echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item">Productos: '. htmlspecialchars($row['PRODUCTOS']) .'</li>';
                echo '<li class="list-group-item">Total: $'. htmlspecialchars($row['Total']) .'</li>';
                echo '</ul>';
                // echo "<h2>Productos: " . htmlspecialchars($row['PRODUCTOS']) . "</h2>";
                // echo "<p>Total: $" . htmlspecialchars($row['Total']) . "</p>";
                // echo "<p>Fecha de Venta: " . htmlspecialchars($row['fecha_de_venta']) . "</p>";
                echo "</div>";
            }
            echo "</form>";
        }
        ?>
        </div>
    </div>
</div>

<?php 
include "layout/footer.php";
?>
