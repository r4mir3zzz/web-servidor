function validateMedicineForm(event, nombreId, descripcionId, dosisId, frecuenciaId) {
    event.preventDefault();

    const nombre = document.getElementById(nombreId).value;
    const descripcion = document.getElementById(descripcionId).value;
    const dosis = document.getElementById(dosisId).value;
    const frecuencia = document.getElementById(frecuenciaId).value;
    const medicamento_id = document.getElementById('editMedID').value;
    
    if (!nombre || !descripcion || !dosis || !frecuencia) {
        document.getElementById('errorMessages').innerHTML = 'Todos los campos son obligatorios.';
        document.getElementById('errorMessages').style.display = 'block';
        return false;
    }

    $.ajax({
        url: 'http://localhost/web-servidor/endpoints/updateMedicine.php',
        method: 'POST',
        data: {
            medicamento_id: medicamento_id,
            nombre: nombre,
            descripcion: descripcion,
            dosis: dosis,
            frecuencia: frecuencia
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message);
                closeEditPopup();
                location.reload(); 
            } else {
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', xhr.responseText);
            alert('Hubo un error al actualizar el medicamento.');
        }
    });
}
