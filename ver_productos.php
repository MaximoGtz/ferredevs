<?php 
include "layout/header.php";
$name = "Maximo Gutierrez Iñiguez";
$correo = $_SESSION['correo'];
?>
<h1>Aqui van a ir los productos 
    <?php 
    echo $name;
    echo $correo;
    ?>
</h1>

<?php 
include "layout/footer.php"
?>