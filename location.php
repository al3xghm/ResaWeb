<?php
// Connexion à la base de données
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
    <meta name="description"
        content="WeRent propose des locations de vacances indépendantes : villas privées, maisons et penthouse pour des séjours uniques.">
    <meta name="keywords" content="location, vacances, villa, maison, penthouse, séjour, indépendance, WeRent">
    <meta name="author" content="Alexandre Ghmir">
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?php foreach ($resultat as $logement) {
            echo $logement['nom_logement'];
        } ?>
    </title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>
    <?php include ('includes/navigation.php'); ?>

    <div class="locationpage">

        <?php foreach ($resultat as $row) {
            $images = explode('+', $row["image"]);
            ?>
            <div class='loca-left'>
                <div class="fil-ariane">
                    <a href="index.php">Accueil</a><span>/</span><a href="destinations.php">Destinations</a><span>/</span><span><b><?php echo $row["nom_logement"] ?> </b>
                    </span>
                </div>
                <h1>
                    <?php echo $row["nom_logement"]; ?>
                </h1>
                <div class='loca-location'>
                    <img src='img/location.svg' alt='location'>
                    <h5>
                        <?php echo $row["nom_destination"] . ", " . $row["pays"]; ?>
                    </h5>
                </div>
                <div class='loca-location'>
                    <img src='img/person.svg' alt='person'>
                <h5>
                <?php echo "Jusqu'à {$row['capacite']} personnes"; ?>
                            </h5>
                            </div>
                <div class='loca-price'>
                    <h3>
                        <?php echo $row["prix_par_nuit"]; ?>€<span>/nuit</span>
                    </h3>
                </div>
                <div class='loca-options'>
                    <?php if ($row["animaux"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/paw.svg' alt=''>
                            <h5>Animaux</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["vue"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/eye.svg' alt=''>
                            <h5>Vue</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["cuisine"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/kitchen.svg' alt=''>
                            <h5>Cuisine</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["wifi"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/wifi.svg' alt=''>
                            <h5>Wifi</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["montagne"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/mountain.svg' alt=''>
                            <h5>Montagne</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["baignoire"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/bath.svg' alt=''>
                            <h5>Baignoire</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["lacs"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/water.svg' alt=''>
                            <h5>Lacs et rivières</h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($row["mer"]): ?>
                        <div class='loca-options-info'>
                            <img src='img/mer.svg' alt=''>
                            <h5>Au bord de la mer</h5>
                        </div>
                    <?php endif; ?>
                </div>
                <div class='loca-desc'>
                    <p>
                        <?php echo $row["description"]; ?>
                    </p>
                </div>
                <a href='reservation.php?id=<?php echo $_GET['id']; ?>' class='loca-btn'>Réserver une date <img
                        src='img/calendar.svg' alt=''></a>
            </div>
        <?php } ?>
        <div class='loca-right'>
            <?php
            $counter = 1; // Initialisation du compteur
            foreach ($images as $image) {
                echo "<div class='loca-img" . $counter . "' style='background-image: url(\"./img/logements/" . $image . "\");' onclick='openModal(\"./img/logements/" . $image . "\")'></div>";
                $counter++; // Incrémenter le compteur pour la prochaine classe
                if ($counter > 5)
                    break; // Sortir de la boucle après avoir affiché 5 images
            }
            ?>

        </div>

    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modal-img" src="" alt="Image">
        </div>
    </div>

    </div>

    <?php include ('includes/footer.php'); ?>
    <script src="script/script.js"></script>
</body>

</html>