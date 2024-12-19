<?php
include '../config/conexion.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];
    $dosis = $_POST['dosis'];
    $frecuencia = $_POST['frequency'];

    $usuario_id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;

    if (empty($nombre) || empty($descripcion) || empty($dosis) || empty($frecuencia)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
        exit;
    }

    $query = "INSERT INTO Medicamentos (nombre, descripcion, dosis, frecuencia, usuario_id) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssssi", $nombre, $descripcion, $dosis, $frecuencia, $usuario_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Medicamento agregado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al insertar el medicamento: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta: ' . $conn->error]);
    }

    $conn->close();
}
?>
