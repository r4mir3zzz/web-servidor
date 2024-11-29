<?php
include 'header.php';
?>

<main class="main-signup">
    <div class="div-signup">
        <h2 class="welcomeMessage">Crear Cuenta en MediTrack</h2>
        <?php
            include "../config/conexion.php";
            //include "./register.php";
        ?>
        <form action="" method="post" class="">
            <label for="nombre" class="labelSign">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="inputLogin" required>

            <label for="pApellido" class="labelSign">Primer Apellido</label>
            <input type="text" id="pApellido" name="pApellido" class="inputLogin" required>

            <label for="sApellido" class="labelSign">Segundo Apellido</label>
            <input type="text" id="sApellido" name="sApellido" class="inputLogin" required>

            <label for="genero" class="labelSign">Género</label>
            <select id="genero" name="genero" class="inputLogin" required>
                <option value="">Selecciona tu género</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
                <option value="Prefiero no decir">Prefiero no decir</option>
            </select>

            <label for="correo" class="labelSign">Correo electrónico</label>
            <input type="email" id="correo" name="correo" class="inputLogin" required>
            
            <label for="password" class="labelSign">Contraseña</label>
            <input type="password" id="password" name="password" class="inputLogin" required>

            <label for="telefono" class="labelSign">Telefono</label>
            <input type="text" id="telefono" name="telefono" class="inputLogin" required>

            <label for="provincia" class="labelSign">Provincia</label>
            <input type="text" id="provincia" name="provincia" class="inputLogin" required>

            <label for="canton" class="labelSign">Canton</label>
            <input type="text" id="canton" name="canton" class="inputLogin" required>

            <label for="mensaje_adicional" class="labelSign">Mensaje Adicional:</label>
            <textarea id="mensaje_adicional" name="mensaje_adicional" rows="4" cols="50" class="inputLogin"></textarea>
        
            
            <input type="submit" value="Crear Cuenta" class="btncrear" name="btncrear">
            <p class="signup-link">¿Ya tienes cuenta? <a href="login.php">Inicia Sesión aquí</a></p>
        </form>
    </div>
</main>