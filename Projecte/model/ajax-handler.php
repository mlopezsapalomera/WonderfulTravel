<?php
require_once 'database.php';

global $conn;

$action = isset($_GET['action']) ? $_GET['action'] : '';

//DEBUGG
$action = 'getContinents';


switch ($action) {
    case 'getContinents':
        getContinents($conn);
        break;
    // Puedes agregar más casos aquí para manejar otras solicitudes AJAX
    default:
        echo json_encode(['error' => 'Acción no válida']);
        break;
}

function getContinents($conn) {
    try {
        $sql = "SELECT id, nom_continent FROM continents";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $continents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($continents);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>