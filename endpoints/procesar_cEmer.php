<?php
include '../config/conexion.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['name'];
    $apellido = $_POST['lastName'];
    $telefono = $_POST['phone'];
    $relacion = $_POST['relationship'];

    $usuario_id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
    if (empty($nombre) || empty($apellido) || empty($telefono) || empty($relacion)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
        exit;
    }

    $query = "INSERT INTO ContactosEmergencia (nombre, apellido, telefono, relacion, usuario_id) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssssi", $nombre, $apellido, $telefono, $relacion, $usuario_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Contacto de emergencia agregado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al insertar el contacto: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta: ' . $conn->error]);
    }

    $conn->close();
}
?>
