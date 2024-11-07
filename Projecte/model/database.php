<?php
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'wonderful_travel';
const DB_HOST = '127.0.0.1';
const DB_CHARSET = 'utf8mb4';

try {
    // Generar el DSN->(Data Source Name)
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

    // Creem una nova connexió PDO
    $conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    die();
}
