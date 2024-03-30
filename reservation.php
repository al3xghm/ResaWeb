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
    <title>Reservation</title>
</head>

<body>
    <?php include ('includes/navigation.php'); ?>

    <div class="reservation-container">
<?php foreach ($resultat as $logement) { echo "<h1>Réservez <b>{$logement['nom_logement']}</b></h1>"; } ?>
        <form action="" method="post">
        <input type="hidden" name="logementID" id="logementID" value="<?php echo $_GET['id']; ?>">
            <input type="text" name="nom" id="nom" placeholder="Nom">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="tel" maxlength="10" name="tel" id="tel" placeholder="Téléphone">
            <input type="date" name="date_debut" id="date_debut" placeholder="Date d'arrivée">
            <input type="date" name="date_fin" id="date_fin" placeholder="Date de départ">
            <input type="number" max="6" name="nb_personnes" id="nb_personnes" placeholder="Nombre de personnes">
            <input type="submit" value="Réserver">
        </form>
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