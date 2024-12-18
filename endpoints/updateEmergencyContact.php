<?php
include '../config/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contacto_id = $_POST['contacto_id'];
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $relacion = htmlspecialchars($_POST['relacion']);
    
    if (empty($nombre) || empty($apellido) || empty($telefono) || empty($relacion)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
        exit();
    }

    $sql = $conn->prepare('
        UPDATE ContactosEmergencia 
        SET nombre = ?, apellido = ?, telefono = ?, relacion = ? 
        WHERE contacto_id = ?
    ');
    
    $sql->bind_param('ssssi', $nombre, $apellido, $telefono, $relacion, $contacto_id);
    
    if ($sql->execute()) {
        echo json_encode(['success' => true, 'message' => 'Contacto actualizado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el contacto.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
