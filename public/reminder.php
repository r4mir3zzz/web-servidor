<?php
session_start();
include '../config/conexion.php';

if (!isset($_SESSION['id'])) {
    die("Acceso denegado. Debes iniciar sesión.");
}

$usuario_id = $_SESSION['id'];

function sendEmail($to, $subject, $message, $fecha, $hora, $medico, $motivo) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: <lramireza616@gmail.com>" . "\r\n"; 
    
    $imageUrl = "https://drive.google.com/file/d/1JOwz1UjrspouGjXchTpQaJlfIKAszz9L/view?usp=sharing"; 
    
    $html_message = "<html><body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>";
    $html_message .= "<div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>";
    $html_message .= "<h2 style='color: #333; font-size: 24px; text-align: center; padding-bottom: 10px;'>Recordatorio de Cita Médica</h2>";
    $html_message .= "<p style='font-size: 16px; line-height: 1.5; color: #555;'>Hola,</p>";
    $html_message .= "<p style='font-size: 16px; line-height: 1.5; color: #555;'>Te recordamos que tienes una cita médica programada para el <strong>$fecha</strong> a las <strong>$hora</strong> con el médico <strong>$medico</strong>.</p>";
    $html_message .= "<p style='font-size: 16px; line-height: 1.5; color: #555;'>Motivo de la cita: <strong>$motivo</strong></p>";

    $html_message .= "<p style='text-align: center;'><img src='$imageUrl' alt='Recordatorio de cita médica' style='max-width: 100%; height: auto; border-radius: 8px;'></p>";

    $html_message .= "<br><p style='font-size: 16px; color: #555;'>Saludos cordiales, <br>El equipo MediTrack.</p>";
    $html_message .= "</div></body></html>";

    return mail($to, $subject, $html_message, $headers);
}


$currentDate = date("Y-m-d");
$oneWeekLater = date('Y-m-d', strtotime("+1 week", strtotime($currentDate)));
$twoWeeksLater = date('Y-m-d', strtotime("+2 weeks", strtotime($currentDate)));

$sql = "
    SELECT C.cita_id, C.fecha, C.hora, C.motivo, C.medico, U.email 
    FROM CitasMedicas C
    JOIN Usuarios U ON C.usuario_id = U.usuario_id
    WHERE C.usuario_id = ? AND (C.fecha = ? OR C.fecha = ?)
";

$stmt = $conn->prepare($sql);
$stmt->bind_param('iss', $usuario_id, $oneWeekLater, $twoWeeksLater);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $citaId = $row['cita_id'];
        $fecha = $row['fecha'];
        $hora = $row['hora'];
        $motivo = $row['motivo'];
        $medico = $row['medico'];
        $userEmail = $row['email'];

        if ($fecha == $oneWeekLater) {
            $subject = "Recordatorio: Tu cita médica es en una semana";
            $message = "Hola, <br><br>Te recordamos que tienes una cita médica programada para el <strong>$fecha</strong> a las <strong>$hora</strong> con el médico <strong>$medico</strong>.<br><br>Motivo de la cita: <strong>$motivo</strong><br><br>Saludos, <br>El equipo médico.";
        
        } elseif ($fecha == $twoWeeksLater) {
            $subject = "Recordatorio: Tu cita médica es en dos semanas";
            $message = "Hola, <br><br>Te recordamos que tienes una cita médica programada para el <strong>$fecha</strong> a las <strong>$hora</strong> con el médico <strong>$medico</strong>.<br><br>Motivo de la cita: <strong>$motivo</strong><br><br>Saludos, <br>El equipo médico.";
        }

        if (sendEmail($userEmail, $subject, $message, $fecha, $hora, $medico, $motivo)) {
            echo "Correo enviado a $userEmail.<br>";
        } else {
            echo "Error al enviar el correo a $userEmail.<br>";
        }
    }
} else {
    echo "No tienes citas para enviar recordatorios.<br>";
}

$stmt->close();
$conn->close();
?>
