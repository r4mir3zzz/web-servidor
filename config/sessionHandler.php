<?php
session_start();

function checkSession() {
    if (!isset($_SESSION['id']) || !isset($_SESSION['nombre'])) {
        header("Location: login.php");
        exit();
    }
}

function logout() {
    session_unset(); 
    session_destroy(); 
    header("Location: login.php");
    exit();
}

?>
