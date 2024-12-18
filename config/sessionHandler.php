<?php
// sessionHandler.php
session_start();

// Verificar si el usuario está autenticado
function checkSession() {
    if (!isset($_SESSION['id'])) {
        // Si no hay sesión iniciada, redirigir al login
        header("Location: login.php");
        exit();
    }
}

// Finalizar la sesión del usuario
function logout() {
    session_unset(); // Eliminar variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: login.php");
    exit();
}
?>
