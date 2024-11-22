<?php

function getContinents($conn) {
    global $conn;
    try {
        $sql = "SELECT id, nom_continent FROM continents";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return ($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}

// Función para obtener el precio base del país seleccionado
function getCountryPrice($pais_id) {
    global $conn;
    $sql = "SELECT preu_base FROM paisos WHERE id = :pais_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pais_id', $pais_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['preu_base'] ?? 0; // Devuelve 0 si no se encuentra el precio
}

// Función para obtener el precio de un país
function getPrice($conn, $paisId) {
    $sql = "SELECT preu FROM paisos WHERE id = :pais_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pais_id', $paisId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Función para insertar el viaje
function insertTravel($travel) {
    global $conn;

    // Calcular el precio total: precio base del país * número de personas
    $preu_base = getCountryPrice($travel['pais_id']);
    $preu_total = $preu_base * $travel['num_persones'];

    // Si hay descuento, aplicar un 20% de descuento
    if (isset($travel['descompte']) && $travel['descompte'] === 'on') {
        $preu_total *= 0.80; // Descuento del 20%
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO viatges (nom, telefon, num_persones, data, preu, pais_id) 
            VALUES (:nom, :telefon, :num_persones, :data, :preu, :pais_id)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nom', $travel['nom']);
    $stmt->bindParam(':telefon', $travel['telefon']);
    $stmt->bindParam(':num_persones', $travel['num_persones']);
    $stmt->bindParam(':data', $travel['data']);
    $stmt->bindParam(':preu', $preu_total);
    $stmt->bindParam(':pais_id', $travel['pais_id']);

    // Ejecutar la consulta
    $stmt->execute();
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addTravel') {
    // Recoger los datos del formulario
    $travel = [
        'nom' => $_POST['nom'],
        'telefon' => $_POST['telefon'],
        'num_persones' => $_POST['num-persones'],
        'data' => $_POST['data-viatge'],
        'preu' => $_POST['preu'], // Esto se calcula dentro del PHP
        'pais_id' => $_POST['pais'],
        'descompte' => isset($_POST['descompte']) ? $_POST['descompte'] : null
    ];

    // Insertar el viaje en la base de datos
    insertTravel($travel);

    // Redirigir de nuevo al index.html
    exit;
}

function getCountries($conn, $continentId) {
    
        $sql = "SELECT id, nom_pais FROM paisos WHERE continent_id = :continent_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':continent_id', $continentId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}
?>
