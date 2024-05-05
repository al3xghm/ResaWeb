<?php
// Connexion à la base de données
include ("includes/connexion.php");

// Requête SQL pour récupérer les logements en fonction des filtres et de la recherche combinée
$requete = "SELECT * FROM logements INNER JOIN destinations ON logements.destinationextID = destinations.destinationID";

// Tableau des conditions à ajouter à la requête
$conditions = [];

// Tableau des valeurs à lier aux paramètres nommés
$valeurs = [];

// Vérification de la recherche combinée
if (isset($_GET['search_combined']) && !empty($_GET['search_combined'])) {
    // Ajouter une condition pour rechercher dans le nom de logement ou la destination
    $search_combined = $_GET['search_combined'];
    $conditions[] = "(nom_logement LIKE :search OR nom_destination LIKE :search)";
    $valeurs[':search'] = "%$search_combined%";
}

// Définition des valeurs par défaut pour min_price et max_price
$default_min_price = '0';
$default_max_price = '1000';

// Utilisation des valeurs par défaut si les champs ne sont pas remplis
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : $default_min_price;
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : $default_max_price;

// Convertir min_price et max_price en 0 et 1000 respectivement si vides
if ($min_price === '') {
    $min_price = '0';
}
if ($max_price === '') {
    $max_price = '1000';
}

// Si des valeurs de prix sont définies, on ajoute une clause WHERE pour filtrer par prix
if ($min_price !== '' && $max_price !== '') {
    $conditions[] = "prix_par_nuit BETWEEN :min_price AND :max_price";
    $valeurs[':min_price'] = $min_price;
    $valeurs[':max_price'] = $max_price;
}

// Vérification des options
$options = array('wifi', 'vue', 'lacs', 'mer', 'animaux', 'montagne', 'baignoire', 'cuisine');
foreach ($options as $option) {
    if (isset($_GET[$option]) && $_GET[$option] === 'on') {
        $conditions[] = "{$option} = 1";
    }
}

// Vérification du type de propriété
if (isset($_GET['type']) && !empty($_GET['type'])) {
    $conditions[] = "type = :type";
    $valeurs[':type'] = $_GET['type'];
}

// Vérification du nombre d'invités
if (isset($_GET['capacite']) && $_GET['capacite'] !== '') {
    $conditions[] = "capacite >= :capacite";
    $valeurs[':capacite'] = $_GET['capacite'];
}


// Vérification du continent
if (isset($_GET['continent']) && $_GET['continent'] !== '') {
    $conditions[] = "continent = :continent";
    $valeurs[':continent'] = $_GET['continent'];
}

// Si des conditions sont définies, les ajouter à la requête
if (!empty($conditions)) {
    $requete .= " WHERE " . implode(" AND ", $conditions);
}

// Exécuter la requête avec les valeurs liées aux paramètres nommés
$stmt = $db->prepare($requete);
$stmt->execute($valeurs);

// Récupération des résultats
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Requête région
/* $requetecontinent = "SELECT continent FROM destinations"; */
$requetecontinent = "SHOW COLUMNS FROM destinations WHERE Field = 'continent'";
$stmtcontinent = $db->query($requetecontinent);
$resultatcontinent = $stmtcontinent->fetchAll(PDO::FETCH_ASSOC);

$enumLine = $resultatcontinent[0]['Type'];
$regex = "/'([^']+)'/";  // Utilise une expression régulière pour extraire les valeurs entre apostrophes
preg_match_all($regex, $enumLine, $matches);
$enumValues = $matches[1];
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster-src.js"></script>
    <title>Destinations</title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>
    <?php include ('includes/navigation.php'); ?>
    <div class="destinations">
        <div class="des-left-column">
            <div class="fil-ariane">
                <a href="index.php">Accueil</a><span>/</span><span><b>Destinations</b></span>
            </div>
            <div class="des-left">
                <div class="section-filters">
                    <form method="get" action="destinations.php">
                        <div class="filters-regions">
                            <h6 id="filters-regions">Région</h6>
                            <select name="continent" aria-labelledby="filters-regions" id="continent"
                                alt="Séléction de continent">
                                <option value="">Choisir une région</option>
                                <?php foreach ($enumValues as $value): ?>
                                    <?php
                                    // Vérifier si l'option actuelle est celle qui a été sélectionnée auparavant
                                    $selected = (isset($_GET['continent']) && $_GET['continent'] === $value) ? 'selected' : '';
                                    ?>
                                    <option value="<?= htmlspecialchars($value) ?>" <?= $selected ?>>
                                        <?= htmlspecialchars($value) ?></option>
                                <?php endforeach; ?>
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
                                $tableauLogement[] = ['icon' => 'img/house.svg', 'name' => 'villa', 'label' => 'Villa'];
                                $tableauLogement[] = ['icon' => 'img/guest-house.svg', 'name' => 'chalet', 'label' => "Châlet"];
                                $tableauLogement[] = ['icon' => 'img/apartment.svg', 'name' => 'appartement', 'label' => 'Appartement'];


                                // Définir le nom unique pour tous les boutons radio
                                $radio_name = 'type';

                                foreach ($tableauLogement as $logement) {
                                    echo "<li><input type=\"checkbox\" id=\"" . $logement['name'] . "\" name=\"{$radio_name}\" value=\"{$logement['name']}\" onclick=\"allowOnlyOneCheckbox(this)\" " . (isset($_GET[$radio_name]) && $_GET[$radio_name] === $logement['name'] ? " checked" : "") . "><label for=\"" . $logement['name'] . "\"><img src=\"" . $logement['icon'] . "\" alt=\"\">" . $logement['label'] . "</label></li>";
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
                                $tableauOptions[] = ['icon' => 'img/mountain.svg', 'name' => 'montagne', 'label' => 'Montagne'];
                                $tableauOptions[] = ['icon' => 'img/mer.svg', 'name' => 'mer', 'label' => 'Au bord de la mer'];
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
                            <h6 id="guest-counter">Nombre d'invités</h6>
                            <div class="guest-counter">
                                <button id="decrease" aria-label="Moins d'invités"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="14" width="12.25"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                                    </svg></button>
                                <input id="guest-number" aria-labelledby="guest-counter" name="capacite" type="number"
                                    min="1" max="12"
                                    value="<?php echo (isset($_GET['capacite']) ? $_GET['capacite'] : 1); ?>">
                                <button id="increase" aria-label="Plus d'invités"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="14" width="12.25"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg></button>
                            </div>
                        </div>
                        <div class="btn-filters">
                            <button type="submit">Appliquer les filtres</button>
                            <button type="reset" id="resetButton">Réinitialiser les filtres</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="burger js-burger">
            <img src="img/filters.svg" height="20px" width="20px" alt="burger">
        </div>


        <div class="des-right">
            <div class="des-right-top">
                <h4>
                    <!-- if echo count=1 Résultat au singulier et si count > 1 écrire Résultat au pluriel -->
                    <?php if (count($resultat) <= 1) {
                        echo count($resultat) . " résultat";
                    } else {
                        echo count($resultat) . " résultats";
                    }
                    ?>
                </h4>
                <div class="sort">
                    <h5 id="trier">Trier par</h5>
                    <select name="sort" aria-labelledby="trier" id="sort" alt="Filtrer les prix">
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
            <div class='img' style='background-image: url(./img/logements/" . $image_url . ");'></div>
            <div class='text'>
                <p>{$row['nom_logement']}</p>
                <div class='location'>
                  <img src='img/location.svg' alt='location'>
                    <p class='name-location'>{$row["nom_destination"]}, {$row["pays"]}</p>
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
            <h3 class='msgErreur'>Aucune destination ne correspond à votre recherche. 😥</h3>
        </div>";
            }
            ?>
        </div>
    </div>
    <?php include ('includes/footer.php'); ?>
    <script src="script/destinations.js"></script>
</body>

</html>