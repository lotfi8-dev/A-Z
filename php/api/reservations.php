<?php
include '../config.php';

// Récupérer toutes les réservations (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT r.reservation_id, u.username, s.nom AS service, r.date 
                         FROM reservations r 
                         JOIN utilisateurs u ON r.utilisateur_id = u.username 
                         JOIN services s ON r.service_id = s.service_id");
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($reservations);
}

// Ajouter une nouvelle réservation (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO reservations (utilisateur_id, service_id, date) 
                           VALUES (:utilisateur_id, :service_id, :date)");
    $stmt->execute([
        ':utilisateur_id' => $data['utilisateur_id'],
        ':service_id' => $data['service_id'],
        ':date' => $data['date']
    ]);
    echo json_encode(['message' => 'Réservation ajoutée avec succès']);
}
?>
