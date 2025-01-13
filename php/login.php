<?php
include 'config.php'; // Inclure la configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie si l'utilisateur existe
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] = $user; // Stocker l'utilisateur en session
        echo json_encode(['message' => 'Connexion réussie', 'role' => $user['role_id']]);
    } else {
        http_response_code(401);
        echo json_encode(['message' => 'Identifiants incorrects']);
    }
}
?>
