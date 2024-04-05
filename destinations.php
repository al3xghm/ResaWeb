<?php
//connexion a la bdd
include ("includes/connexion.php");

// Requête SQL pour récupérer les logements en fonction des filtres
$requete = "SELECT * FROM logements INNER JOIN destinations ON logements.destinationextID = destinations.destinationID";

// Si des valeurs de prix sont définies, on ajoute une clause WHERE pour filtrer par prix
if (isset($_GET['min_price']) && isset($_GET['max_price']) && $_GET['min_price'] !== '' && $_GET['max_price'] !== '') {
    $requete .= " WHERE prix_par_nuit BETWEEN :min_price AND :max_price";
    // On prépare la requête avec des paramètres pour éviter les injections SQL
    $stmt = $db->prepare($requete);
    $stmt->execute(array(':min_price' => $_GET['min_price'], ':max_price' => $_GET['max_price']));
} else {
    // Si aucune valeur de prix n'est définie, exécuter la requête sans filtre de prix
    $stmt = $db->query($requete);
}

// Vérification des options
$options = array('wifi', 'vue', 'lacs', 'animaux', 'baignoire', 'cuisine');
foreach ($options as $option) {
    if (isset($_GET[$option]) && $_GET[$option] === 'on') {
        // Si l'option est cochée, ajoutez-la à la requête
        if (strpos($requete, 'WHERE') === false) {
            // Si la clause WHERE n'existe pas encore, ajoutez-la
            $requete .= " WHERE {$option} = 1";
        } else {
            // Sinon, ajoutez la condition avec AND
            $requete .= " AND {$option} = 1";
        }
    }
}

// Vérification du type de propriété
$types = array('maison', 'appartement', 'maison_hotes');
$selectedTypes = [];
foreach ($types as $type) {
    if (isset($_GET[$type]) && $_GET[$type] === 'on') {
        $selectedTypes[] = $type;
    }
}

if (!empty($selectedTypes)) {
    $requete .= " WHERE type IN ('" . implode("', '", $selectedTypes) . "')";
}


// Vérification du nombre d'invités
if (isset($_GET['capacite']) && $_GET['capacite'] !== '') {
    if (strpos($requete, 'WHERE') === false) {
        // Si la clause WHERE n'existe pas encore, ajoutez-la
        $requete .= " WHERE capacite >= {$_GET['capacite']}";
    } else {
        // Sinon, ajoutez la condition avec AND
        $requete .= " AND capacite >= {$_GET['capacite']}";
    }
}

// Vérification du continent
if (isset($_GET['continent']) && $_GET['continent'] !== '') {
    if (strpos($requete, 'WHERE') === false) {
        // Si la clause WHERE n'existe pas encore, ajoutez-la
        $requete .= " WHERE continent = '{$_GET['continent']}'";
    } else {
        // Sinon, ajoutez la condition avec AND
        $requete .= " AND continent = '{$_GET['continent']}'";
    }
}

// Exécuter la requête après avoir ajouté toutes les conditions
$stmt = $db->query($requete);

// Récupération des résultats
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Requête région
$requetecontinent = "SELECT continent FROM destinations";
$stmtcontinent = $db->query($requetecontinent);
$resultatcontinent = $stmtcontinent->fetchall(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Document</title>
</head>

<body>
    <?php include ('includes/navigation.php'); ?>

    <div class="destinations">

        <div class="des-left">
            <div class="title-filters">
                <a class="color-blue" href="index.php">Retour à la page précedente</a>
            </div>
            <div class="section-filters">
                <form method="get" action="destinations.php">
                    <div class="filters-regions">
                        <h6>Région</h6>
                        <select name="continent" id="continent">
                            <option value="">Choisir une région</option>
                            <?php foreach ($resultatcontinent as $row) {
                                echo "<option value='{$row['continent']}'>{$row['continent']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="filters-price">
                        <h6>Prix</h6>
                        <div class="twoinputprice">
                            <input type="number" name="min_price" placeholder="Minimum" min="0" default="0">
                            <input type="number" name="max_price" placeholder="Maximum" min="0" default="1000">
                        </div>
                    </div>
                    <div class="type-property">
                        <h6>Type de propriété</h6>
                        

                            <ul class="cboxtags">

                            <?php
$tableauLogement[] = ['icon' => 'img/house.svg', 'name' => 'maison', 'label' => 'Maison'];
$tableauLogement[] = ['icon' => 'img/apartment.svg', 'name' => 'appartement', 'label' => 'Appartement'];
$tableauLogement[] = ['icon' => 'img/guest-house.svg', 'name' => 'maison_hotes', 'label' => "Maison d'hôtes"];

// Définir le nom unique pour tous les boutons radio
$radio_name = 'type_logement';

foreach ($tableauLogement as $logement) {
    echo "<li><input type=\"radio\" id=\"" . $logement['name'] . "\" name=\"{$radio_name}\" value=\"{$logement['name']}\" " . (isset($_GET[$radio_name]) && $_GET[$radio_name] === $logement['name'] ? " checked" : "") . "><label for=\"" . $logement['name'] . "\"><img src=\"" . $logement['icon'] . "\" alt=\"\">" . $logement['label'] . "</label></li>";
}
?>



                            </ul>

                    </div>
                    <div class="options-property">
                        <h6>Options</h6>
                        <ul class="cboxtags">
                            <?php
                            $tableauOptions[] = ['icon' => 'img/wifi.svg', 'name' => 'wifi', 'label' => 'Wifi'];
                            $tableauOptions[] = ['icon' => 'img/eye.svg', 'name' => 'vue', 'label' => 'Vue'];
                            $tableauOptions[] = ['icon' => 'img/paw.svg', 'name' => 'animaux', 'label' => 'Animaux'];
                            $tableauOptions[] = ['icon' => 'img/water.svg', 'name' => 'lacs', 'label' => 'Lacs & rivières'];
                            $tableauOptions[] = ['icon' => 'img/bath.svg', 'name' => 'baignoire', 'label' => 'Baignoire'];
                            $tableauOptions[] = ['icon' => 'img/kitchen.svg', 'name' => 'cuisine', 'label' => 'Cuisine'];

                            foreach ($tableauOptions as $option) {
                                echo "<li><input type=\"checkbox\" id=\"" . $option['name'] . "\" name=\"" . $option['name'] . "\" " . (isset($_GET[$option['name']]) ? " checked" : "") . "><label for=\"" . $option['name'] . "\"><img src=\"" . $option['icon'] . "\"
                                alt=\"\">" . $option['label'] . "</label></li>";
                            }
                            ?>
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
                            <input id="guest-number" name="capacite" type="number" min="1"
                                value="<?php echo (isset($_GET['capacite']) ? $_GET['capacite'] : 1); ?>">
                            <button id="increase"><svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                </svg></button>
                        </div>
                    </div>
                    <button type="submit">Appliquer les filtres</button>
                </form>
            </div>
        </div>
        <div class="des-right">
            <div class="des-right-top">
                <h4>
                    <?php echo count($resultat); ?> Résultats
                </h4>
                <div class="sort">
                    <h6>Trier par</h6>
                    <select name="sort" id="sort">
                        <option value="0">Défaut</option>
                        <option value="1">Prix croissant</option>
                        <option value="2">Prix décroissant</option>
                    </select>
                </div>
            </div>
            <div id="map"></div>

            <?php if (count($resultat) > 0) { ?>
                <div class="des-right-bottom">
                    <?php foreach ($resultat as $row) {
                        $images = explode('+', $row['image']);
                        $image_url = $images[0];
                        echo "<a href='location.php?id=" . $row['logementID'] . "' class='container-des product' data-price='{$row["prix_par_nuit"]}'>
            <div class='img' style='background-image: url(./img/" . $image_url . ");'></div>
            <div class='text'>
                <h5>{$row['nom_logement']}</h5>
                <div class='location'>
                  <img src='img/location.svg' alt='location'>
                    <h6>{$row["nom_destination"]}, {$row["pays"]}</h6>
                </div>
                <h2>{$row["prix_par_nuit"]}€<span>/nuit</span></h2>
        </div>
        </a>";
                    }
                    ?>
                </div>
                <?php
            } else {
                echo "<div class='errorDes'>
            <h3 class='msgErreur'>Aucune destination ne correspond à votre recherche.</h3>
        </div>";
            }
            ?>
        </div>

    </div>

    <?php include ('includes/footer.php'); ?>
    <script src="script/destinations.js"></script>

</body>

</html>