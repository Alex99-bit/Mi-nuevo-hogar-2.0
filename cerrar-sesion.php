<?php
    // Iniciar la sesión (si aún no está iniciada)
    session_start();

    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Si deseas eliminar la cookie de sesión, descomenta la siguiente línea
    // setcookie(session_name(), '', time() - 3600, '/');

    // Destruir la sesión
    session_destroy();

    // Redirigir al usuario a otra página (opcional)
    header("Location: index.php");
    exit;
?>