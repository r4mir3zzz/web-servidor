$(document).ready(function () {
    $('#createMedicineForm').on('submit', function (event) {
        event.preventDefault();

        const name = $('#medicineName').val().trim();
        const description = $('#medicineDescription').val().trim();
        const dosis = $('#medicineDosis').val().trim();
        const frequency = $('#medicineQuantity').val().trim();

        if (!name || !description || !dosis || !frequency) {
            $('#errorMessages').text('Todos los campos son obligatorios').css('color', 'red');
            return;
        }

        $('#errorMessages').text('');

        $.ajax({
            url: 'http://localhost/web-servidor/endpoints/procesar_medicine.php',
            method: 'POST',
            data: { name, description, dosis, frequency },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Medicamento agregado exitosamente');
                    window.location.href = './showMedications.php';
                } else {
                    $('#errorMessages').text(response.message).css('color', 'red');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                console.error('Detalles del error:', xhr.responseText);
                $('#errorMessages').text('Ocurrió un error inesperado. Intenta nuevamente.').css('color', 'red');
            }
        });
    });
});
