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
                    showModal('Éxito', 'Tu mensaje de emergencia fue enviado correctamente.');
                } else {
                    showModal('Error', response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                console.error('Detalles del error:', xhr.responseText);
                showModal('Error', 'Ocurrió un error inesperado. Intenta nuevamente.');
            }
        });
    });

    function showModal(title, message) {
        $('#modalTitle').text(title);
        $('#modalMessage').text(message); 
        $('#contactModal').fadeIn();
    }

    $('.close-modal').on('click', function () {
        $('#contactModal').fadeOut();
    });

    $(window).on('click', function (event) {
        if ($(event.target).is('#contactModal')) {
            $('#contactModal').fadeOut();
        }
    });
});

