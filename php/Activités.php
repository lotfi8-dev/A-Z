<?php
include 'php/config.php'; // Connexion à la base de données

// Récupérer les activités depuis la base de données
$stmt = $pdo->query("SELECT * FROM activities");
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités - Zoo Arcadia</title>
    <link rel="stylesheet" href="css/Activités.css">
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
                    <li class="nav-item"><a class="nav-link active" href="activites.php">Activités</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section Activités -->
    <main class="container py-5">
        <h1 class="text-center mb-4">Nos Activités</h1>
        <div class="row">
            <?php foreach ($activities as $activity): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $activity['image']; ?>" class="card-img-top" alt="<?= htmlspecialchars($activity['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($activity['name']); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($activity['description']); ?></p>
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
