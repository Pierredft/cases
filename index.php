<?php
require 'config.php';

// Récupérer les numéros déjà réservés
$stmt = $pdo->query("SELECT numero FROM reservations");
$reservedNumbers = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Numéros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Choisissez un numéro (1-100)</h1>
    
    <div class="grid">
        <?php for ($i = 1; $i <= 100; $i++): ?>
            <button class="num-button <?= in_array($i, $reservedNumbers) ? 'reserved' : '' ?>" 
                    data-num="<?= $i ?>" <?= in_array($i, $reservedNumbers) ? 'disabled' : '' ?>>
                <?= $i ?>
            </button>
        <?php endfor; ?>
    </div>

    <div id="form-container" style="display: none;">
        <h2>Réserver le numéro <span id="selected-num"></span></h2>
        <form id="reservation-form">
            <input type="hidden" id="numero" name="numero">
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="tel" id="telephone" name="telephone" placeholder="Téléphone" required>
            <button type="submit">Réserver</button>
        </form>
    </div>
    <a href="liste_reservations.php" class="btn-liste">Voir toutes les réservations</a>

    <script src="script.js"></script>
</body>
</html>