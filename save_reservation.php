<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = $_POST['numero'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    if (!empty($numero) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone)) {
        // Vérifier si le numéro est déjà pris
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations WHERE numero = ?");
        $stmt->execute([$numero]);
        if ($stmt->fetchColumn() > 0) {
            echo "Ce numéro est déjà réservé.";
            exit;
        }

        // Insérer la réservation
        $stmt = $pdo->prepare("INSERT INTO reservations (numero, nom, prenom, email, telephone) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$numero, $nom, $prenom, $email, $telephone])) {
            echo "Réservation réussie !";
        } else {
            echo "Erreur lors de l'enregistrement.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>