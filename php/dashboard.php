<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] !== 1) {
    http_response_code(403); // Interdit si non admin
    die("Accès non autorisé");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Zoo Arcadia</title>
</head>
<body>
    <h1>Bienvenue sur le tableau de bord</h1>
    <ul>
        <li><a href="/php/api/habitats.php">Gérer les habitats</a></li>
        <li><a href="/php/api/animals.php">Gérer les animaux</a></li>
        <li><a href="/php/api/services.php">Gérer les services</a></li>
        <li><a href="/php/api/reservations.php">Voir les réservations</a></li>
        <li><a href="/php/api/statistics.php">Voir les statistiques</a></li>
    </ul>
</body>
</html>
