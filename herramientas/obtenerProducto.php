<?php 
include "conexiondb.php";
include "funcionesCrud.php";

$query="";
$salida= array();
$query = "SELECT IdProducto, Nombre, Categoria, Marca, Codigo, PrecioDeCompra, PrecioUnitario, Existencias  FROM producto ";


if(isset($_POST["search"]["value"])){
    $query .= 'WHERE Nombre LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR Marca LIKE "%' . $_POST["search"]["value"] . '%" ';
}
if(isset($_POST["order"])){
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . 
    $_POST['order'][0]['dir'] . ' ';
}else{
    $query .= 'ORDER BY IdProducto DESC ';
}
if($_POST["length"] != -1){
    $query .= ' LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
}
$statement = $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
// echo $result;
$datos = array();


$filtered_rows = $statement->rowCount();
foreach($result as $fila){

    $imagen = '';
    if($fila["imagen"] != ''){
        $imagen = '<img src ="../imgs/productos/' . $fila["imagen"] . '"class="img-thumbnail" width="50" height="50"';
    }else{
        $imagen ='';
    }
    $sub_array = array();
    $sub_array[] = $fila['IdProducto'];
    $sub_array[] = $fila['Nombre'];
    $sub_array[] = $fila['Categoria'];
    // $sub_array[] = $fila['IdCategoria'];
    $sub_array[] = $fila['Marca'];
    $sub_array[] = $fila['Codigo'];
    $sub_array[] = $fila['PrecioDeCompra'];
    $sub_array[] = $fila['PrecioUnitario'];
    $sub_array[] = $fila['Existencias'];
    $sub_array[] = $imagen;
    $sub_array[] = '<button type="button" name="editar" id="' .$fila["IdProducto"].'"  class="btn btn-warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" id="' .$fila["IdProducto"].'"  class="btn btn-warning btn-xs borrar">Borrar</button>';
    
    $datos = $sub_array;
}
$salida = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered"=> obtenerProductos(),
    "data" => $datos
);
echo json_encode($salida);
?>