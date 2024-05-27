<?php
// Connexion à la base de données
include ("includes/connexion.php");
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $requete = "SELECT * FROM logements INNER JOIN destinations ON logements.destinationextID = destinations.destinationID WHERE logementID = " . $_GET['id'];
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($resultat)) {
        header('Location: 404.php');
    }
} else {
    header('Location: 404.php');
}

$current_date = date('Y-m-d');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WeRent propose des locations de vacances indépendantes : villas privées, maisons et penthouse pour des séjours uniques.">
    <meta name="keywords" content="location, vacances, villa, maison, penthouse, séjour, indépendance, WeRent">
    <meta name="author" content="Alexandre Ghmir">
    <link rel="stylesheet" href="css/style.css">
    <title><?php foreach ($resultat as $logement) { echo "Réservez {$logement['nom_logement']}"; } ?></title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>
<body>
    <?php include ('includes/navigation.php'); ?>
    <div class="reservation-container">
        <div class="fil-ariane">
            <a href="index.php" title="Retour à l'accueil">Accueil</a><span>/</span><a class="color-blue" href="destinations.php" title="Voir toutes les destinations">Destinations</a><span>/</span><?php foreach ($resultat as $logement) { echo "<a class='color-blue' href='location.php?id={$_GET['id']}' title='Voir le logement {$logement['nom_logement']}'>{$logement['nom_logement']} </a>"; } ?><span>/</span><span><b>Réservation</b></span>
        </div>
        <h1 class="res-title">🌍 <?php foreach ($resultat as $logement) { echo "Réservez <b>{$logement['nom_logement']}</b>"; } ?></h1>
        <div class="reservation-wrapper">
            <form id="reservationForm" action="confirmation.php" method="post">
                <div id="stepone">
                    <div class="formulaire">
                        <input type="hidden" name="logementID" id="logementID" value="<?php echo $_GET['id']; ?>">
                        <div class="twoinput">
                            <div class="input-form">
                                <label for="nom" id="NomInfo">Nom <span style="color:red">*</span></label>
                                <input required type="text" name="nom" id="nom" placeholder="Entrez votre nom" aria-describedby="NomInfo">
                            </div>
                            <div class="input-form">
                                <label for="prenom" id="PrenomInfo">Prénom <span style="color:red">*</span></label>
                                <input required type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" aria-describedby="PrenomInfo">
                            </div>
                        </div>
                        <div class="input-form">
                            <label for="email" id="EmailInfo">Email <span style="color:red">*</span></label>
                            <input required type="email" name="email" id="email" placeholder="exemple@mail.fr" aria-describedby="EmailInfo">
                        </div>
                        <div class="input-form">
                            <label for="tel" id="TelInfo">Téléphone <span style="color:red">*</span></label>
                            <input required type="tel" maxlength="10" name="tel" id="tel" placeholder="0011223344" pattern="[0-9]{10}" aria-describedby="TelInfo">
                        </div>
                        <div class="twoinput">
                            <div class="input-form">
                                <label for="date_debut" id="DateDebutInfo">Date d'arrivée <span style="color:red">*</span></label>
                                <input required type="date" name="date_debut" id="date_debut" placeholder="Date d'arrivée" min="<?php echo $current_date; ?>" aria-describedby="DateDebutInfo">
                            </div>
                            <div class="input-form">
                                <label for="date_fin" id="DateFinInfo">Date de départ <span style="color:red">*</span></label>
                                <input required type="date" name="date_fin" id="date_fin" placeholder="Date de départ" aria-describedby="DateFinInfo">
                            </div>
                        </div>
                        <div class="input-form">
                            <label for="nb_personnes" id="NbPersonnesInfo">Nombre de personnes <span style="color:red">*</span></label>
                            <input required type="number" min="1" max="<?php echo htmlspecialchars($logement['capacite']); ?>" name="nb_personnes" id="nb_personnes" placeholder="Nombre de personnes" aria-describedby="NbPersonnesInfo">
                        </div>
                        <div class="warning">
                            <p>Les champs suivis d'un <span style="color:red">*</span> sont obligatoires.</p>
                        </div>
                        <input type="button" id="submitBtn" value="Réserver">
                    </div>
                    <div class="apercu">
                        <div class="apercu-reservation">
                            <h2>🧾 Aperçu de votre réservation</h2>
                            <br>
                            <?php foreach ($resultat as $logement) { echo "<div class='wrapperinfo'><div><h4>{$logement['nom_logement']}</h4>"; echo "<h5>{$logement['nom_destination']}, {$logement['pays']}</h5>"; echo "<h5>Capacité : {$logement['capacite']}</h5></div>"; echo "<h2><strong>{$logement['prix_par_nuit']}€</strong><span>/nuit</span></h2></div>"; } ?>
                        </div>
                        <div class="imgoptions">
                            <?php foreach ($resultat as $row) { $images = explode('+', $row['image']); $image_url = $images[0]; echo "<div class='apercu-img' style='background-image: url(\"./img/logements/{$image_url}\");'></div>"; } ?>
                            <div class='loca-options'>
                                <?php if ($row["animaux"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/paw.svg' alt='Icone animaux de compagnie'>
                                        <h5>Animaux</h5>
                                    </div>
                                <?php endif; ?>
                                <?php if ($row["vue"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/eye.svg' alt='Icone vue'>
                                        <h5>Vue</h5>
                                    </div>
                                <?php endif; ?>
                                <?php if ($row["cuisine"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/kitchen.svg' alt='Icone cuisine'>
                                        <h5>Cuisine</h5>
                                    </div>
                                <?php endif; ?>
                                <?php if ($row["wifi"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/wifi.svg' alt='Icone wifi'>
                                        <h5>Wifi</h5>
                                    </div>
                                <?php endif; ?>
                                <?php if ($row["montagne"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/mountain.svg' alt='Icone montagne'>
                                        <h5>Montagne</h5>
                                    </div>
                                <?php endif; ?>
                                <?php if ($row["baignoire"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/bath.svg' alt='Icone baignoire'>
                                        <h5>Baignoire</h5>
                                    </div>
                                <?php endif; ?>
                                <?php if ($row["lacs"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/water.svg' alt='Icone lacs et rivières'>
                                        <h5>Lacs et rivières</h5>
                                    </div>
                                <?php endif; ?>
                                <?php if ($row["mer"]): ?>
                                    <div class='loca-options-info'>
                                        <img src='img/mer.svg' alt='Icone mer'>
                                        <h5>Au bord de la mer</h5>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="recapitulatif" style="display:none; margin-top: 2rem;">
                    <div class="apercu">
                        <div class="apercu-reservation">
                            <h2>🧾 Aperçu de votre réservation</h2>
                            <div class="logement-res">
                                <?php foreach ($resultat as $logement) { echo "<h4>{$logement['nom_logement']}</h4>"; echo "<h5>{$logement['nom_destination']}, {$logement['pays']}</h5>"; } ?>
                            </div>
                            <h2 id="prixParNuit" style="display:none;"><?php echo $logement['prix_par_nuit']; ?></h2>
                            <p><strong>Nom:</strong> <span id="recapNom"></span></p>
                            <p><strong>Prénom:</strong> <span id="recapPrenom"></span></p>
                            <p><strong>Email:</strong> <span id="recapEmail"></span></p>
                            <p><strong>Téléphone:</strong> <span id="recapTel"></span></p>
                            <p><strong>Date d'arrivée:</strong> <span id="recapDateDebut"></span></p>
                            <p><strong>Date de départ:</strong> <span id="recapDateFin"></span></p>
                            <p><strong>Pour <span id="recapNbPersonnes"></span> personne(s)</strong></p>
                            <h2>Prix total: <span id="recapTotal"></span></h2>
                            <div class="btn-reservation">
                                <input type="button" onclick="editReservation()" value="Retour à la réservation">
                                <input type="submit" value="Confirmer la réservation">
                            </div>
                        </div>
                        <?php foreach ($resultat as $row) { $images = explode('+', $row['image']); $image_url = $images[0]; echo "<div class='apercu-img' aria-label='Photo du logement' style='background-image: url(\"./img/logements/{$image_url}\");'></div>"; } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include ('includes/footer.php'); ?>
    <script src="script/reservation.js"></script>
</body>
</html>
