<?php
include '../config.php';

// Récupérer tous les habitats (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM habitats");
    $habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($habitats);
}

// Ajouter un habitat (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO habitats (nom, description, commentaire_habitat) VALUES (:nom, :description, :commentaire)");
    $stmt->execute([
        ':nom' => $data['nom'],
        ':description' => $data['description'],
        ':commentaire' => $data['commentaire_habitat']
    ]);
    echo json_encode(['message' => 'Habitat ajouté avec succès']);
}

//afficher les habitats//
fetch('/php/api/habitats.php')
    .then(response => response.json())
    .then(data => {
        const habitatContainer = document.getElementById('habitat-list');
        data.forEach(habitat => {
            habitatContainer.innerHTML += `
                <div>
                    <h3>${habitat.nom}</h3>
                    <p>${habitat.description}</p>
                    <p>${habitat.commentaire_habitat}</p>
                </div>
            `;
        });
    });


// Modifier un habitat (PUT)
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("UPDATE habitats SET nom = :nom, description = :description, commentaire_habitat = :commentaire WHERE habitat_id = :id");
    $stmt->execute([
        ':nom' => $data['nom'],
        ':description' => $data['description'],
        ':commentaire' => $data['commentaire_habitat'],
        ':id' => $data['habitat_id']
    ]);
    echo json_encode(['message' => 'Habitat modifié avec succès']);
}

// Supprimer un habitat (DELETE)
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM habitats WHERE habitat_id = ?");
    $stmt->execute([$_GET['id']]);
    echo json_encode(['message' => 'Habitat supprimé']);
}
?>
