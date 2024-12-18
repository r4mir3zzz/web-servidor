<?php
include '../config/conexion.php'; 

if (isset($_GET['contacto_id'])) {
    $contacto_id = $_GET['contacto_id'];

    $sql = $conn->prepare('DELETE FROM ContactosEmergencia WHERE contacto_id = ?');
    $sql->bind_param('i', $contacto_id);

    if ($sql->execute()) {
        echo "<script>alert('Contacto de emergencia eliminado correctamente'); window.location.href = './showEmergency.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el contacto'); window.location.href = 'contactosEmergencia.php';</script>";
    }

    $sql->close();
}

$conn->close();
?>
