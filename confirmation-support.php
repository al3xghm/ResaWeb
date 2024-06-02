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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $message = htmlspecialchars($_POST['message']);
    $sujet = isset($_POST['sujet']) ? htmlspecialchars($_POST['sujet']) : 'Contact depuis le site WeRent';

    // Adresse email de l'admin
    $admin_email = "alexandre.ghmir@edu.univ-eiffel.fr";

    // Sujet de l'email
    $subject_admin = "Nouvelle demande de contact de $prenom $nom";
    $subject_user = "Confirmation de votre demande de contact";

    // Contenu de l'email pour l'admin
    $message_admin = "
    <html>
    <head>
      <title>Nouvelle demande de contact</title>
    </head>
    <body>
    <div style='text-align: center;'>
        <img src='https://ghmir.butmmi.o2switch.site/resaweb/img/logoconfirm.png' alt='WeRent Logo' style='width: 100px;'>
      <h1>Nouvelle demande de contact</h1>
      <p>Vous avez reçu un nouveau ticket depuis votre site web :</p>
        <p><b>Nom :</b> $nom</p>
        <p><b>Prénom :</b> $prenom</p>
        <p><b>Email :</b> $email</p>
        <p><b>Téléphone :</b> $tel</p>
        <p><b>Sujet :</b> $sujet</p>
        <p><b>Message :</b> $message</p>
    </div>
    </body>
    </html>";

    // Contenu de l'email pour l'utilisateur
    $message_user = "
    <html>
    <head>
      <title>Votre demande a bien été prise en compte</title>
    </head>
    <body>
    <div style='text-align: center;'>
        <img src='https://ghmir.butmmi.o2switch.site/resaweb/img/logoconfirm.png' alt='WeRent Logo' style='width: 100px;'>
      <h1>Confirmation de votre demande de contact</h1>
      <p>Bonjour <b>$prenom,</b></p>
      <p>Nous avons bien reçu votre ticket de support. Nous vous répondrons dans les plus brefs délais.</p>
      <p>Voici un récapitulatif de votre message :</p>
        <p><b>Sujet :</b> $sujet</p>
        <p><b>Message :</b> $message</p>
      <p>Cordialement,<br>L'équipe WeRent</p>
    </div>
    </body>
    </html>";

    // En-têtes pour l'email en HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: alexandre.ghmir@edu.univ-eiffel.fr" . "\r\n"; // Utiliser une adresse d'expéditeur valide du domaine

    // Envoi de l'email à l'admin
    if (mail($admin_email, $subject_admin, $message_admin, $headers)) {
        echo "L'email a été envoyé à l'administrateur.";
    } else {
        echo "Échec de l'envoi de l'email à l'administrateur.";
    }

    // En-têtes pour l'email de confirmation à l'utilisateur
    $headers_user = "MIME-Version: 1.0" . "\r\n";
    $headers_user .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers_user .= "From: alexandre.ghmir@edu.univ-eiffel.fr" . "\r\n"; // Utiliser une adresse d'expéditeur valide du domaine

    // Envoi de l'email de confirmation à l'utilisateur
    if (mail($email, $subject_user, $message_user, $headers_user)) {
        echo "L'email de confirmation a été envoyé à l'utilisateur.";
    } else {
        echo "Échec de l'envoi de l'email de confirmation à l'utilisateur.";
    }
}
?>

  <div class="basic-header">
    <div class="basic-container">
      <img src="img/confirmation.png" alt="Logo confirmation">
      <h1>Votre demande a bien été soumise !</h1>
      <p>
        Nous avons bien reçu votre demande. Nous vous répondrons dans les plus brefs délais.
        <br>Si vous ne recevez pas de réponse dans les 48 heures, veuillez vérifier votre dossier de courrier indésirable.
      </p>
      <a href="index.php" title="Retour à la page d'accueil">Retour à la page d'accueil</a>
    </div>
  </div>
  <?php include ('includes/footer.php'); ?>
</body>

</html>
