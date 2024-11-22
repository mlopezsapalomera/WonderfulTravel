<?php

require_once __DIR__ . '/../model/database.php';
require __DIR__ . "/../model/travel.model.php";

Database::getInstance()->getConnection();

$action = isset($_GET['action']) ? $_GET['action'] : '';

// DEBUGGING

switch ($action) {
    case 'ajaxContinents':
        ajaxContinents($conn);
        break;
    case 'ajaxCountries':
        $continentId = isset($_GET['continent_id']) ? $_GET['continent_id'] : '';
        ajaxCountries($conn, $continentId);
        break;
    case 'ajaxPrice':
        $paisId = isset($_GET['pais_id']) ? $_GET['pais_id'] : '';
        ajaxPrice($conn, $paisId);
        break;
    default:
        echo json_encode(['error' => 'Acción no válida']);
        break;
}

function ajaxContinents($conn)
{
    try {
        $continents = getContinents($conn);
        echo json_encode($continents);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function ajaxCountries($conn, $continentId)
{
    try {
        $countries = getCountries($conn, $continentId);
        echo json_encode($countries);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function ajaxPrice($conn, $paisId)
{
    try {
        $price = getPrice($conn, $paisId);
        echo json_encode($price);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
