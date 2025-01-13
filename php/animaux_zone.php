<?php
include '..php/config.php'; // Fichier de connexion à la base de données

// Récupération de l'ID de l'habitat depuis l'URL
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

    // Récupérer les animaux associés à cet habitat
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
    <link rel="stylesheet" href="/css/pages-habitats.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand text-success fw-bold" href="index.php">Zoo Arcadia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="animaux-zones.php">Animaux & Zones</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservation.php">Réservation</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section Héros (Carrousel) -->
    <header class="hero-section">
        <div id="carouselHabitat" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= $habitat['image_url']; ?>" class="d-block w-100" alt="<?= htmlspecialchars($habitat['name']); ?>">
                </div>
            </div>
            <div class="carousel-caption">
                <h1 class="text-white"><?= htmlspecialchars($habitat['name']); ?></h1>
                <p><?= htmlspecialchars($habitat['description']); ?></p>
            </div>
        </div>
    </header>

    <!-- Section principale -->
    <main class="container py-5">
        <section class="about-section text-center mb-5">
            <h2 class="mb-4">À propos de <?= htmlspecialchars($habitat['name']); ?></h2>
            <p class="lead"><?= htmlspecialchars($habitat['description']); ?></p>
        </section>

        <!-- Liste des animaux -->
        <section>
            <h2 class="text-primary text-center mb-4">Animaux de <?= htmlspecialchars($habitat['name']); ?></h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($animaux as $animal): ?>
                    <div class="col">
                        <div class="card animal-card shadow-lg">
                            <img src="<?= $animal['image']; ?>" class="card-img-top" alt="<?= htmlspecialchars($animal['name']); ?>">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= htmlspecialchars($animal['name']); ?></h5>
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
        </section>

        <!-- Section interactive -->
        <section class="stats-section my-5 p-4 text-white">
            <h2 class="text-center">Saviez-vous ?</h2>
            <ul class="mt-3">
                <li>La <?= htmlspecialchars($habitat['name']); ?> abrite <?= count($animaux); ?> animaux uniques.</li>
                <li>Chaque animal a un suivi vétérinaire rigoureux.</li>
                <li>Visitez cette zone pour des expériences uniques !</li>
            </ul>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-center text-white py-4">
        <p>&copy; 2025 Zoo Arcadia. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
