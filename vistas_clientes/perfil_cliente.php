<?php 
include "../layout/header.php";
if(!isset($_SESSION['correo'])){
  header("location: /login.php");
  exit;
}
?>
<h1>Este es mi perfil</h1>
<?php 
include "../layout/footer.php";
?>