<?php

include '../config/conexion.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valid']) && $_POST['valid'] === 'true') {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $motivo = $_POST['motivo'];
    $medico = $_POST['medico'];
    $cita_id = $_POST['cita_id'];

    $sql = $conn->prepare('UPDATE CitasMedicas SET fecha = ?, hora = ?, motivo = ?, medico = ? WHERE cita_id = ?');
    $sql->bind_param('ssssi', $fecha, $hora, $motivo, $medico, $cita_id);
    $sql->execute();
}

?>

<main class="main__showApp">
    <div>
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th class="col">Fecha</th>
                    <th class="col">Hora</th>
                    <th class="col">Motivo</th>
                    <th class="col">Médico</th>
                    <th class="col">Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Realiza la consulta
                $sql = $conn->query('
                    SELECT CitasMedicas.fecha, CitasMedicas.hora, CitasMedicas.motivo, CitasMedicas.medico, CitasMedicas.cita_id, Usuarios.nombre as usuario_nombre
                    FROM CitasMedicas
                    LEFT JOIN Usuarios ON CitasMedicas.usuario_id = Usuarios.usuario_id
                ');
                
                //para ver si la consulta devolvio resultados
                if ($sql && $sql->num_rows > 0) {
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($datos->fecha) ?></td>
                            <td><?= htmlspecialchars($datos->hora) ?></td>
                            <td><?= htmlspecialchars($datos->motivo) ?></td>
                            <td><?= htmlspecialchars($datos->medico) ?></td>
                            <td><?= htmlspecialchars($datos->usuario_nombre) ?></td>
                            <td>
                                <button class="btn btn-small btn-primary" onclick="openEditPopup('<?= $datos->fecha ?>', '<?= $datos->hora ?>', '<?= $datos->motivo ?>', '<?= $datos->medico ?>', '<?= $datos->cita_id ?>')">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <a href="#" class="btn btn-small btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } 
                } else { 
                    echo "<tr><td colspan='5'>No se encontraron citas médicas en la base de datos.</td></tr>";
                } 
                ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Pop-up para editar la cita médica -->
<div id="editPopup" class="popup">
    <form id="editForm" class="popup-content" method="POST" onsubmit="return validateForm(event, 'editFecha', 'editHora', 'editMotivo', 'editMedico')">
        <h2>Editar Cita Médica</h2>
        <div id="errorMessages" style="display:none; color:red;"></div>
        <label for="editFecha">Fecha:</label>
        <input type="date" id="editFecha" name="fecha"><br>
        <label for="editHora">Hora:</label>
        <input type="time" id="editHora" name="hora"><br>
        <label for="editMotivo">Motivo:</label>
        <input type="text" id="editMotivo" name="motivo"><br>
        <label for="editMedico">Médico:</label>
        <input type="text" id="editMedico" name="medico"><br>
        <input type="hidden" id="editCitaID" name="cita_id">
        <input type="hidden" name="valid" value="true">
        <div class="popup-buttons">
            <button type="button" onclick="closeEditPopup()">Cancelar</button>
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>

<script>
function openEditPopup(fecha, hora, motivo, medico, cita_id) {
    document.getElementById('editFecha').value = fecha;
    document.getElementById('editHora').value = hora;
    document.getElementById('editMotivo').value = motivo;
    document.getElementById('editMedico').value = medico;
    document.getElementById('editCitaID').value = cita_id;
    document.getElementById('editPopup').style.display = 'block';
}

function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
}
</script>

<script src="/assets/js/validateAppointments.js"></script>

<?php
include 'footer.php';
?>

