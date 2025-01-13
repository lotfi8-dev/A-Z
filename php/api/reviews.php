<?php
include '../config.php';

// Ajouter un avis (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO avis (pseudo, commentaire, isVisible) VALUES (:pseudo, :commentaire, 0)");
    $stmt->execute([
        ':pseudo' => $data['pseudo'],
        ':commentaire' => $data['commentaire']
    ]);
    echo json_encode(['message' => 'Avis soumis avec succès, en attente de validation']);
}

// Récupérer les avis validés (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM avis WHERE isVisible = 1");
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($reviews);
}
?>
