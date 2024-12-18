function validateEmergencyForm(event, nombreID, apellidoID, telefonoID, relacionID) {
    var nombre = document.getElementById(nombreID).value.trim();
    var apellido = document.getElementById(apellidoID).value.trim();
    var telefono = document.getElementById(telefonoID).value.trim();
    var relacion = document.getElementById(relacionID).value.trim();

    var errorMessages = document.getElementById('errorMessages');

    if (!nombre || !apellido || !telefono || !relacion) {
        errorMessages.style.display = 'block';
        errorMessages.innerHTML = 'Todos los campos son obligatorios.';
        return false; // Evitar que el formulario se envíe
    }

    errorMessages.style.display = 'none';
    return true; // Permitir que el formulario se envíe
}
