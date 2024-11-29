<?php
include 'header.php';
?>

<main class="mainLogin">
    <div class="login-container">
        <h2 class="welcomeMessage">Bienvenido a MediTrack!</h2>
            <?php
                include "../config/conexion.php";
                include "./verify.php";
            ?>
        <form action="" method="post" class="formLogin">
            <label for="correo" class="labelLogin">Correo electrónico</label>
            <input type="text" id="username" name="username" class="inputLogin">
            
            <label for="password" class="labelLogin">Contraseña</label>
            <input type="password" id="password" name="password" class="inputLogin" >
            
            <input type="submit" value="Iniciar Sesion" class="btningresar" name="btningresar">
            <p class="signup-link">¿No tienes cuenta? <a href="signup.php">Regístrate aquí</a></p>
            </form>
    </div>
</main>

