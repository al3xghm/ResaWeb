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
    <title>Réservation</title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>

    <?php include ('includes/navigation.php'); ?>

    <div class="reservation-container">
        <div class="fil-ariane">
            <a class="color-blue" href="index.php">Index</a><span>/</span><a class="color-blue"
                href="destinations.php">Destinations</a><span>/</span><?php foreach ($resultat as $logement) {
                    echo "<a class='color-blue' href='location.php?id={$_GET['id']}'>{$logement['nom_logement']} </a> ";
                } ?><span>/</span><span>Réservation</span>
        </div>

        <div class="reservation-wrapper">


            <form action="" method="post">
                <?php foreach ($resultat as $logement) {
                    echo "<h3>Réservez <b>{$logement['nom_logement']}</b></h3>";
                } ?>
                <input type="hidden" name="logementID" id="logementID" value="<?php echo $_GET['id']; ?>">
                <div class="twoinput">
                    <div class="input-form">
                        <label>Nom <span style="color:red">*</span></label>
                        <input type="text" name="nom" id="nom" placeholder="Nom">
                    </div>
                    <div class="input-form">
                        <label>Prénom <span style="color:red">*</span></label>
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom">
                    </div>
                </div>
                <div class="input-form">
                    <label>Email <span style="color:red">*</span></label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="input-form">
                    <label>Téléphone <span style="color:red">*</span></label>
                    <input type="tel" maxlength="10" name="tel" id="tel" placeholder="Téléphone">
                </div>
                <div class="twoinput">
                    <div class="input-form">
                        <label>Date d'arrivée <span style="color:red">*</span></label>
                        <input type="date" name="date_debut" id="date_debut" placeholder="Date d'arrivée">
                    </div>
                    <div class="input-form">
                        <label>Date de départ <span style="color:red">*</span></label>
                        <input type="date" name="date_fin" id="date_fin" placeholder="Date de départ">
                    </div>
                </div>
                <div class="input-form">
                    <label>Nombre de personnes <span style="color:red">*</span></label>
                    <input type="number" max="6" name="nb_personnes" id="nb_personnes"
                        placeholder="Nombre de personnes">
                </div>
                <input type="submit" value="Réserver">
            </form>
            <div>

                <div class="apercu">
                    <div class="apercu-header">
                        <div class="apercu-reservation">
                            <h3>🧾 Aperçu de votre réservation</h3>
                            <br>
                            <?php foreach ($resultat as $logement) {
                                echo "<h4>{$logement['nom_logement']}</h4>";
                                echo "<h5>{$logement['nom_destination']}, {$logement['pays']}</h5><br>";
                                echo "<h2>{$logement['prix_par_nuit']}€<span>/nuit</span></h2>";
                            } ?>
                        </div>
                        <?php foreach ($resultat as $row) {
                            $images = explode('+', $row['image']);
                            $image_url = $images[0];
                            echo "<div class='apercu-img' style='background-image: url(\"./img/{$image_url}\");'></div>";
                        } ?>
                    </div>
                </div>

                <div class="warning">
                    <p>🚨 Attention, votre réservation ne sera pas confirmée tant que vous n'aurez pas reçu un email
                        de confirmation de notre part.</p>
                </div>

            </div>
        </div>

    </div>

    <?php include ('includes/footer.php'); ?>
    <script src="script/script.js"></script>
</body>
<?php
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
}
?>

</html>