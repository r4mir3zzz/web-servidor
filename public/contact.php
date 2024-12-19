<?php
include_once('header.php');
?>

<main class="main__contact">
    
    <section class="section__social">
        <div>
            <h2 class="title_contact">Ubicación</h2>
            <p class="text__contact">Heredia, oxigeno</p>
        </div>

        <div>
            <h2 class="title_contact">Síguenos</h2>
            <ul class="list__contact">
                <li><i class="fab fa-facebook"></i></li>
                <li><i class="fab fa-instagram"></i></li>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-whatsapp"></i></li>
            </ul>
        </div>
    </section>

    <section class="section__contact">
        <h2 class="title_contact">Formulario de contacto</h2>
        
        <form id="contactForm" class="form__contact" method="POST">
            <input type="text" name="name__message" id="name" placeholder="Ingrese su nombre" required>
            <input type="email" name="email__message" id="email" placeholder="Ingrese su email" required>
            <textarea name="message_text" id="message" placeholder="Ingrese su mensaje" required></textarea>
            <input type="submit" class="btnContact" value="Enviar mensaje">
        </form>
    </section>

    <div id="contactModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2 id="modalTitle" class="modal-title">Mensaje Enviado</h2>
        <p id="modalMessage" class="modal-message">Tu mensaje se envió exitosamente.</p>
    </div>
</div>

<style>
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
