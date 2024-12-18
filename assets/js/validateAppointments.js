document.addEventListener("DOMContentLoaded", function() {
    const createForm = document.getElementById("createForm");
    const editForm = document.getElementById("editForm");

    function validateForm(event, fechaId, horaId, motivoId, medicoId) {
        let fecha = document.getElementById(fechaId).value.trim();
        let hora = document.getElementById(horaId).value.trim();
        let motivo = document.getElementById(motivoId).value.trim();
        let medico = document.getElementById(medicoId).value.trim();
        let errorMessage = "";

        if (fecha === "") {
            errorMessage += "El campo Fecha es obligatorio.\n";
        } else {
            let today = new Date().toISOString().split('T')[0];
            if (fecha < today) {
                errorMessage += "La fecha de la cita no puede ser en el pasado.\n";
            }
        }
        if (hora === "") {
            errorMessage += "El campo Hora es obligatorio.\n";
        }
        if (motivo === "") {
            errorMessage += "El campo Motivo es obligatorio.\n";
        }
        if (medico === "") {
            errorMessage += "El campo Médico es obligatorio.\n";
        }

        if (errorMessage !== "") {
            alert(errorMessage);
            event.preventDefault();
            return false;
        }
        return true;
    }

    if (createForm) {
        createForm.addEventListener("submit", function(event) {
            if (!validateForm(event, "appointmentDate", "appointmentTime", "appointmentMotivo", "appointmentMedico")) {
                event.preventDefault();
            }
        });
    }

    if (editForm) {
        editForm.addEventListener("submit", function(event) {
            if (!validateForm(event, "editFecha", "editHora", "editMotivo", "editMedico")) {
                event.preventDefault();
            }
        });
    }
});
