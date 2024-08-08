<?php
function validarNombre($nombre) {
    if (empty($nombre)) {
        return "Introduce tu nombre";
    }
    return "";
}

function validarCorreo($correo, $conexion) {
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return "El correo electrónico no es válido";
    }

    // Verificar si el correo ya existe en la base de datos
    $declaracion = $conexion->prepare("SELECT IdPersona FROM personal WHERE correo = ?");
    $declaracion->bind_param("s", $correo);
    $declaracion->execute();
    $declaracion->store_result();
    if ($declaracion->num_rows > 0) {
        return "El correo ya está en uso";
    }
    $declaracion->close();

    return "";
}

function validarTelefono($telefono) {
    if (!preg_match("/^(\+|00\d{1,3})?[- ]?\d{7,12}$/", $telefono)) {
        return "El telefono no es válido";
    }
    return "";
}

function validarContrasena($contrasena, $confirmar_contrasena) {
    if (strlen($contrasena) < 6) {
        return "La contraseña debe tener al menos 6 caracteres";
    }
    if ($confirmar_contrasena != $contrasena) {
        return "Las contraseñas no coinciden";
    }
    return "";
}
?>