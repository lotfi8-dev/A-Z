<?php
include 'php/config.php'; // Connexion à la base de données
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Accueil</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barre de navigation -->
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
                    <li class="nav-item"><a class="nav-link" href="activites.php">Activités</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section Hero -->
    <header class="hero-section text-center text-white py-5 bg-primary">
        <h1>Bienvenue au Zoo Arcadia</h1>
        <p>Découvrez des habitats fascinants et des animaux exotiques.</p>
        <a href="reservation.php" class="btn btn-warning btn-lg mt-3">Réservez votre visite</a>
    </header>

    <!-- Section Habitats -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nos Habitats</h2>
            <div class="row">
                <?php
                // Récupérer les habitats depuis la base de données
                $stmt = $pdo->prepare("SELECT * FROM habitats");
                $stmt->execute();
                $habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($habitats as $habitat) {
                    echo "
                    <div class='col-md-4 mb-4'>
                        <div class='card'>
                            <img src='{$habitat['image_url']}' class='card-img-top' alt='{$habitat['name']}'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$habitat['name']}</h5>
                                <p class='card-text'>{$habitat['description']}</p>
                                <a href='habitat.php?habitat_id={$habitat['id']}' class='btn btn-success'>Explorer</a>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Section Avis -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Ce que disent nos visiteurs</h2>
            <div class="row">
                <?php
                // Récupérer les avis validés depuis la base de données
                $stmt = $pdo->prepare("SELECT * FROM reviews WHERE status = 'validé' LIMIT 3");
                $stmt->execute();
                $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($avis as $avis_item) {
                    echo "
                    <div class='col-md-4'>
                        <div class='card p-3'>
                            <blockquote class='blockquote'>
                                <p>{$avis_item['content']}</p>
                                <footer class='blockquote-footer'>{$avis_item['author']}</footer>
                            </blockquote>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Zoo Arcadia. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
