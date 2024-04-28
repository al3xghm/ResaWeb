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

    // header('Location: confirmation.php');
    // exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title> <?php foreach ($resultat as $logement) {
        echo "Réservez {$logement['nom_logement']}";
    } ?></title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>

    <?php include ('includes/navigation.php'); ?>

    <div class="reservation-container">
        <div class="fil-ariane">
            <a href="index.php">Index</a><span>/</span><a class="color-blue"
                href="destinations.php">Destinations</a><span>/</span><?php foreach ($resultat as $logement) {
                    echo "<a class='color-blue' href='location.php?id={$_GET['id']}'>{$logement['nom_logement']} </a> ";
                } ?><span>/</span><span><b>Réservation</b></span>
        </div>

        <h1 class="res-title">Réservez votre séjour</h1>

        <div class="reservation-wrapper">

            <form id="reservationForm" action="" method="post">
                <div id="stepone">
                    <?php foreach ($resultat as $logement) {
                        echo "<h3>Réservez <b>{$logement['nom_logement']}</b></h3>";
                    } ?>
                    <input type="hidden" name="logementID" id="logementID" value="<?php echo $_GET['id']; ?>">
                    <div class="twoinput">
                        <div class="input-form">
                            <label>Nom <span style="color:red">*</span></label>
                            <input required type="text" name="nom" id="nom" placeholder="Ghmir">
                        </div>
                        <div class="input-form">
                            <label>Prénom <span style="color:red">*</span></label>
                            <input required type="text" name="prenom" id="prenom" placeholder="Alexandre">
                        </div>
                    </div>
                    <div class="input-form">
                        <label>Email <span style="color:red">*</span></label>
                        <input required type="email" name="email" id="email" placeholder="exemple@mail.fr">
                    </div>
                    <div class="input-form">
                        <label>Téléphone <span style="color:red">*</span></label>
                        <input required type="tel" maxlength="10" name="tel" id="tel" placeholder="0011223344"
                            pattern="[0-9]{10}">
                    </div>
                    <div class="twoinput">
                        <div class="input-form">
                            <label>Date d'arrivée <span style="color:red">*</span></label>
                            <input required type="date" name="date_debut" id="date_debut" placeholder="Date d'arrivée">
                        </div>
                        <div class="input-form">
                            <label>Date de départ <span style="color:red">*</span></label>
                            <input required type="date" name="date_fin" id="date_fin" placeholder="Date de départ">
                        </div>
                    </div>
                    <div class="input-form">
                        <label>Nombre de personnes <span style="color:red">*</span></label>
                        <input required type="number" min="1" max="12" name="nb_personnes" id="nb_personnes"
                            placeholder="Nombre de personnes">
                    </div>

                    <div class="warning">
                        <p>Les champs suivis d'un <span style="color:red">*</span> sont obligatoires.</p>
                    </div>
                    <button id="submitBtn">Réserver</button>
                    <div class="apercu">
                        <div class="apercu-reservation">
                            <h3>🧾 Aperçu de votre réservation</h3>
                            <br>
                            <?php foreach ($resultat as $logement) {
                                echo "<h4>{$logement['nom_logement']}</h4>";
                                echo "<h5>{$logement['nom_destination']}, {$logement['pays']}</h5>";
                                echo "<h2><strong>{$logement['prix_par_nuit']}€</strong><span>/nuit</span></h2>";
                            } ?>
                        </div>
                        <?php foreach ($resultat as $row) {
                            $images = explode('+', $row['image']);
                            $image_url = $images[0];
                            echo "<div class='apercu-img' style='background-image: url(\"./img/{$image_url}\");'></div>";
                        } ?>
                    </div>
                </div>

                <div id="recapitulatif" style="display:none; margin-top: 2rem;">
                    <div class="apercu">
                        <div class="apercu-reservation">
                            <h3>🧾 Aperçu de votre réservation</h3>
                            <div class="logement-res">
                                <?php foreach ($resultat as $logement) {
                                    echo "<h4>{$logement['nom_logement']}</h4>";
                                    echo "<h5>{$logement['nom_destination']}, {$logement['pays']}</h5>";
                                } ?>
                            </div>
                            <h2 id="prixParNuit" style="display:none;"><?php echo $logement['prix_par_nuit']; ?></h2>
                            <p><strong>Nom:</strong> <span id="recapNom"></span></p>
                            <p><strong>Prénom:</strong> <span id="recapPrenom"></span></p>
                            <p><strong>Email:</strong> <span id="recapEmail"></span></p>
                            <p><strong>Téléphone:</strong> <span id="recapTel"></span></p>
                            <p><strong>Date d'arrivée:</strong> <span id="recapDateDebut"></span></p>
                            <p><strong>Date de départ:</strong> <span id="recapDateFin"></span></p>
                            <p><strong>Nombre de personnes:</strong> <span id="recapNbPersonnes"></span></p>
                            <h2>Prix total: <span id="recapTotal"></span></h2>
                            <div class="btn-reservation">
                                <input type="button" onclick="editReservation()">Retour à la réservation</input>
                                <button type="submit" onclick="confirmReservation()">Confirmer la réservation</button>
                            </div>
                        </div>
                        <?php foreach ($resultat as $row) {
                            $images = explode('+', $row['image']);
                            $image_url = $images[0];
                            echo "<div class='apercu-img' style='background-image: url(\"./img/{$image_url}\");'></div>";
                        } ?>
                    </div>
                    <p class="reservation-warning">🚨 Attention, votre réservation ne sera pas confirmée tant que vous
                        n'aurez
                        pas reçu un email de
                        confirmation de notre part.</p>
                </div>
            </form>
        </div>
    </div>
    <?php include ('includes/footer.php'); ?>
    <script src="script/reservation.js"></script>
</body>


</html>