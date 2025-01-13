<?php
include '../config.php';

// Récupérer le nombre total de visiteurs
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['type'])) {
    if ($_GET['type'] === 'visiteurs') {
        $stmt = $pdo->query("SELECT COUNT(*) AS total_visiteurs FROM utilisateurs WHERE role_id = 3");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

    // Récupérer le nombre total de réservations
    if ($_GET['type'] === 'reservations') {
        $stmt = $pdo->query("SELECT COUNT(*) AS total_reservations FROM reservations");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
}
?>
