<?php
// Incluir el archivo de conexión
session_start();
 
include '../config/conexion.php';
 
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
       
        $usuario = $_POST["username"];
        $password = $_POST["password"];
 
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE email = ? AND contrasena = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();
 
        if ($datos = $result->fetch_object()) {
           
            $_SESSION["id"]=$datos->usuario_id;
            $_SESSION["nombre"]=$datos->nombre;
 
            header("Location: index.php");
            exit();
 
        } else {
            echo "<div>Acceso denegado</div>";
        }
 
        $stmt->close();
    } else {
        echo "Campos vacíos";
    }
}
 
$conn->close();
?>
 