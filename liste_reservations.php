<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM reservations ORDER BY id DESC");
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Réservations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des Réservations</h1>
    <a href="index.php" class="btn-liste">Retour à l'accueil</a>
    <a href="random_selection.php" class="btn-liste">Sélectionner un utilisateur au hasard</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= htmlspecialchars($reservation['id']) ?></td>
                    <td><?= htmlspecialchars($reservation['numero']) ?></td>
                    <td><?= htmlspecialchars($reservation['nom']) ?></td>
                    <td><?= htmlspecialchars($reservation['prenom']) ?></td>
                    <td><?= htmlspecialchars($reservation['email']) ?></td>
                    <td><?= htmlspecialchars($reservation['telephone']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>