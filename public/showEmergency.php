<?php
include 'header.php';
include '../config/sessionHandler.php';
checkSession(); 
?>

<main class="main__showApp">
    <div>
        <h1 class="mensajeMostrado">Estos son tus contactos guardados <?php  echo $_SESSION['nombre']; ?></h1>
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th class="col">Nombre</th>
                    <th class="col">Apellido</th>
                    <th class="col">Teléfono</th>
                    <th class="col">Relación</th>
                    <th class="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../config/conexion.php';

                    $usuario_id = $_SESSION['id'];

                    $sql = $conn->prepare('
                        SELECT * FROM ContactosEmergencia WHERE usuario_id = ?
                    ');
                    $sql->bind_param('i', $usuario_id); 
                    $sql->execute();
                    $result = $sql->get_result(); 

                    if ($result->num_rows > 0) {
                        while ($datos = $result->fetch_object()) { ?>
                            <tr>
                                <td><?= htmlspecialchars($datos->nombre) ?></td>
                                <td><?= htmlspecialchars($datos->apellido) ?></td>
                                <td><?= htmlspecialchars($datos->telefono) ?></td>
                                <td><?= htmlspecialchars($datos->relacion) ?></td>
                                <td>
                                    <!-- Botón para editar -->
                                    <button class="btn btn-small btn-primary" onclick="openEditEmergencyPopup('<?= $datos->nombre ?>', '<?= $datos->apellido ?>', '<?= $datos->telefono ?>', '<?= $datos->relacion ?>', '<?= $datos->contacto_id ?>')">
                                        <i class="fa-solid fa-pen"></i> 
                                    </button>

                                    <!-- Botón para eliminar -->
                                    <button type="button" class="btn btn-small btn-danger" onclick="deleteContact('<?= $datos->contacto_id ?>')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php }
                    } else { 
                        echo "<tr><td colspan='5'>No se encontraron contactos de emergencia para este usuario.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Pop-up para editar contacto de emergencia -->
<div id="editEmergencyPopup" class="popup">
    <form id="editEmergencyForm" class="popup-content" method="POST" onsubmit="return validateEmergencyForm(event, 'editNombre', 'editApellido', 'editTelefono', 'editRelacion')">
        <h2>Editar Contacto de Emergencia</h2>
        <div id="errorMessages" style="display:none; color:red;"></div>
        
        <label for="editNombre">Nombre:</label>
        <input type="text" id="editNombre" name="nombre"><br>
        
        <label for="editApellido">Apellido:</label>
        <input type="text" id="editApellido" name="apellido"><br>
        
        <label for="editTelefono">Teléfono:</label>
        <input type="text" id="editTelefono" name="telefono"><br>
        
        <label for="editRelacion">Relación:</label>
        <input type="text" id="editRelacion" name="relacion"><br>

        <input type="hidden" id="editContactID" name="contacto_id">
        
        <div class="popup-buttons">
            <button type="button" onclick="closeEditEmergencyPopup()">Cancelar</button>
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>

<script>
// Función para abrir el popup con los datos del contacto a editar
function openEditEmergencyPopup(nombre, apellido, telefono, relacion, contacto_id) {
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editApellido').value = apellido;
    document.getElementById('editTelefono').value = telefono;
    document.getElementById('editRelacion').value = relacion;
    document.getElementById('editContactID').value = contacto_id;
    document.getElementById('editEmergencyPopup').style.display = 'block';
}

function closeEditEmergencyPopup() {
    document.getElementById('editEmergencyPopup').style.display = 'none';
}

function deleteContact(contacto_id) {
    if (confirm('¿Estás seguro de que deseas eliminar este contacto de emergencia?')) {
        window.location.href = '../public/deleteEmergency.php?contacto_id=' + contacto_id;
    }
}
</script>

<script src="/assets/js/validateEmergencyForm.js"></script> 

<?php
include 'footer.php';
?>
