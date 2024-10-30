<?php
require_once 'model/database.php';


function getTravels()
{
    global $conn;

    $sql = "SELECT * FROM viatges";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function insertTravel($travel) {
    global $conn;

    $sql = "INSERT INTO viatges (nom, telefon, num_persones, data, preu, pais_id) 
            VALUES (:nom, :telefon, :num_persones, :data, :preu, :pais_id)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nom', $travel['nom']);
    $stmt->bindParam(':telefon', $travel['telefon']);
    $stmt->bindParam(':num_persones', $travel['num_persones']);
    $stmt->bindParam(':data', $travel['data']);
    $stmt->bindParam(':preu', $travel['preu']);
    $stmt->bindParam(':pais_id', $travel['pais_id']);

    $stmt->execute();
}
