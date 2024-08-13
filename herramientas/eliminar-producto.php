<?php 
include "../herramientas/conexion2.php";
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = $conexion ->query("DELETE FROM producto WHERE IdProducto = $id");
    if($sql == 1){
        echo'<div>Producto eliminado correctamente</div>';
    }else{
        echo '<div>Error al eliminar producto</div>';
    }
}
?>