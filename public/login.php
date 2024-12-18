<?php
include 'header.php';
?>

<main class="mainLogin">
    <div class="login-container">
        <h2 class="welcomeMessage">¡Bienvenido a MediTrack!</h2>
        
        <div id="errorMessage" style="color: red;">

        </div>

        <form action="" method="post" class="formLogin">
            <label for="username" class="labelLogin">Correo electrónico</label>
            <input type="text" id="username" name="username" class="inputLogin" required>
            
            <label for="password" class="labelLogin">Contraseña</label>
            <input type="password" id="password" name="password" class="inputLogin" required>
            
            <input type="submit" value="Iniciar Sesión" class="btningresar" name="btningresar">
            <p class="signup-link">¿No tienes cuenta? <a href="signup.php">Regístrate aquí</a></p>
        </form>
    </div>
</main>
