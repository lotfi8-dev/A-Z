<?php
include '../config.php';

// Récupérer tous les services (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM services");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($services);
}

// Ajouter un nouveau service (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO services (nom, description) VALUES (:nom, :description)");
    $stmt->execute([
        ':nom' => $data['nom'],
        ':description' => $data['description']
    ]);
    echo json_encode(['message' => 'Serv
