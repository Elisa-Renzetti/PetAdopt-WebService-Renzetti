<?php
/*
  WEB SERVICE LATO SERVER
  Fornisce i dati del rifugio in formato JSON.
*/

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

// Configurazione parametri database
$host = "localhost";
$db_name = "rifugio_db";
$username = "root";
$password = "";

// Connessione al database
$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connessione fallita: " . $conn->connect_error]);
    exit;
}

// Controllo se è stato richiesto un filtro per specie (es. ?specie=Cane)
$specie = isset($_GET['specie']) ? $conn->real_escape_string($_GET['specie']) : "";

$query = "SELECT * FROM animali";
if ($specie != "") {
    $query .= " WHERE specie = '$specie'";
}

$result = $conn->query($query);
$animali = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $animali[] = $row;
    }
    // Restituisce la lista in JSON
    echo json_encode($animali, JSON_PRETTY_PRINT);
} else {
    echo json_encode(["message" => "Nessun animale trovato."]);
}

$conn->close();
?>
