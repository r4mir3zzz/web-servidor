$(document).ready(function () {
    $('.formLogin').on('submit', function (event) {
        event.preventDefault();

        const email = $('#username').val();
        const password = $('#password').val();

        $('#errorMessage').text('');

        $.ajax({
            url: 'http://localhost/web-servidor/endpoints/procesar_login.php',
            method: 'POST',
            data: {
                email: email,
                password: password
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = 'index.php';
                } else {
                    $('#errorMessage').text(response.message).css('color', 'red');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                $('#errorMessage').text('Ocurrió un error inesperado. Intenta nuevamente.').css('color', 'red');
            }
        });
    });
});
