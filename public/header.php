<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/header-footer.css">
    <link rel="stylesheet" href="../assets/css/mainIndex.css">
    <link rel="stylesheet" href="../assets/css/createAppointment.css">
    <link rel="stylesheet" href="../assets/css/createMedicine.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/contactMessage.css">
    <link rel="stylesheet" href="../assets/css/viewAppoint.css">
    <link rel="stylesheet" href="../assets/css/showAp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/emergency.js"></script>
    <script src="../assets/js/signup.js"></script>
    <script src="../assets/js/updateEmergency.js"></script>
    <script src="../assets/js/updateAppointment.js"></script>
    <script src="../assets/js/medicine.js"></script>
    <script src="../assets/js/validateContac.js"></script>
</head>
</head>
<body>
<header class="header-prin">
    <nav class="header-nav">
        <a href="index.php" aria-label="Página de inicio" class="logo">
            <img src="../assets/img/MediTracksvg.svg" class="logo-header" alt="Logotipo de MediTrack">
        </a>
        <ul class="header-list">
        <?php if (isset($_SESSION['id'])): ?>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        <?php else: ?>
            <li><a href="login.php">Inicio de sesión</a></li>
            <li><a href="signup.php">Crear Cuenta</a></li>
        <?php endif; ?>
            <li class="navbar dropdown"> 
                Servicios
                <div class="dropdown-content">
                    <div class="submenu">
                        <a href="">Citas Medicas</a>
                        <div class="sub-submenu">
                            <a href="createAppointment.php">Crear cita</a>
                            <a href="showAppoin.php">Mostrar cita</a>
                        </div>
                    </div>
                    <div class="submenu">
                        <a href="#">Contactos de Emergencia</a>
                        <div class="sub-submenu">
                            <a href="createEmergency.php">Crear Contacto</a>
                            <a href="showEmergency.php">Mostrar Contacto</a>
                        </div>
                    </div>
                    <div class="submenu">
                        <a href="#">Medicamentos</a>
                        <div class="sub-submenu">
                            <a href="createMedicine.php">Crear medicaciones</a>
                            <a href="showMedications.php">Mostrar medicaciones</a>
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="contact.php">Contacto</a></li>
        </ul>
    </nav>
</header>

    
    <body>
