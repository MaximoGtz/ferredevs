<?php

$server = "localhost";
$usuario = "root";
$contrasena = "";
$base = "baseferredevs";

// Crear conexión
$conexion = new mysqli($server, $usuario, $contrasena, $base);

// Comprobar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$IdPersona = "";
$nombre = "";
$correo = "";
$telefono = "";
$contrasena = "";

$errorMensaje = "";
$exitoMensaje = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {

    if ( !isset($_GET["IdPersona"])) {
        header("location: /vistas_clientes/perfil.php");
        exit;
    }

    $IdPersona = $_GET["IdPersona"]; 

    $sql = "SELECT * FROM personal WHERE IdPersona=$IdPersona";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /vistas_clientes/perfil.php");
        exit;
    }
    $nombre = $row["nombre"];
    $correo = $row["correo"];
    $telefono = $row["telefono"];
    $contrasena = $row["contrasena"];

} else {
    $IdPersona = $_POST["IdPersona"]; 
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $contrasena = $_POST["contrasena"];

    do{
    if (empty($nombre) || empty($correo) || empty($telefono) || empty($contrasena)) {
        $errorMensaje = "Todos los campos son requeridos";
        break;
    }
        

    $sql = "UPDATE personal " . 
     "SET nombre = '$nombre', correo = '$correo', telefono = '$telefono', 
     contrasena = '$contrasena'" . 
     "WHERE IdPersona = $IdPersona";

    $result = $conexion->query($sql);

    if (!$result){
        $errorMensaje = "consulta Invalida: " . $conexion->error;
        break;
    }
            
    $exitoMensaje = "El Cliente se Actualizo Correctamente";
    header("location: /vistas_clientes/perfil.php");
    exit;

          } while (false);
          
          }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Editar Cliente</h2>
         
        <?php
        if (!empty($errorMensaje)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMensaje</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="IdPersona" value="<?php echo($IdPersona); ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo ($nombre); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="correo" value="<?php echo ($correo); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Teléfono</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="telefono" value="<?php echo ($telefono); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="contrasena" value="<?php echo ($contrasena); ?>">
                </div>
            </div>

            <?php
            if (!empty($exitoMensaje)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$exitoMensaje</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>   
                    </div>     
                </div>";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/vistas_clientes/perfil.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
