-- Insérer les habitats
INSERT INTO habitats (id, name, description, image_url) VALUES
(1, 'Jungle', 'La jungle est un écosystème dense et riche où vivent des animaux exotiques fascinants.', '/images/jungle.png'),
(2, 'Savane', 'La savane est une vaste plaine où cohabitent des animaux majestueux et impressionnants.', '/images/savane4.png'),
(3, 'Forêt', 'La forêt est un habitat mystérieux et riche en biodiversité.', '/images/foret1.png'),
(4, 'Marais', 'Les marais regorgent de vie aquatique fascinante.', '/images/marais1.png');

-- Insérer les animaux
INSERT INTO animals (id, name, description, etat, nourriture, derniere_visite, image, habitat_id) VALUES
-- Animaux de la Jungle
(1, 'Tigre', 'Prédateur solitaire et majestueux, symbole de puissance et de beauté.', 'En pleine santé', 'Viande (6 kg)', '2024-01-01', '/images/tigre.png', 1),
(2, 'Singe', 'Acteur clé des écosystèmes forestiers grâce à la dispersion des graines.', 'Bonne santé', 'Fruits et insectes', '2024-01-02', '/images/singe.png', 1),
(3, 'Perroquet', 'Oiseau éclatant connu pour son intelligence et son mimétisme vocal.', 'En pleine santé', 'Fruits et noix', '2024-01-03', '/images/perroquet.png', 1),
(4, 'Serpent', 'Contrôle les populations de rongeurs.', 'Bonne santé', 'Petits mammifères', '2024-01-04', '/images/serpent.png', 1),
(5, 'Léopard', 'Prédateur agile et discret, capable de grimper.', 'En pleine santé', 'Viande (5 kg)', '2024-01-05', '/images/leopard.png', 1),
(6, 'Grenouille tropicale', 'Petit indicateur de la santé des écosystèmes.', 'Bonne santé', 'Insectes (1 kg)', '2024-01-06', '/images/grenouille.png', 1),

-- Animaux de la Savane
(7, 'Lion', 'Roi des animaux, emblème de puissance et acteur clé de la savane.', 'En pleine santé', 'Viande (5 kg)', '2024-01-01', '/images/lion.png', 2),
(8, 'Girafe', 'Adaptée pour se nourrir des feuilles des arbres les plus hauts.', 'Bonne santé', 'Feuilles (10 kg)', '2024-01-02', '/images/girafe.png', 2),
(9, 'Éléphant', 'Plus grand mammifère terrestre, essentiel pour la dispersion des graines.', 'Bonne santé', 'Herbes et fruits (50 kg)', '2024-01-03', '/images/elephant.png', 2),
(10, 'Zèbre', 'Reconnaissable grâce à ses rayures uniques, acteur social fascinant.', 'En pleine santé', 'Herbes (20 kg)', '2024-01-04', '/images/zebre.png', 2),
(11, 'Gazelle', 'Agile et rapide, essentielle pour la chaîne alimentaire.', 'En pleine santé', 'Herbes et arbustes (15 kg)', '2024-01-05', '/images/gazelle.png', 2),
(12, 'Guépard', 'Animal terrestre le plus rapide, symbole de vitesse et puissance.', 'Bonne santé', 'Viande (6 kg)', '2024-01-06', '/images/guepard.png', 2),

-- Animaux de la Forêt
(13, 'Cerf', 'Symbole de grâce, il disperse les graines et entretient les clairières.', 'En pleine santé', 'Feuilles et herbes', '2024-01-01', '/images/cerf.png', 3),
(14, 'Loup', 'Prédateur social vivant en meute, régule les populations d\'herbivores.', 'Bonne santé', 'Viande (6 kg)', '2024-01-02', '/images/loup.png', 3),
(15, 'Renard', 'Rusé et omnivore, il s\'adapte facilement aux changements environnementaux.', 'En pleine santé', 'Petits mammifères', '2024-01-03', '/images/renard.png', 3),
(16, 'Hibou', 'Prédateur nocturne régulant les populations de rongeurs.', 'Bonne santé', 'Rongeurs et insectes', '2024-01-04', '/images/hibou.png', 3),
(17, 'Sanglier', 'Omnivore robuste, il contribue à l\'entretien des sols forestiers.', 'En pleine santé', 'Racines et fruits', '2024-01-05', '/images/sanglier.png', 3),
(18, 'Écureuil', 'Petit et agile, essentiel pour la dispersion des graines dans la forêt.', 'Bonne santé', 'Noix et graines', '2024-01-06', '/images/ecureuil.png', 3),

-- Animaux des Marais
(19, 'Castor', 'Célèbre pour ses barrages, il modifie l\'écosystème et crée des zones de vie.', 'En pleine santé', 'Écorce et branches', '2024-01-01', '/images/castor.png', 4),
(20, 'Ibis Rouge', 'Contribue à l\'équilibre écologique en se nourrissant d\'insectes et crustacés.', 'Bonne santé', 'Insectes et crustacés', '2024-01-02', '/images/ibis.png', 4),
(21, 'Canard', 'Symbole des marais, il migre et disperse des graines.', 'Bonne santé', 'Graines et poissons', '2024-01-03', '/images/canard.png', 4),
(22, 'Loutre', 'Habile nageur, elle régule les populations de poissons dans les marais.', 'En pleine santé', 'Poissons et mollusques', '2024-01-04', '/images/loutre.png', 4),
(23, 'Grenouille', 'Aide à contrôler les populations d\'insectes et joue un rôle crucial dans la chaîne alimentaire.', 'Bonne santé', 'Insectes et larves', '2024-01-05', '/images/grenouille.png', 4),
(24, 'Héron', 'Chasseur patient dans les eaux peu profondes.', 'Bonne santé', 'Poissons et amphibiens', '2024-01-06', '/images/heron.png', 4);
