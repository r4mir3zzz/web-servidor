<?php
include '../config/conexion.php'; 

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $nombre = htmlspecialchars($_POST['nombre']);
        $pApellido = htmlspecialchars($_POST['pApellido']);
        $sApellido = htmlspecialchars($_POST['sApellido']);
        $genero = htmlspecialchars($_POST['genero']);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $telefono = htmlspecialchars($_POST['telefono']);
        $provincia = htmlspecialchars($_POST['provincia']);
        $canton = htmlspecialchars($_POST['canton']);
        $mensajeAdicional = htmlspecialchars($_POST['mensaje_adicional']);
        $password = htmlspecialchars($_POST['password']);

        if (empty($nombre) || empty($pApellido) || empty($sApellido) || empty($correo) || empty($telefono) || empty($password) || empty($genero)) {
            echo json_encode(['success' => false, 'message' => 'Todos los campos obligatorios deben ser completados.']);
            exit();
        }

        $checkEmail = $conn->prepare("SELECT email FROM Usuarios WHERE email = ?");
        $checkEmail->bind_param("s", $correo);
        $checkEmail->execute();
        $result = $checkEmail->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'El correo ya está registrado.']);
            exit();
        }

        $insertAdicional = $conn->prepare("INSERT INTO AdicionalMensaje (mensaje_adicional) VALUES (?)");
        $insertAdicional->bind_param("s", $mensajeAdicional);
        $insertAdicional->execute();
        $mensajeAdicionalId = $conn->insert_id;

        $insertDireccion = $conn->prepare("INSERT INTO Direccion (provincia, canton) VALUES (?, ?)");
        $insertDireccion->bind_param("ss", $provincia, $canton);
        $insertDireccion->execute();
        $direccionId = $conn->insert_id;

        $hashedPassword = hash('sha256', $password);
        $insertUser = $conn->prepare("
            INSERT INTO Usuarios 
            (nombre, apellido_primer, apellido_segundo, genero, email, telefono, contrasena, mensaje_adicional, direccion_usuario) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $insertUser->bind_param(
            "ssssssssi",
            $nombre,
            $pApellido,
            $sApellido,
            $genero,
            $correo,
            $telefono,
            $hashedPassword,
            $mensajeAdicionalId,
            $direccionId
        );

        $insertUser->execute();

        if ($insertUser->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al guardar los datos del usuario.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error interno: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>

