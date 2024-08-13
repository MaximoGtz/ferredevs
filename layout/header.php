<?php
session_start();
$auth = false;
if (isset($_SESSION["correo"])) {
  $rol = $_SESSION['privilegio'];
  $auth = true;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ferretería Azteca</title>
    <link rel="icon" href="/imgs/hammer.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<!-- added styles to the body -->

<body class="d-flex flex-column min-vh-100">


    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/index.php">
                <img src="/imgs/hammer.png" width="30" height="30" class="d-inline-block align-top" alt="logo Hammer">
                Ferretería Azteca
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/ver_productos.php">Ver productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/nosotros.php">Nosotros</a>
                    </li>
                </ul>
                <!-- CON LOGIN -->
                <?php
        if ($auth) {
            ?>
            <ul class="navbar-nav mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="dropdown-item" href="/carrito.php">
                        <i class="bi bi-cart3 " style="font-size: 24px; margin: 0px 10px;"></i>
                    </a>
                </li>
            </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Yo,
                            <?php 
                echo $_SESSION['nombre'];
                ?>
                        </a>
                        <ul class="dropdown-menu">
                            <h5 class="fs-4 font-weight-bold" style="padding-left:10px;">
                                <?php 
                if($rol =='cliente'){
                  echo 'Cliente';
                }else if($rol == 'empleado'){
                  echo 'Empleado';
                }else if($rol == 'administrador'){
                  echo 'Administrador';
                }
              
                ?>


                                <h5 />
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="/vistas_clientes/perfil_cliente.php">Perfil</a></li>
                                <?php 
                if ($_SESSION['privilegio'] === 'empleado' || $_SESSION['privilegio'] === 'administrador') {
                ?>


                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/vistas_empleados/agregar-productos.php">Agregar
                                        Productos</a></li>

                                <?php } ?>
                                  <li>
                                      <hr class="dropdown-divider">
                                  </li>
                                  <li>
                                      <a class="dropdown-item" href="/carrito.php">Carrito de compras</a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" href="/mis_compras.php">Mis compras</a>
                                  </li>


                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <?php } else {?>
                <!-- CON LOGIN CIERRE -->
                <!-- SIN LOGIN -->
                <ul class="navbar-nav">
                    <li><a class="btn btn-outline-primary me-2" href="/register.php">Registrate</a></li>
                    <li><a class="btn btn-primary" href="/login.php">Iniciar sesión</a></li>
                </ul>
                <?php }?>
                <!-- SIN LOGIN CIERRE -->
            </div>

        </div>
    </nav>