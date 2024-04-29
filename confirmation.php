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

    $sql = "SELECT nom_logement FROM logements WHERE logementID = :logementID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':logementID', $logementID);
    $stmt->execute();
    $nom_logement = $stmt->fetchColumn();
    
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


    $mailTo = "$email";
    $subject = "Votre réservation a bien été confirmée !";
    $from = 'alexandre.ghmir@edu.univ-eiffel.fr';

    // type de contenu (HTML)

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // message HTML
        // message HTML
    $message = 
    "<html>
    <head>
      <title>Votre réservation est confirmée</title>
    </head>
    <body>
      <div style='text-align: center;'>
        <img src='https://ghmir.butmmi.o2switch.site/resaweb/img/logoconfirm.png' alt='WeRent Logo' style='width: 100px;'>
        <h1>Merci pour votre réservation, " . htmlspecialchars($prenom) . "!</h1>
                <p>Votre réservation pour le logement <strong>" . htmlspecialchars($nom_logement) . "</strong>, du <strong>" . htmlspecialchars($date_debut) . "</strong> au <strong>" . htmlspecialchars($date_fin) . "</strong> pour <strong>" . intval($nb_personnes) . " personne(s)</strong> a été confirmée.</p>
        <p>Nous attendons votre arrivée avec impatience!</p>
        <hr>
        <p>Pour toute question, n'hésitez pas à nous contacter: " . htmlspecialchars($from) . "</p>
      </div>
    </body>
    </html>";

    mail($mailTo, $subject, $message, $headers);
    header("Location: confirmation.php");
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
                Votre réservation est confirmée et un e-mail avec tous les détails a été envoyé à votre adresse ;
                <br>veuillez vérifier également votre dossier spam et conserver cet e-mail pour vos dossiers.</p>
            <a href="index.php">Retour à la page d'accueil</a>
        </div>
    </div>
    <?php include ('includes/footer.php'); ?>
</body>

</html>
