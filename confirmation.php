<?php 

include ("includes/connexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $nb_personnes = $_POST['nb_personnes'];
    $logementID = $_POST['logementID'];

    $requete = "INSERT INTO reservations (nom, prenom, email, tel, date_debut, date_fin, nb_personnes, logementID) VALUES (:nom, :prenom, :email, :tel, :date_debut, :date_fin, :nb_personnes, :logementID)";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':date_debut', $date_debut);
    $stmt->bindParam(':date_fin', $date_fin);
    $stmt->bindParam(':nb_personnes', $nb_personnes);
    $stmt->bindParam(':logementID', $logementID);
    $stmt->execute();

    header('Location: confirmation.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Confirmation</title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>
    <?php
    include ('includes/navigation.php');
    ?>
    <div class="error-header">
        <div class="error-container">
            <img src="img/confirmation.png" alt="">
            <h1>Merci d'avoir passé commande !</h1>
            <p>
Votre réservation est confirmée et un e-mail avec tous les détails a été envoyé à votre adresse ; <br>veuillez vérifier également votre dossier spam et conserver cet e-mail pour vos dossiers.</p>
            <a href="index.php">Retour à la page d'accueil</a>
        </div>
    </div>
    <?php include ('includes/footer.php'); ?>
</body>

</html>