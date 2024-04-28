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