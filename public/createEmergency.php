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
    <div id="contactModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2 id="modalTitle" class="modal-title">Mensaje Enviado</h2>
        <p id="modalMessage" class="modal-message">Tu mensaje se envió exitosamente.</p>
    </div>
</div>

<style>
/* Estilos del Modal */
.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.7);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    overflow: hidden;
}

.modal-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    max-width: 400px;
    text-align: center;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    width: 90%;
}

.modal-title {
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 10px;
}

.modal-message {
    font-size: 1em;
    color: #555;
    margin-bottom: 20px;
}

.close-modal {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
    transition: color 0.3s ease;
}

.close-modal:hover {
    color: #ff0000;
}
</style>


</main>


<script src="../assets/js/validateContact.js"></script>



<?php
include 'footer.php';
?>