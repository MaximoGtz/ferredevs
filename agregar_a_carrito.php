<?php
include "herramientas/basededatos.php";
$conn = crearConexion();


$id_producto = $_POST['id_producto'];
$id_usuario = $_POST['id_usuario'];
$cantidad = $_POST['cantidad'];


$sql_check = "SELECT * FROM orden WHERE id_producto = ? AND id_usuario = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $id_producto, $id_usuario);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {

    $sql_update = "UPDATE orden SET cantidad = cantidad + ? WHERE id_producto = ? AND id_usuario = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("iii", $cantidad, $id_producto, $id_usuario);
    $stmt_update->execute();
} else {

    $sql_insert = "INSERT INTO orden (id_producto, id_usuario, cantidad) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iii", $id_producto, $id_usuario, $cantidad);
    $stmt_insert->execute();
}


header("Location: ver_productos.php");
exit();
?>
