<?php
include '../config.php';

// Enregistrer un message de contact
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO contacts (nom, email, message) VALUES (:nom, :email, :message)");
    $stmt->execute([
        ':nom' => $data['nom'],
        ':email' => $data['email'],
        ':message' => $data['message']
    ]);
    echo json_encode(['message' => 'Message de contact envoyé avec succès']);
}
?>
