<?php

    //connexion a la bdd
    include("includes/connexion.php");

    //demande des destinations
    $requete = "SELECT * FROM destinations";
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php include('includes/navigation.php'); ?>

    <p>Les destinations sont ici :</p>
    <?php 
    foreach($resultat as $destination){
        echo "<p>".$destination['nom']."</p>";
        echo "<p>" . $destination['pays'] . "</p>";
    }
    ?>

<?php include ('includes/footer.php'); ?>
</body>
</html>
