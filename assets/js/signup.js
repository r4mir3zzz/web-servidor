$(document).ready(function () {
    $('#formRegistro').on('submit', function (event) {
        event.preventDefault();

        const nombre = $('#nombre').val();
        const pApellido = $('#pApellido').val();
        const sApellido = $('#sApellido').val();
        const genero = $('#genero').val();
        const correo = $('#correo').val();
        const password = $('#password').val();
        const telefono = $('#telefono').val();
        const provincia = $('#provincia').val();
        const canton = $('#canton').val();
        const mensaje_adicional = $('#mensaje_adicional').val();

        $.ajax({
            url: 'http://localhost/web-servidor/endpoints/procesar_cuenta.php',
            method: 'POST',
            data: { nombre, pApellido, sApellido, genero, correo, password, telefono, provincia, canton, mensaje_adicional },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta:', response);
                if (response.success) {
                    alert('Cuenta creada con éxito.');
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud:', xhr.responseText);
                alert('Error en la solicitud.');
            }
        });
    });
});