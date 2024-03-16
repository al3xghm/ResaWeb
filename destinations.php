<?php
    //connexion a la bdd
    include("connexion.php");

    //demande des destinations
    $requete = "SELECT * FROM destinations";
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Les destinations sont :</p>
    <?php 
    foreach($resultat as $destination){
        echo "<p>".$destination['nom']."</p>";
        echo "<p>" . $destination['pays'] . "</p>";
    }
    ?>
</body>
</html>