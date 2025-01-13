<?php
include '../config.php';

// Récupérer les animaux d'un habitat spécifique (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['habitat_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM animaux WHERE habitat_id = ?");
    $stmt->execute([$_GET['habitat_id']]);
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($animals);
}

// Ajouter un nouvel animal (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO animaux (prenom, etat, habitat_id) VALUES (:prenom, :etat, :habitat_id)");
    $stmt->execute([
        ':prenom' => $data['prenom'],
        ':etat' => $data['etat'],
        ':habitat_id' => $data['habitat_id']
    ]);
    echo json_encode(['message' => 'Animal ajouté avec succès']);
}
?>
