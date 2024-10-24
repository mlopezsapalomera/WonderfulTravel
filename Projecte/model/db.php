<?php
$servername = "localhost";  // Cambiar si es necesario
$username = "alexisYmarcos";         // Usuario de tu base de datos
$password = "1234";             // Contraseña de tu base de datos
$dbname = "wonderfull-travels"; // Cambiar al nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
