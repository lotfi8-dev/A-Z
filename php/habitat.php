<?php
include 'php/config.php'; // Connexion à la base de données

// Vérifier si un ID d'habitat est passé dans l'URL
if (isset($_GET['habitat_id'])) {
    $habitat_id = $_GET['habitat_id'];

    // Récupérer les informations de l'habitat
    $stmt_habitat = $pdo->prepare("SELECT * FROM habitats WHERE id = ?");
    $stmt_habitat->execute([$habitat_id]);
    $habitat = $stmt_habitat->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'habitat existe
    if (!$habitat) {
        die("Habitat non trouvé !");
    }

    // Récupérer les animaux de cet habitat
    $stmt_animaux = $pdo->prepare("SELECT * FROM animals WHERE habitat_id = ?");
    $stmt_animaux->execute([$habitat_id]);
    $animaux = $stmt_animaux->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("Aucun habitat spécifié !");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($habitat['name']); ?> - Zoo Arcadia</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="index.php">Zoo Arcadia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="animaux-zones.php">Habitats</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section Habitat -->
    <header class="hero-section text-center text-white py-5" style="background: url('<?= $habitat['image_url']; ?>') center/cover;">
        <h1><?= htmlspecialchars($habitat['name']); ?></h1>
        <p><?= htmlspecialchars($habitat['description']); ?></p>
    </header>

    <!-- Section Animaux -->
    <main class="container py-5">
        <h2 class="text-center mb-4">Les animaux de <?= htmlspecialchars($habitat['name']); ?></h2>
        <div class="row">
            <?php foreach ($animaux as $animal): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?= $animal['image']; ?>" class="card-img-top" alt="<?= htmlspecialchars($animal['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($animal['name']); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($animal['description']); ?></p>
                            <ul class="list-unstyled">
                                <li><strong>État :</strong> <?= htmlspecialchars($animal['etat']); ?></li>
                                <li><strong>Nourriture :</strong> <?= htmlspecialchars($animal['nourriture']); ?></li>
                                <li><strong>Dernière visite :</strong> <?= htmlspecialchars($animal['derniere_visite']); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Zoo Arcadia. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
