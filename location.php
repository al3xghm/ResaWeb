<?php

//connexion a la bdd
include ("includes/connexion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Location</title>
</head>
<body>
<?php include ('includes/navigation.php'); ?>

<div class="locationpage">
<div class="loca-left">
    <h2>Villa Zanka</h2>
    <div class="location-loca">
    <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                            <h5>Paris, France</h5>
    </div>
                            <div class="loca-price">
                            <h3>90k €<span>/nuit</span></h3>
    </div>
    <div class="loca-options">
    <div class="loca-options-info">
    <img src="img/kitchen.svg" alt="">
    <h5>Cuisine</h5>
</div>
<div class="loca-options-info">
    <img src="img/wifi.svg" alt="">
    <h5>Wi-fi</h5>
</div>
<div class="loca-options-info">
    <img src="img/paw.svg" alt="">
    <h5>Animaux de compagnie</h5>
</div>
<div class="loca-options-info">
    <img src="img/eye.svg" alt="">
    <h5>Vue</h5>
</div>
</div>
<div class="loca-desc">
<p>La villa Zanka est une villa de luxe située à Paris, en France. Elle est située dans un quartier calme et paisible, à proximité de toutes les commodités. La villa dispose de 5 chambres, 3 salles de bains, d'une cuisine entièrement équipée, d'un grand salon, d'une salle à manger, d'une terrasse, d'un jardin et d'une piscine. La villa est entièrement meublée et équipée. Elle est idéale pour les familles, les couples et les groupes d'amis. La villa est disponible à la location pour des séjours de courte ou longue durée. </p>
</div>
<a href="reservation.php" class="loca-btn">Réserver une date <img src="img/calendar.svg" alt=""></a>
</div>
<div class="loca-right">
<div class="loca-img1"> </div>
<div class="loca-img2"> </div>
<div class="loca-img3"> </div>
<div class="loca-img4"> </div>
<div class="loca-img5"> </div>

</div>

</div>
</div>













<?php include ('includes/footer.php'); ?>
    <script src="script/script.js"></script>
</body>
</html>