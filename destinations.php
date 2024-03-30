<?php

//connexion a la bdd
include ("includes/connexion.php");

//demande des destinations
$requete = "SELECT * FROM logements INNER JOIN destinations ON logements.destinationextID = destinations.destinationID";
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
    <?php include ('includes/navigation.php'); ?>

    <div class="destinations">


        <div class="des-left">
            <div class="section-filters">
                <div class="title-filters">
                    <h4>Filtres</h4>
                    <a class="color-blue" href="destination.php">Tout effacer</a>
                </div>
                <div class="filters-price">
                    <h6>Prix</h6>
                    <div class="twoinputprice">
                        <input type="number" name="min_price" placeholder="Minimum" min="0">
                        <input type="number" name="max_price" placeholder="Maximum" min="0">
                    </div>
                </div>
                <div class="type-property">
                    <h6>Type de propriété</h6>
                    <ul class="ks-cboxtags">
                        <li><input type="checkbox" id="checkboxOne" value="Rainbow Dash"><label for="checkboxOne"><img
                                    src="img/house.svg" alt="">Maison</label></li>
                        <li><input type="checkbox" id="checkboxTwo" value="Cotton Candy" checked><label
                                for="checkboxTwo"><img src="img/apartment.svg" alt="">Appartement</label></li>
                        <li><input type="checkbox" id="checkboxThree" value="Rarity" checked><label
                                for="checkboxThree"><img src="img/guest-house.svg" alt="">Maison d'hôtes</label></li>
                    </ul>
                    </select>
                </div>
                <div class="options-property">
                    <h6>Options</h6>
                    <ul class="ks-cboxtags">
                        <li><input type="checkbox" id="wificb" value="wificb"><label for="wificb"><img
                                    src="img/wifi.svg" alt="">Wi-Fi</label></li>
                        <li><input type="checkbox" id="eyecb" value="eyecb" checked><label for="eyecb"><img
                                    src="img/eye.svg" alt="">Vue</label></li>
                        <li><input type="checkbox" id="watercb" value="watercb" checked><label for="watercb"><img
                                    src="img/water.svg" alt="">Lacs & rivières</label></li>
                        <li><input type="checkbox" id="pawcb" value="pawcb"><label for="pawcb"><img src="img/paw.svg"
                                    alt="">Animaux</label></li>
                        <li><input type="checkbox" id="bathcb" value="bathcb"><label for="bathcb"><img
                                    src="img/bath.svg" alt="">Baignoire</label></li>
                        <li><input type="checkbox" id="kitchencb" value="kitchencb" checked><label for="kitchencb"><img
                                    src="img/kitchen.svg" alt="">Cuisine</label></li>
                    </ul>
                </div>
                <div class="guest-number">
                    <h6>Nombre d'invités</h6>
                    <div class="guest-counter">
                        <button id="decrease"><svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25"
                                viewBox="0 0 448 512">
                                <path
                                    d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                            </svg></button>
                        <span id="guest-number">1</span>
                        <button id="increase"><svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25"
                                viewBox="0 0 448 512">
                                <path
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                            </svg></button>
                    </div>
                </div>
                <input type="submit" value="Appliquer les filtres">
            </div>
        </div>
        <div class="des-right">
            <h4>Résultats</h4>
            <div class="des-right-top"></div>
            <div class="des-right-bottom">
                <?php foreach ($resultat as $row) {
                    $images = explode('+', $row['image']);
                    $image_url =  $images[0];
                    echo "<a href='location.php?id=" . $row['logementID'] . "'><div class='container-des'>
            <div class='img' style='background-image: url(./img/" . $image_url . ");'></div>
            <div class='text'>
                <h5>{$row['nom_logement']}</h5>
                <div class='location'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'>
                        <path d='M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z' />
                    </svg>
                    <h6>{$row["nom_destination"]}, {$row["pays"]}</h6>
                </div>
                <h2>{$row["prix_par_nuit"]}€<span>/nuit</span></h2>
            </div>
        </div>
        </a>";
                }

                if (count($resultat) === 0) {
                    echo "<div class='erreurContainer'>
            <div class='imgErreur'></div>
            <h3 class='msgErreur'>Aucune destination ne correspond à votre recherche.</h3>
        </div>
        <div class='retourAcc'>
            <a href='index.php' class='lienAcc'>Retour à la page d'accueil</a>
        </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php include ('includes/footer.php'); ?>
    <script src="script/script.js"></script>

</body>

</html>