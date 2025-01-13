<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Connexion</title>
    <meta name="description" content="Connectez-vous pour accéder à votre espace personnel au Zoo Arcadia. Gérez vos réservations et vos préférences !">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="/images/logo.png" alt="Logo Zoo Arcadia" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="animaux-zones.php">Animaux & Zones</a></li>
                    <li class="nav-item"><a class="nav-link" href="Activités.html">Activités</a></li>
                    <li class="nav-item"><a class="nav-link" href="Reservation.html">Réservation</a></li>
                    <li class="nav-item"><a class="nav-link" href="a-propos.html">À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active btn btn-outline-light ms-2" href="connexion.html">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section Connexion -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Connectez-vous</h2>
                <form action="php/login.php" method="POST">
                    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <button type="submit">Se connecter</button>
                </form>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                    </div>
                    <a href="#" class="text-primary">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Se connecter</button>
            </form>
            <p class="text-center mt-4">Pas encore inscrit ? <a href="#" class="text-primary">Créez un compte</a></p>
        </div>
    </section>

    <!-- Section Conseils de Sécurité -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Conseils de Sécurité</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Utilisez un mot de passe complexe et unique.</li>
                <li class="list-group-item">Ne partagez jamais vos identifiants de connexion.</li>
                <li class="list-group-item">Déconnectez-vous après avoir utilisé un appareil public.</li>
                <li class="list-group-item">Contactez notre support en cas de doute ou d'activité suspecte.</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Zoo Arcadia. Tous droits réservés.</p>
            <a href="/pages/mention-legale.html" class="text-white">Mentions légales</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
