<?php
include 'php/config.php'; // Connexion à la base de données
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Zoo Arcadia</title>
    <link rel="stylesheet" href="assets/css/admin.css"> <!-- Style CSS d'origine -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    <li class="nav-item"><a class="nav-link active" href="admin-dashboard.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard -->
    <main class="container py-5">
        <h1 class="text-center mb-4">Dashboard Administrateur</h1>
        
        <!-- Gestion des animaux -->
        <section class="mb-5">
            <h2>Gestion des animaux</h2>
            <a href="admin-add-animal.php" class="btn btn-success mb-3">Ajouter un animal</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Habitat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Récupérer les animaux depuis la base de données
                    $stmt = $pdo->query("SELECT animals.id, animals.name, habitats.name AS habitat_name FROM animals JOIN habitats ON animals.habitat_id = habitats.id");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['habitat_name']}</td>
                            <td>
                                <a href='admin-edit-animal.php?id={$row['id']}' class='btn btn-warning btn-sm'>Modifier</a>
                                <a href='admin-delete-animal.php?id={$row['id']}' class='btn btn-danger btn-sm'>Supprimer</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Gestion des habitats -->
        <section class="mb-5">
            <h2>Gestion des habitats</h2>
            <a href="admin-add-habitat.php" class="btn btn-success mb-3">Ajouter un habitat</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Récupérer les habitats depuis la base de données
                    $stmt = $pdo->query("SELECT * FROM habitats");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>
                                <a href='admin-edit-habitat.php?id={$row['id']}' class='btn btn-warning btn-sm'>Modifier</a>
                                <a href='admin-delete-habitat.php?id={$row['id']}' class='btn btn-danger btn-sm'>Supprimer</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Gestion des réservations -->
        <section class="mb-5">
            <h2>Gestion des réservations</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Récupérer les réservations depuis la base de données
                    $stmt = $pdo->query("SELECT * FROM reservations");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['message']}</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Zoo Arcadia. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
