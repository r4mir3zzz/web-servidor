<?php
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit;
}

$nombre = htmlspecialchars(trim($_POST['name__message'] ?? ''), ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars(trim($_POST['email__message'] ?? ''), ENT_QUOTES, 'UTF-8');
$mensaje = htmlspecialchars(trim($_POST['message_text'] ?? ''), ENT_QUOTES, 'UTF-8');

if (empty($nombre) || empty($email) || empty($mensaje)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'El correo electrónico no es válido.']);
    exit;
}

$sql = "INSERT INTO Mensajes (nombre_mensaje, email_mensaje, mensaje) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Mensaje enviado exitosamente.']);
    } else {
        error_log('Error al insertar el mensaje: ' . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Error al procesar el mensaje.']);
    }

    $stmt->close();
} else {
    error_log('Error al preparar la consulta: ' . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Error interno.']);
}

$conn->close();
exit;


?>