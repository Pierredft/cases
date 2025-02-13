<?php
require 'config.php';

// Récupérer une réservation aléatoire
$stmt = $pdo->query("SELECT * FROM reservations ORDER BY RAND() LIMIT 1");
$reservation = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation Aléatoire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Le gagnat est :</h1>
    <?php if ($reservation): ?>
        <p><strong>ID :</strong> <?= htmlspecialchars($reservation['id']) ?></p>
        <p><strong>Numéro :</strong> <?= htmlspecialchars($reservation['numero']) ?></p>
        <p><strong>Nom :</strong> <?= htmlspecialchars($reservation['nom']) ?></p>
        <p><strong>Prénom :</strong> <?= htmlspecialchars($reservation['prenom']) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($reservation['email']) ?></p>
        <p><strong>Téléphone :</strong> <?= htmlspecialchars($reservation['telephone']) ?></p>
    <?php else: ?>
        <p>Aucune réservation trouvée.</p>
    <?php endif; ?>
    <a href="liste_reservations.php" class="btn-liste">Retour à la liste des réservations</a>
</body>
</html>