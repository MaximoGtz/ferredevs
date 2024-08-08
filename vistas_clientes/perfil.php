<?php
include "../layout/header.php";
include 'validaciones.php';

// verifica si el usuario se encuentra logueado, en caso de que no, retorna al index
if (!isset($_SESSION['correo'])) {
    header("location: /login.php");
}
?>
<h1>
este es el perfil

</h1>

<?php
include "../layout/footer.php";
?>