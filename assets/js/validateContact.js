$(document).ready(function () {
    $('#contactForm').on('submit', function (event) {
        event.preventDefault();

        const name = $('#name').val().trim();
        const email = $('#email').val().trim();
        const message = $('#message').val().trim();

        if (!name || !email || !message) {
            showModal('Error', 'Todos los campos son obligatorios.');
            return;
        }

        $.ajax({
            url: 'http://localhost/web-servidor/endpoints/sendMessage.php',
            method: 'POST',
            data: { 
                name__message: name, 
                email__message: email, 
                message_text: message 
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showModal('Éxito', 'Tu mensaje se envió correctamente.');
                    $('#contactForm')[0].reset();
                } else {
                    showModal('Error', response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
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
