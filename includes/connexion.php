<?php 
// Établir la connexion à la base de données avec PDO
$db = new PDO('mysql:host=localhost;dbname=resaweb;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Vérifier si les données sont postées
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom_logement']) && isset($_POST['coord'])) {
    $nom_logement = htmlspecialchars($_POST['nom_logement']);
    $coord = htmlspecialchars($_POST['coord']);

    // Validation des coordonnées
    $parts = explode(',', $coord);
    if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
        $sql = "INSERT INTO logements (nom_logement, coord) VALUES (:nom_logement, :coord) ON DUPLICATE KEY UPDATE coord = :coord";
        $stmt = $db->prepare($sql);
        if ($stmt->execute(['nom_logement' => $nom_logement, 'coord' => $coord])) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . implode(";", $stmt->errorInfo());
        }
    } else {
        echo "Invalid coordinates format.";
    }
}

// Sélectionner toutes les données pour les écrire dans le fichier JSON
$sql = "SELECT * FROM logements";
$stmt = $db->query($sql);
$features = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Traitement des coordonnées
    $coordinates = explode(',', $row['coord']);
    if (count($coordinates) == 2 && is_numeric($coordinates[0]) && is_numeric($coordinates[1])) {
        $longitude = floatval(trim($coordinates[1]));
        $latitude = floatval(trim($coordinates[0]));

        // Extraction de la première image
        $images = explode('+', $row['image']);
        $firstImage = $images[0]; // prend la première image

        $features[] = [
            'type' => 'Feature',
            'properties' => [
                'logementID' => $row['logementID'],
                'nom_logement' => $row['nom_logement'],
                'image' => $firstImage, // Ajoute la première image aux propriétés
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [$longitude, $latitude]
            ]
        ];
    }
}

// Créer le GeoJSON
$geojson = [
    'type' => 'FeatureCollection',
    'features' => $features
];
?>
