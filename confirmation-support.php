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