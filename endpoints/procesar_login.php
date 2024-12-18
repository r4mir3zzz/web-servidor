<?php
include '../config/conexion.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT usuario_id, nombre, contrasena FROM Usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($datos = $result->fetch_object()) {
            if ($password === $datos->contrasena) {
                // Guardar datos en sesión
                $_SESSION['id'] = $datos->usuario_id;
                $_SESSION['nombre'] = $datos->nombre;

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Inicio de sesión exitoso'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Credenciales incorrectas'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Credenciales incorrectas'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Por favor, completa todos los campos'
        ]);
    }
    exit();
}
?>
