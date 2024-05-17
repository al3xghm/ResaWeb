<?php
include ('includes/connexion.php');
$sql = "SELECT * FROM logements INNER JOIN destinations ON logements.destinationextID = destinations.destinationID ORDER BY logements.logementID DESC LIMIT 4";
$result = $db->query($sql);
$last = $result->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>WeRent : Réservez l'extraordinaire, vivez l'inoubliable.</title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>

    <?php include ('includes/navigation.php'); ?>

    <header id="homeheader" class="homeheader" data-aos="fade-in">
        <div class="leftheader">
            <h1>Votre escapade de rêve commence ici !</h1>
            <p>Avec notre sélection exclusive de logements de vacances, trouvez l'endroit parfait pour des
                moments de détente en famille ou entre amis. Parcourez notre catalogue diversifié, des retraites
                paisibles en bord de mer aux demeures élégantes au cœur des villes emblématiques.</p>

            <!-- chiffres -->
            <div class="chiffres">
                <div class="chiffre">
                    <p><b>+40k</b></p>
                    <p>réservations</p>
                </div>
                <div class="barre"></div>
                <div class="chiffre">
                    <p><b>+75</b></p>
                    <p>destinations</p>
                </div>
                <div class="barre"></div>
                <div class="chiffre">
                    <p><b>4.5 <span>/5</span></b>
                    </p>
                    <p>note moyenne</p>
                </div>
            </div>


            <!-- slider avis -->
            <div id="slider-wrapper-review">

                <input checked type="radio" name="slide-review" class="control" id="Slide1-review" />
                <label for="Slide1-review" id="s1-review"></label>
                <input type="radio" name="slide-review" class="control" id="Slide2-review" />
                <label for="Slide2-review" id="s2-review"></label>
                <input type="radio" name="slide-review" class="control" id="Slide3-review" />
                <label for="Slide3-review" id="s3-review"></label>
                <input type="radio" name="slide-review" class="control" id="Slide4-review" />
                <label for="Slide4-review" id="s4-review"></label>

                <div class="overflow-wrapper">

                    <?php
                    $index = 0;
                    foreach ($last as $row) {
                        $images = explode('+', $row['image']);
                        $image_url = $images[0];

                        $index++;
                        ?>
                        <a href="location.php?id=<?php echo $row['logementID']; ?>" class="slide"
                            id="slide<?php echo $index; ?>-review"
                            style="background: linear-gradient(to bottom, transparent, #000000), url('img/logements/<?php echo $image_url; ?>'); background-position: center">
                            <div class="city">
                                <h6>
                                    <?php echo "{$row['nom_destination']}, {$row['pays']}"; ?>
                                </h6>
                            </div>
                            <div class="word">
                                <h6>
                                    <?php echo $row['nom_logement']; ?>
                                </h6>
                            </div>
                            <div class="review">
                                <img src="img/star.svg" alt="star">
                                <img src="img/star.svg" alt="star">
                                <img src="img/star.svg" alt="star">
                                <img src="img/star.svg" alt="star">
                                <img src="img/star.svg" alt="star">

                            </div>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="rightheader">
            <div class="largebox">
                <h3>Des résidences extraordinaires à des prix exceptionnels</h3>
                <a class="button" href="destinations.php?vue=on" title="Découvrir les résidences">
                    <p>Les résidences avec les plus belles vues</p>
                    <img src="./img/fleche.svg" alt="Découvrir Les résidences avec les plus belles vues">
                </a>
            </div>
            <a class="thinbox" href="destinations.php" title="Explorer les destinations">
                <h4>Voir toutes les destinations</h4>
                <img src="./img/flechew.svg" alt="Voir toutes les destinations">
            </a>
            <div class="flexrow">
                <div class="smallbox smallboxone">
                    <h3>Villas au bord de mer</h3>
                    <a class="button" href="destinations.php?type=villa&mer=on" title="Découvrir les villas">
                        <img src="./img/fleche.svg" alt="Voir les villas au bord de mer">
                    </a>

                </div>
                <div class="smallbox smallboxtwo">
                    <h3>Châlets en montagne</h3>
                    <a class="button" href="destinations.php?type=chalet&montagne=on" title="Découvrir les villas">
                        <img src="./img/fleche.svg" alt="Voir les châlets en montagne">
                    </a>

                </div>
            </div>

        </div>
    </header>

    <!-- chiffres -->
    <div id="about-home" class="about-home" data-aos="fade-in">
        <div class="about-left">
            <div class="about-head">
                <h2>Spécialiste de villas et maisons de vacances</h2>
                <h6>Pour vos prochaines vacances, profitez de votre indépendance !
                    <br>WeRent propose de nombreuses locations de vacances indépendantes : villas privées, maisons
                    individuelles et chalets d'exception pour des séjours uniques.
                </h6>
            </div>
            <div class="step">
                <div>

                    <img src="./img/trust.svg" alt="Icone confiance">
                </div>

                <div>
                    <h5>Fiabilité et confiance</h5>
                    <p>WeRent propose exclusivement des hébergements de vacances gérées par des agences. Toutes les
                        offres
                        proposées sur notre site sont totalement fiables et sûres.</p>
                </div>
            </div>
            <div class="step">
                <div>

                    <img src="./img/house.svg" alt="Icone maison">
                </div>
                <div>
                    <h5>Plus de 26000 propriétés</h5>
                    <p>Un grand choix de maisons de vacances à louer, situées principalement en Europe: France, Espagne,
                        Italie, Portugal, Grèce ...</p>
                </div>
            </div>
            <div class="step">
                <div>

                    <img src="./img/loupe.svg" alt="Icone loupe">
                </div>
                <div>

                    <h5>Recherchez, comparez et réservez !</h5>
                    <p>Trouvez en quelques secondes les locations qui correspondent à vos envies de vacances. Réservez
                        en
                        ligne en toute confiance et en toute sécurité.</p>
                </div>

            </div>
        </div>

        <div class="about-right">
            <span>Image décorative</span>
        </div>
    </div>
    <div class="faq" id="faq" data-aos="fade-in">
        <h2>Questions fréquentes</h2>
        <div class="faq-item">
            <input type="checkbox" id="faq1">
            <label for="faq1" class="faq-item-title"><span class="icon"></span>Quels types de logements puis-je réserver
                sur votre site ?</label>
            <div class="faq-item-desc"> Sur notre site, vous pouvez réserver une variété de logements, y compris des
                villas de luxe, des maisons traditionnelles, des appartements modernes, des chalets de montagne et bien
                plus encore.</div>
        </div>

        <div class="faq-item">
            <input type="checkbox" id="faq2">
            <label for="faq2" class="faq-item-title"><span class="icon"></span>Comment puis-je trouver des logements
                adaptés à mes besoins spécifiques ?</label>
            <div class="faq-item-desc">Utilisez nos filtres de recherche avancée pour affiner vos résultats en fonction
                de critères tels que le nombre de chambres, la présence d'équipements spécifiques (comme une cuisine,
                une baignoire, wi-fi, etc.), l'emplacement et bien d'autres encore.</div>
        </div>

        <div class="faq-item">
            <input type="checkbox" id="faq3">
            <label for="faq3" class="faq-item-title"><span class="icon"></span>Y a-t-il des frais cachés associés à la
                réservation d'un logement ?</label>
            <div class="faq-item-desc">Non, nous croyons en la transparence. Les frais supplémentaires, tels que les
                frais de nettoyage ou de service, sont clairement indiqués sur la page de chaque logement avant que vous
                ne procédiez à la réservation.</div>
        </div>

        <div class="faq-item">
            <input type="checkbox" id="faq4">
            <label for="faq4" class="faq-item-title"><span class="icon"></span>Que dois-je faire si j'ai des problèmes
                pendant mon séjour ?</label>
            <div class="faq-item-desc">Si vous rencontrez des problèmes pendant votre séjour, veuillez contacter notre
                équipe d'assistance clientèle disponible 24h/24 et 7j/7. Nous ferons de notre mieux pour résoudre
                rapidement tous les problèmes que vous pourriez rencontrer.</div>
        </div>

        <div class="faq-item">
            <input type="checkbox" id="faq5">
            <label for="faq5" class="faq-item-title"><span class="icon"></span>Puis-je amener mon animal de compagnie
                avec moi ?</label>
            <div class="faq-item-desc">Certains logements autorisent les animaux de compagnie, tandis que d'autres
                peuvent avoir des restrictions à ce sujet. Utilisez nos filtres de recherche pour trouver des logements
                qui acceptent les animaux de compagnie.</div>
        </div>
    </div>
    <?php require ('includes/footer.php'); ?>

    <!-- scripts javascript -->
    <script src="script/index.js"></script>
</body>

</html>
