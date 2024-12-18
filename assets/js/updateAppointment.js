function validateForm(event, fechaId, horaId, motivoId, medicoId) {
    event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional
    
    const fecha = document.getElementById(fechaId).value;
    const hora = document.getElementById(horaId).value;
    const motivo = document.getElementById(motivoId).value;
    const medico = document.getElementById(medicoId).value;
    const cita_id = document.getElementById('editCitaID').value;
    
    if (!fecha || !hora || !motivo || !medico) {
        document.getElementById('errorMessages').innerHTML = 'Todos los campos son obligatorios.';
        document.getElementById('errorMessages').style.display = 'block';
        return false;
    }
    
    $.ajax({
        url: 'http://localhost/web-servidor/endpoints/updateAppointment.php',
        method: 'POST',
        data: {
            cita_id: cita_id,
            fecha: fecha,
            hora: hora,
            motivo: motivo,
            medico: medico
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
            alert('Hubo un error al actualizar la cita médica.');
        }
    });
}
