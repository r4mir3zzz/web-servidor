<?php
include 'header.php';
include '../config/conexion.php'; 
session_start();
include '../config/sessionHandler.php';
checkSession(); 

$usuario_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valid']) && $_POST['valid'] === 'true') {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $motivo = $_POST['motivo'];
    $medico = $_POST['medico'];

    if (empty($fecha) || empty($hora) || empty($motivo) || empty($medico)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
        exit;
    }

    $sql = $conn->prepare('INSERT INTO CitasMedicas (fecha, hora, motivo, medico, usuario_id) VALUES (?, ?, ?, ?, ?)');
    $sql->bind_param('ssssi', $fecha, $hora, $motivo, $medico, $usuario_id);

    if ($sql->execute()) {
        echo json_encode(['success' => true, 'message' => 'Cita médica agregada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al insertar la cita: ' . $sql->error]);
    }
    $sql->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>

<main class="main__appointment">
    <div class="containerAp">
        <h1 class="tileForm">Formulario de Citas Médicas  <p>Rellene el formulario de inscripción</p></h1>
        <div id="errorMessages" style="display:none; color:red;"></div>
        <form id="createForm" method="POST" class="createForm">
            <label class="h2-appoin">Fecha</label>
            <input class="create_fechaCita" type="date" name="fecha" id="appointmentDate" required>

            <label class="h2-appoin">Hora</label>
            <input class="create_horaCita" type="time" name="hora" id="appointmentTime" required>

            <label class="h2-appoin">Motivo</label>
            <input class="create_motivoCita" type="text" name="motivo" id="appointmentMotivo" required>

            <label class="h2-appoin">Médico</label>
            <input class="create_medicoCita" type="text" name="medico" id="appointmentMedico" required>

            <input type="hidden" name="valid" value="true">
            <input class="botonEnviar" type="submit" value="Enviar" id="btnsubmit">
        </form>

    </div>
</main>
<script src="../assets/js/validateAppointments.js"></script>

<?php
include 'footer.php';
?>
