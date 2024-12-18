<?php
include '../config/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cita_id = $_POST['cita_id'];
    $fecha = htmlspecialchars($_POST['fecha']);
    $hora = htmlspecialchars($_POST['hora']);
    $motivo = htmlspecialchars($_POST['motivo']);
    $medico = htmlspecialchars($_POST['medico']);
    
    if (empty($fecha) || empty($hora) || empty($motivo) || empty($medico)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
        exit();
    }

    $sql = $conn->prepare('
        UPDATE CitasMedicas
        SET fecha = ?, hora = ?, motivo = ?, medico = ?
        WHERE cita_id = ?
    ');
    
    $sql->bind_param('ssssi', $fecha, $hora, $motivo, $medico, $cita_id);
    
    if ($sql->execute()) {
        echo json_encode(['success' => true, 'message' => 'Cita médica actualizada correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar la cita médica.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
