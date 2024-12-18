<?php
include 'header.php';
include '../config/sessionHandler.php';
checkSession(); 


?>



<main class="main__emergency">
    <div class="containerEm">
        <h1 class="tileForm">Formulario Contacto de Emergencia  <p>Rellene el formulario cuidadosamente</p></h1>
        
        <form action="" method="POST" id="formEmergency" class="form-emergency">
            <label>Nombre</label>
            <input class="input-nombre" type="text" name="name" id="nombreCE">
            <br><br>
            <label>Apellido</label>
            <input class="input-gender" type="text" name="lastName" id="apellidoCE">
            <br><br>
            <label>Telefono</label>
            <input class="input-direccion" type="text" name="phone" id="telefonoCE">
            <br><br>
            <label>Relacion</label>
            <input class="input-email" type="text" name="relationship" id="relacionCE">
            <br><br>
            <input class="botonEnviar" type="submit" value="Enviar" id="btnsubmit">
        </form>
        <div id="errorMessage"></div>
    </div>
</main>




    </div>
</main>




<?php
include 'footer.php';
?>