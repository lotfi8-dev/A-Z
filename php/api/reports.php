<?php
include '../config.php';

// Récupérer tous les rapports pour un animal spécifique (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['animal_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM rapports_veterinaires WHERE animal_id = ?");
    $stmt->execute([$_GET['animal_id']]);
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($reports);
}

// Ajouter un nouveau rapport (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO rapports_veterinaires (animal_id, date, detail) 
                           VALUES (:animal_id, :date, :detail)");
    $stmt->execute([
        ':animal_id' => $data['animal_id'],
        ':date' => $data['date'],
        ':detail' => $data['detail']
    ]);
    echo json_encode(['message' => 'Rapport ajouté avec succès']);
}
?>
