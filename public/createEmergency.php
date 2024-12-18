<?php
include 'header.php';
include '../config/sessionHandler.php';
checkSession(); 


?>



<main class="main__emergency">
    <div class="containerEm">
        <h1 class="tileForm">Formulario Contacto de Emergencia  
        <p>Rellene el formulario cuidadosamente</p></h1>
        
        <form action="" method="POST" id="formEmergency" class="form-emergency">
            <label>Nombre</label>
            <input class="input-nombre" type="text" name="name" id="nombreCE">
            <label>Apellido</label>
            <input class="input-gender" type="text" name="lastName" id="apellidoCE">
            <label>Telefono</label>
            <input class="input-direccion" type="text" name="phone" id="telefonoCE">
            <label>Relacion</label>
            <input class="input-email" type="text" name="relationship" id="relacionCE">
            <div id="errorMessage"></div>
            <input class="botonEnviar" type="submit" value="Enviar" id="btnsubmit">
        </form>
        
    </div>
</main>




    </div>
</main>




<?php
include 'footer.php';
?>