<?php
include 'header.php';
?>



<main class="main__emergency">
    <div class="container">
        <h1 class="tileForm">Formulario de Emergencias  <p>Rellene el formulario cuidadosamente</p></h1>
        <form>
            <div class="nombrePaciente">
                <h2>Nombre</h2>
                <input class="input-nombre" type="text" name="nombre"  id="patientName">
            </div>

            <div class="generoPaciente">
                <h2>Apellido</h2>
                <input class="input-gender" type="text" name="genero" id="patientGender">
            </div>

            <div class="direccion">
                <h2>Telefono</h2>
                <input class="input-direccion"type="text" name="direccion" id="directionpatient">
            </div>
            <div class="telefono">
                <h2>Relacion</h2>
                <input class="input-email"type="text" name="telefono" id="phonepatient">
                
            </div>


            <input class="botonEnviar" type="button" value="Enviar" id="btnsubmit">
            
        </form>
    </div>
    <br><br>
</main>




<?php
include 'footer.php';
?>