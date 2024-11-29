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
            <h2 class="title_contact">Siguenos</h2>
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
        <?php
            include "../config/conexion.php";
            include "../public/sendMessage.php";
        ?>
        
        <form id="contactForm" class="form__contact" method="POST">
            <input type="text" name="name__message" id="name" placeholder="Ingrese su nombre" >
            <input type="email" name="email__message" id="email" placeholder="Ingrese su email" >
            <textarea name="message_text" id="message" placeholder="Ingrese su mensaje" ></textarea>
            <input type="submit" class="btnContact" value="Enviar mensaje">
        </form>

    </section>
    <script src="../assets/js/validateContact.js"></script>
</main>
<?php
include_once('footer.php');
?>