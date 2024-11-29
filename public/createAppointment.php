<?php
include 'header.php';
?>

<main class="main__appointment">
    <div class="container">
        <h1 class="tileForm">Formulario de Citas Médicas  <p>Rellene el formulario de inscripción</p></h1>
        <form>

            <div class="fechaNacimiento">
                <h2>Fecha</h2>
                <input class="input-date" type="date" name="fecha" id="patientDate">
            </div>

            <div class="nombrePaciente">
                <h2>Hora</h2>
                <input class="input-nombre" type="time" name="nombre"  id="patientName">
            </div>
            

            <div class="generoPaciente">
                <h2>Motivo</h2>
                <input class="input-gender" type="text" name="genero" id="patientGender">
            </div>

            <div class="direccion">
                <h2>Medico</h2>
                <input class="input-direccion"type="text" name="direccion" id="directionpatient">
            </div>

            <input class="botonEnviar" type="button" value="Enviar" id="btnsubmit">
            
        </form>
    </div>
    <br><br>
</main>

<?php
include 'footer.php';
?>
