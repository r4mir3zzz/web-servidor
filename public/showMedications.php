<?php
include '../config/conexion.php';
include 'header.php';

include '../config/sessionHandler.php';
checkSession(); 

$usuario_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['valid']) && $_POST['valid'] === 'true') {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $dosis = $_POST['dosis'];
        $frecuencia = $_POST['frecuencia'];
        $medicamento_id = $_POST['medicamento_id'];

        $sql = $conn->prepare('UPDATE Medicamentos SET nombre = ?, descripcion = ?, dosis = ?, frecuencia = ? WHERE medicamento_id = ? AND usuario_id = ?');
        $sql->bind_param('sssiii', $nombre, $descripcion, $dosis, $frecuencia, $medicamento_id, $usuario_id);
        $sql->execute();
    } elseif (isset($_POST['delete']) && $_POST['delete'] === 'true') {
        $medicamento_id = $_POST['medicamento_id'];

        $sql = $conn->prepare('DELETE FROM Medicamentos WHERE medicamento_id = ? AND usuario_id = ?');
        $sql->bind_param('ii', $medicamento_id, $usuario_id);
        $sql->execute();
    }
}
?>

<main class="main__showApp">
    <div>
        <h1 class="mensajeMostrado">Estos son tus medicamentos <?php  echo $_SESSION['nombre']; ?></h1>
        <!-- Tabla de medicamentos -->
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th class="col">Nombre</th>
                    <th class="col">Descripción</th>
                    <th class="col">Dosis</th>
                    <th class="col">Frecuencia</th>
                    <th class="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Realizar la consulta para obtener los medicamentos solo del usuario logueado
                $sql = $conn->prepare('SELECT * FROM Medicamentos WHERE usuario_id = ?');
                $sql->bind_param('i', $usuario_id);
                $sql->execute();
                $result = $sql->get_result();

                if ($result && $result->num_rows > 0) {
                    while ($med = $result->fetch_object()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($med->nombre) ?></td>
                            <td><?= htmlspecialchars($med->descripcion) ?></td>
                            <td><?= htmlspecialchars($med->dosis) ?></td>
                            <td><?= htmlspecialchars($med->frecuencia) ?></td>
                            <td>
                                <button class="btn btn-small btn-primary" onclick="openEditPopup('<?= $med->nombre ?>', '<?= $med->descripcion ?>', '<?= $med->dosis ?>', '<?= $med->frecuencia ?>', '<?= $med->medicamento_id ?>')">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <form method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este medicamento?');">
                                    <input type="hidden" name="medicamento_id" value="<?= $med->medicamento_id ?>">
                                    <input type="hidden" name="delete" value="true">
                                    <button type="submit" class="btn btn-small btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron medicamentos en la base de datos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Pop-up para editar el medicamento -->
<div id="editPopup" class="popup">
<form id="editForm" class="popup-content" method="POST" onsubmit="return validateMedicineForm(event, 'editNombre', 'editDescripcion', 'editDosis', 'editFrecuencia')">
        <h2>Editar Medicamento</h2>
        <div id="errorMessages" style="display:none; color:red;"></div>
        
        <label for="editNombre">Nombre:</label>
        <input type="text" id="editNombre" name="nombre"><br>
        
        <label for="editDescripcion">Descripción:</label>
        <input type="text" id="editDescripcion" name="descripcion"><br>
        
        <label for="editDosis">Dosis:</label>
        <input type="text" id="editDosis" name="dosis" step="0.01" min="0"><br>
        
        <label for="editFrecuencia">Frecuencia</label>
        <input type="text" id="editFrecuencia" name="frecuencia" min="0"><br>
        
        <input type="hidden" id="editMedID" name="medicamento_id">
        <input type="hidden" name="valid" value="true">
        
        <div class="popup-buttons">
            <button type="button" onclick="closeEditPopup()">Cancelar</button>
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>

<script>
function openEditPopup(nombre, descripcion, dosis, frecuencia, medicamento_id) {
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editDescripcion').value = descripcion;
    document.getElementById('editDosis').value = dosis;
    document.getElementById('editFrecuencia').value = frecuencia;
    document.getElementById('editMedID').value = medicamento_id;
    document.getElementById('editPopup').style.display = 'block';
}

function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
}
</script>

<script src="/assets/js/validateMedicine.js"></script>

<?php
include 'footer.php';
?>
