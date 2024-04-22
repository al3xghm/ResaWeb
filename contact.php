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
    <title>Contactez-nous</title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>
    <?php
    include ('includes/navigation.php');
    ?>
<div class="contact-header">
    <div class="title-filters">
        <a class="color-blue" href="index.php">Index</a><span>/</span><span>Support client</span>
    </div>
    <div class="contact-center"> 
        <form action="process_contact.php" method="POST">
            <div class="contact-body">
                <h1>Contactez-nous</h1>
                <div class="contact-form">
                    <div class="contact-name">
                        <input type="text" name="nom" id="nom" placeholder="Nom">
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom">
                    </div>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="tel" maxlength="10" name="tel" id="tel" placeholder="Téléphone">
                    <textarea name="message" id="message" placeholder="Message"></textarea>
                    <input type="submit" value="Envoyer">
                </div>
            </div>
        </form>
    </div>
</div>




    <?php include ('includes/footer.php'); ?>
</body>

</html>