<?php
require_once 'database.php';
global $conn;

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'getContinents':
        getContinents($conn);
        break;
    case 'getCountries':
        $continentId = isset($_GET['continent_id']) ? $_GET['continent_id'] : '';
        getCountries($conn, $continentId);
        break;
    case 'getPrice':
        $paisId = isset($_GET['pais_id']) ? $_GET['pais_id'] : '';
        getPrice($conn, $paisId);
        break;
    default:
        echo json_encode(['error' => 'Acción no válida']);
        break;
}

function getContinents($conn) {
    try {
        $sql = "SELECT id, nom_continent FROM continents";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function getCountries($conn, $continentId) {
    try {
        $sql = "SELECT id, nom_pais FROM paisos WHERE continent_id = :continent_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':continent_id', $continentId, PDO::PARAM_INT);
        $stmt->execute();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}


function getPrice($conn, $paisId) {
    try {
        $sql = "SELECT preu FROM paisos WHERE id = :pais_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':pais_id', $paisId, PDO::PARAM_INT);
        $stmt->execute();
        $price = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($price);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>
