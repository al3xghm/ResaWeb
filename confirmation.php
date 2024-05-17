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
  $prix_par_nuit = $_POST['prix_par_nuit'];

  $sql = "SELECT nom_logement, prix_par_nuit FROM logements WHERE logementID = :logementID";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':logementID', $logementID);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $nom_logement = $result['nom_logement'];
  $prix_par_nuit = $result['prix_par_nuit'];


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

  // Formatage des dates
  $dateDebut = new DateTime($date_debut);
  $dateFin = new DateTime($date_fin);
  $formattedDateDebut = $dateDebut->format('d F Y'); // format comme '21 avril 2024'
  $formattedDateFin = $dateFin->format('d F Y'); // format comme '21 avril 2024'

  // Traduction des mois en français
  $months = [
    'January' => 'janvier',
    'February' => 'février',
    'March' => 'mars',
    'April' => 'avril',
    'May' => 'mai',
    'June' => 'juin',
    'July' => 'juillet',
    'August' => 'août',
    'September' => 'septembre',
    'October' => 'octobre',
    'November' => 'novembre',
    'December' => 'décembre'
  ];

  $formattedDateDebut = str_replace(array_keys($months), array_values($months), $formattedDateDebut);
  $formattedDateFin = str_replace(array_keys($months), array_values($months), $formattedDateFin);


  // Envoi de l'email de confirmation
  $mailTo = "$email";
  $subject = "Votre réservation a bien été confirmée !";
  $from = 'alexandre.ghmir@edu.univ-eiffel.fr';

  // type de contenu (HTML)

  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

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
    <p>Votre réservation pour le logement <strong>" . htmlspecialchars($nom_logement) . "</strong>, du <strong>" . htmlspecialchars($formattedDateDebut) . "</strong> au <strong>" . htmlspecialchars($formattedDateFin) . "</strong> pour <strong>" . intval($nb_personnes) . " personne(s)</strong> a été confirmée au prix de <strong>" . htmlspecialchars($prix_par_nuit) . " €</strong>.</p>
    <p>Nous attendons votre arrivée avec impatience!</p>
    <hr>
    <p>Pour toute question, n'hésitez pas à nous contacter: " . htmlspecialchars($from) . "</p>
  </div>
</body>
    </html>";

  mail($mailTo, $subject, $message, $headers);

  // Envoi de l'email à l'administrateur
  $adminEmail = "alexandre.ghmir@edu.univ-eiffel.fr";
  $adminSubject = "Nouvelle réservation effectuée";
  $adminMessage = "
<html>
<head>
  <title>Nouvelle réservation</title>
</head>
<body>
<div style='text-align: center;'>
    <img src='https://ghmir.butmmi.o2switch.site/resaweb/img/logoconfirm.png' alt='WeRent Logo' style='width: 100px;'>
  <h1>Récapitulatif de Réservation</h1>
  <p>Une nouvelle réservation a été effectuée par :</p>
  <ul>
    <li>Nom: " . htmlspecialchars($nom) . "</li>
    <li>Prénom: " . htmlspecialchars($prenom) . "</li>
    <li>Email: " . htmlspecialchars($email) . "</li>
    <li>Téléphone: " . htmlspecialchars($tel) . "</li>
    <li>Date de début: " . htmlspecialchars($formattedDateDebut) . "</li>
    <li>Date de fin: " . htmlspecialchars($formattedDateFin) . "</li>
    <li>Nombre de personnes: " . intval($nb_personnes) . "</li>
    <li>Logement: " . htmlspecialchars($nom_logement) . "</li>
    <li>Prix par nuit: " . htmlspecialchars($prix_par_nuit) . " €</li>
  </ul>
  </div>
</body>
</html>";

  mail($adminEmail, $adminSubject, $adminMessage, $headers);


  header("Location: confirmation.php");
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="WeRent propose des locations de vacances indépendantes : villas privées, maisons et penthouse pour des séjours uniques.">
  <meta name="keywords" content="location, vacances, villa, maison, penthouse, séjour, indépendance, WeRent">
  <meta name="author" content="Alexandre Ghmir">
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
      <img src="img/confirmation.png" alt="Logo confirmation">
      <h1>Merci d'avoir passé commande !</h1>
      <p>
        Votre réservation est confirmée et un e-mail avec tous les détails a été envoyé à votre adresse ;
        <br>veuillez vérifier également votre dossier spam et conserver cet e-mail pour vos dossiers.
      </p>
      <a href="index.php">Retour à la page d'accueil</a>
    </div>
  </div>
  <?php include ('includes/footer.php'); ?>
</body>

</html>