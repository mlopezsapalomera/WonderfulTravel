<?php

require "model/travel.model.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

// DEBUGGING
$action = 'ajaxContinents';

switch ($action) {
    case 'ajaxContinents':
        ajaxContinents();
        break;
    case 'ajaxCountries':
        $continentId = isset($_GET['continent_id']) ? $_GET['continent_id'] : '';
        ajaxCountries($continentId);
        break;
    case 'ajaxPrice':
        $paisId = isset($_GET['pais_id']) ? $_GET['pais_id'] : '';
        ajaxPrice($paisId);
        break;
    default:
        echo json_encode(['error' => 'Acción no válida']);
        break;
}

function ajaxContinents() {
    try {
        $continents = getContinents();
        echo json_encode($continents);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function ajaxCountries($conn, $continentId) {
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

function ajaxPrice($conn, $paisId) {
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
