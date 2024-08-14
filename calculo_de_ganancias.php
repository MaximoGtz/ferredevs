<?php 
include "layout/header.php";
if ($_SESSION['privilegio'] != 'administrador') {
   header('location: /index.php');
   exit;
}
include "herramientas/basededatos.php";
$conn = crearConexion(); 

$cliente_id = $_SESSION['id'];
$cliente_nombre = $_SESSION['nombre'];
$total_acumulado = 0;

// Consulta para obtener la ganancia total por fecha
$sql1 = "SELECT SUM(Total) AS Ganancia_total, fecha_de_cambio 
         FROM copia_venta 
         GROUP BY fecha_de_cambio 
         ORDER BY fecha_de_cambio ASC;";
$result1 = $conn->query($sql1);

while ($row1 = $result1->fetch_assoc()) {
    $ganancia_dia = $row1['Ganancia_total'];
    $fecha_cambio = $row1['fecha_de_cambio'];

    // Consulta para obtener las pérdidas diarias para la misma fecha
    $sql2 = "SELECT 
                SUM(e.Existencias_insertadas * p.PrecioDeCompra) AS gastos_diarios_totales
             FROM 
                existencias_insertadas e
             INNER JOIN 
                producto p 
             ON 
                e.IdProducto = p.IdProducto
             WHERE
                e.Fecha = '$fecha_cambio'
             GROUP BY 
                e.Fecha;";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    
    $perdida_diaria = $row2['gastos_diarios_totales'] ?? 0;
    $total = $ganancia_dia - $perdida_diaria;
    $total_acumulado += $total;

    echo "<div>";
    echo "<p>Total de ganancias del día: $" . htmlspecialchars($ganancia_dia) . "</p>";
    echo "<p>Total de pérdidas del día: $" . htmlspecialchars($perdida_diaria) . "</p>";
    echo "<p>Total del día: $" . htmlspecialchars($total) . "</p>";
    echo "<p>Fecha: " . htmlspecialchars($fecha_cambio) . "</p>";
    echo "</div><hr>";
}

echo "<h2>Ganancia total acumulada: $" . htmlspecialchars($total_acumulado) . "</h2>";
?>
</div>
<?php include "layout/footer.php"; ?>