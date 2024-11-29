<?php

$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $variables = parse_ini_file($envPath);
    foreach ($variables as $key => $value) {
        putenv("$key=$value");
    }
}

$server = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db = getenv('DB_NAME');

$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_errno) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
