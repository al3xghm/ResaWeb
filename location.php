<?php

//connexion a la bdd
include ("includes/connexion.php");
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $requete = "SELECT * FROM logements INNER JOIN destinations ON logements.destinationextID = destinations.destinationID WHERE logementID = " . $_GET['id'];
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    if (empty($resultat)) {
        header('Location: 404.php');
    }
} else {
    header('Location: 404.php');
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Location</title>
</head>

<body>
    <?php include ('includes/navigation.php'); ?>

    <div class="locationpage">

    <?php foreach ($resultat as $row) {
            $images = explode('+', $row["image"]);
            ?>
            <div class='loca-left'>
                <a href='destinations.php' class='color-blue' title='Retour aux destinations'>Retour à la page précedente</a>
                <h2><?php echo $row["nom_logement"]; ?></h2>
                <div class='location-loca'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'>
                        <path d='M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z' />
                    </svg>
                    <h5><?php echo $row["nom_destination"] . ", " . $row["pays"]; ?></h5>
                </div>
                <div class='loca-price'>
                    <h3><?php echo $row["prix_par_nuit"]; ?>€<span>/nuit</span></h3>
                </div>
                <div class='loca-options'>
                    <?php if ($row["animaux"]) : ?>
                        <div class='loca-options-info'>
                            <img src='img/paw.svg' alt=''>
                            <h5>Animaux</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["vue"]) : ?>
                        <div class='loca-options-info'>
                            <img src='img/eye.svg' alt=''>
                            <h5>Vue</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["cuisine"]) : ?>
                        <div class='loca-options-info'>
                            <img src='img/kitchen.svg' alt=''>
                            <h5>Cuisine</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["wifi"]) : ?>
                        <div class='loca-options-info'>
                            <img src='img/wifi.svg' alt=''>
                            <h5>Wifi</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["baignoire"]) : ?>
                        <div class='loca-options-info'>
                            <img src='img/bath.svg' alt=''>
                            <h5>Baignoire</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["lacs"]) : ?>
                        <div class='loca-options-info'>
                            <img src='img/water.svg' alt=''>
                            <h5>Lacs et rivières</h5>
                        </div>
                    <?php endif; ?>
                </div>
                <div class='loca-desc'>
                    <p><?php echo $row["description"]; ?></p>
                </div>
                <a href='reservation.php?id=<?php echo $_GET['id']; ?>' class='loca-btn'>Réserver une date <img src='img/calendar.svg' alt=''></a>
            </div>
        <?php } ?>
        <div class='loca-right'>
            <?php
            $counter = 1; // Initialisation du compteur
            foreach ($images as $image) {
                echo "<div class='loca-img" . $counter . "' style='background-image: url(\"./img/" . $image . "\");'></div>";
                $counter++; // Incrémenter le compteur pour la prochaine classe
                if ($counter > 5)
                    break; // Sortir de la boucle après avoir affiché 5 images
            }
            ?>


        </div>



    </div>
    </div>













    <?php include ('includes/footer.php'); ?>
    <script src="script/script.js"></script>
</body>

</html>