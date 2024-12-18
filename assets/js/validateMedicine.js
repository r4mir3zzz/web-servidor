document.addEventListener("DOMContentLoaded", function() {
    const createMedicineForm = document.getElementById("createMedicineForm");
    const editForm = document.getElementById("editForm");

    function validateMedicineForm(event, nameId, descriptionId, dosisId, frecuenciaId) {
        let name = document.getElementById(nameId).value.trim();
        let description = document.getElementById(descriptionId).value.trim();
        let dosis = document.getElementById(dosisId).value.trim();
        let frecuencia = document.getElementById(frecuenciaId).value.trim();
        let errorMessage = "";

        if (name === "") {
            errorMessage += "El campo Nombre del Medicamento es obligatorio.\n";
        }
        if (description === "") {
            errorMessage += "El campo Descripción es obligatorio.\n";
        }
        if (dosis === "") {
            errorMessage += "El campo Dosis es obligatorio.\n";
        } else if (parseFloat(dosis) === 0) {
            errorMessage += "El campo Dosis no puede ser 0.\n";
        } else if (parseFloat(dosis) < 0) {
            errorMessage += "El campo Dosis no puede ser un número negativo.\n";
        }
        if (frecuencia === "") {
            errorMessage += "El campo Frecuencia es obligatorio.\n";
        } else if (parseInt(frecuencia) === 0) {
            errorMessage += "El campo Frecuencia no puede ser 0.\n";
        } else if (parseInt(frecuencia) < 0) {
            errorMessage += "El campo Frecuencia no puede ser un número negativo.\n";
        }

        if (errorMessage !== "") {
            alert(errorMessage);
            event.preventDefault();
            return false;
        }
        return true;
    }

    if (createMedicineForm) {
        createMedicineForm.addEventListener("submit", function(event) {
            if (!validateMedicineForm(event, "medicineName", "medicineDescription", "medicineDosis", "medicineQuantity")) {
                event.preventDefault();
            }
        });
    }

    if (editForm) {
        editForm.addEventListener("submit", function(event) {
            if (!validateMedicineForm(event, "editNombre", "editDescripcion", "editDosis", "editFrecuencia")) {
                event.preventDefault();
            }
        });
    }
});
