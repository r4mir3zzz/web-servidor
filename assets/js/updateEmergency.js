function validateEmergencyForm(event, nombreId, apellidoId, telefonoId, relacionId) {
    event.preventDefault(); 
    
    const nombre = document.getElementById(nombreId).value;
    const apellido = document.getElementById(apellidoId).value;
    const telefono = document.getElementById(telefonoId).value;
    const relacion = document.getElementById(relacionId).value;
    const contacto_id = document.getElementById('editContactID').value;
    
    if (!nombre || !apellido || !telefono || !relacion) {
        document.getElementById('errorMessages').innerHTML = 'Todos los campos son obligatorios.';
        document.getElementById('errorMessages').style.display = 'block';
        return false;
    }
    
    $.ajax({
        url: 'http://localhost/web-servidor/endpoints/updateEmergencyContact.php',
        method: 'POST',
        data: {
            contacto_id: contacto_id,
            nombre: nombre,
            apellido: apellido,
            telefono: telefono,
            relacion: relacion
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message);
                closeEditEmergencyPopup();
                location.reload();
            } else {
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', xhr.responseText);
            alert('Hubo un error al actualizar el contacto.');
        }
    });
}
