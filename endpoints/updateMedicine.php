<?php
include '../config/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $medicamento_id = $_POST['medicamento_id'];
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $dosis = htmlspecialchars($_POST['dosis']);
    $frecuencia = htmlspecialchars($_POST['frecuencia']);
    
    if (empty($nombre) || empty($descripcion) || empty($dosis) || empty($frecuencia)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
        exit();
    }

    $sql = $conn->prepare('
        UPDATE Medicamentos
        SET nombre = ?, descripcion = ?, dosis = ?, frecuencia = ?
        WHERE medicamento_id = ?
    ');

    $sql->bind_param('sssss', $nombre, $descripcion, $dosis, $frecuencia, $medicamento_id);
    
    if ($sql->execute()) {
        echo json_encode(['success' => true, 'message' => 'Medicamento actualizado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el medicamento.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
