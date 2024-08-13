<?php 

 $server = "localhost";
 $usuario = "root";
 $contrasena = "";
 $base = "baseferredevs";
 $conexion = new mysqli($server, $usuario, $contrasena, $base);

 
$nombre ="";
$correo = "";
$telefono = "";
$contrasena ="";
$confirmar_contrasena ="";
$rol ="";
$direccion ="";

$errorMensaje = "";
$exitoMensaje ="";

if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $contrasena = $_POST["contrasena"];
        $confirmar_contrasena = $_POST["confirmar_contrasena"];
        $rol = $_POST["rol"];
        $direccion = $_POST["direccion"];

        do{
            if ( empty($nombre) || empty($correo) || empty($telefono) || empty($contrasena) || empty($confirmar_contrasena) || empty($rol) || empty($direccion)){
                $errorMensaje = "todos los campos son requeridos";
                break;
            }
           
        if ($confirmar_contrasena != $contrasena) {
            $errorMensaje = "Las contraseñas no coinciden";
            break;
        }
            $contrasena2 = password_hash($contrasena, PASSWORD_DEFAULT);
            //agregar nuevo cliente a la base de datos
            $sql = "SELECT * FROM personal WHERE correo = '$correo'";
            $result = $conexion->query($sql);
    
            if ($result->num_rows > 0) {
                $errorMensaje = "El correo ya está registrado";
                break;
            }
             $sql ="INSERT INTO personal (nombre, correo, telefono, contrasena, rol, direccion) " .
                "VALUES('$nombre', '$correo', '$telefono', '$contrasena2', '$rol', '$direccion')";
             $result = $conexion->query($sql);
 
             if(!$result) {
                 $errorMensaje = "consulta falLida: " . $conexion->error;
                 break;
             }
             
            $nombre ="";
            $correo = "";
            $telefono = "";
            $contrasena ="";
            $confirmar_contrasena="";
            $rol ="";
            $direccion="";

            $exitoMensaje = "El cliente se añadido correctamente";
            
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
    <title>administrador</title>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>
</head>
<body>
    <div class="container my-5">
    <h2>Nuevo Cliente</h2>

    <?php
    if ( !empty($errorMensaje)){
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMensaje</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
    </div>
    ";
    }
    ?>

    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="correo" value="<?php echo $correo?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Telefono</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="telefono" value="<?php echo $telefono?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Direccion</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="direccion" value="<?php echo $direccion?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Contraseña</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="contrasena" value="<?php echo $contrasena?>">
            </div>
        </div>
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Confirmar Contrasena</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="confirmar_contrasena" value="<?php echo ($confirmar_contrasena); ?>">
                </div>
            </div>
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Rol</label>
                <div class="col-sm-6">
                    <select class="form-control" name="rol">
                        <option value="">Seleccione un rol</option>
                        <option value="cliente" <?php echo $rol == 'cliente' ? 'selected' : '' ?>>Cliente</option>
                        <option value="empleado" <?php echo $rol == 'empleado' ? 'selected' : '' ?>>Empleado</option>
                    </select>
                </div>
            </div>

        <?php
   if (!empty($exitoMensaje)){
    echo "
    <div class='row mb-3'>
        <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$exitoMensaje</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
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
    </form>
    </div>
</body>
</html>