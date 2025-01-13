<?php
session_start(); // Démarre la session
session_destroy(); // Détruit la session actuelle
echo json_encode(['message' => 'Déconnexion réussie']);
?>
