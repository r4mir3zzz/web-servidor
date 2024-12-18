<?php
include '../config/conexion.php';
include 'header.php';

include '../config/sessionHandler.php';
checkSession(); 


$usuario_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valid']) && $_POST['valid'] === 'true') {
    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];
    $dosis = $_POST['price'];
    $frecuencia = $_POST['quantity'];

    $sql = $conn->prepare('INSERT INTO Medicamentos (nombre, descripcion, dosis, frecuencia, usuario_id) VALUES (?, ?, ?, ?, ?)');
    $sql->bind_param('ssssi', $nombre, $descripcion, $dosis, $frecuencia, $usuario_id);
    $sql->execute();
}

?>

<main class="main__medicine">
<link rel="stylesheet" href="../assets/css/createMedicine.css">
    <div class="containerMed">
        <h1 class="tileForm">Formulario de Medicamentos <p>Rellene el formulario de inscripción</p></h1>
        <div id="errorMessages" style="display:none; color:red;"></div>
        
        <form id="createMedicineForm" method="POST" onsubmit="return validateMedicineForm(event, 'medicineName', 'medicineDescription', 'medicineDosis', 'medicineQuantity')" class="createMedicineForm">
                <label>Nombre del Medicamento</label>
                <input class="create_nombreMedicamento" type="text" name="name" id="medicineName" required>

            
                <label>Descripción</label>
                <textarea class="create_descripcionMedicamento" name="description" id="medicineDescription" required></textarea>

                <label>Dosis</label>
                <input class="create_dosisMedicamento" type="text" name="price" id="medicineDosis" step="0.01" min="0" required>


                <label>Frecuencia</label>
                <input class="create_cantidadMedicamento" type="text" name="quantity" id="medicineQuantity" min="0" required>

            <input type="hidden" name="valid" value="true">
            <input class="botonEnviar" type="submit" value="Crear" id="btnsubmit">
        </form>
    </div>
</main>
<script src="../assets/js/validateMedicine.js"></script>

<?php
include 'footer.php';
?>