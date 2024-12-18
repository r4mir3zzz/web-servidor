$(document).ready(function () {
    $('#formEmergency').on('submit', function (event) {
        event.preventDefault();

        const name = $('#nombreCE').val().trim();
        const lastName = $('#apellidoCE').val().trim();
        const phone = $('#telefonoCE').val().trim();
        const relationship = $('#relacionCE').val().trim();

        if (!name || !lastName || !phone || !relationship) {
            $('#errorMessage').text('Todos los campos son obligatorios').css('color', 'red');
            return;
        }

        $('#errorMessage').text('');

        $.ajax({
            url: 'http://localhost/web-servidor/endpoints/procesar_cEmer.php',
            method: 'POST',
            data: { name, lastName, phone, relationship },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta del servidor:', response);
                if (response.success) {
                    window.location.href = 'index.php';
                } else {
                    $('#errorMessage').text(response.message).css('color', 'red');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                console.error('Detalles del error:', xhr.responseText);
                $('#errorMessage').text('Ocurrió un error inesperado. Intenta nuevamente.').css('color', 'red');
            }
        });
    });
});
