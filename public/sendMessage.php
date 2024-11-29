<?php
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name__message'];
    $email = $_POST['email__message'];
    $mensaje = $_POST['message_text'];

    $sql = "INSERT INTO Mensajes (nombre_mensaje, email_mensaje, mensaje) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit; 
    } else {
        echo "Error al insertar el mensaje: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>