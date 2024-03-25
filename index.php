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
    <title>WeRent : Réservez l'extraordinaire, vivez l'inoubliable.</title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>

    <?php include ('includes/navigation.php'); ?>

    <header id="homeheader" class="homeheader">
        <div class="leftheader">
            <h1>Votre escapade de rêve commence ici !</h1>
            <h5>Avec notre sélection exclusive de villas et de maisons de vacances, trouvez l'endroit parfait pour des
                moments de détente en famille ou entre amis. Parcourez notre catalogue diversifié, des retraites
                paisibles en bord de mer aux demeures élégantes au cœur des villes emblématiques.</h5>

            <!-- chiffres -->
            <div class="chiffres">
                <div class="chiffre">
                    <h3>+40k</h3>
                    <h6>réservations</h6>
                </div>
                <div class="barre"></div>
                <div class="chiffre">
                    <h3>+75</h3>
                    <h6>destinations</h6>
                </div>
                <div class="barre"></div>
                <div class="chiffre">
                    <h3>4.5 <span>/5</span>
                    </h3>
                    <h6>note moyenne</h6>
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
                    <div class="slide" id="slide1-review">
                        <div class="city"><h6>Monteverde, Costa Rica</h6></div>
                        <div class="word"><h6>Cabane perchée</h6></div>
                        <div class="review"><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""></div>
                    </div>
                    <div class="slide" id="slide2-review">
                    <div class="city"><h6>Rovaniemi, Finlande</h1></div>
                        <div class="word"><h6>Dôme de glace</h1></div>
                        <div class="review"><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""></div>
                    </div>
                    <div class="slide" id="slide3-review">
                    <div class="city"><h6>Tonoshō-chō, Japon</h1></div>
                        <div class="word"><h6>Chambre privée</h1></div>
                        <div class="review"><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""></div>
                    </div>
                    <div class="slide" id="slide4-review">
                    <div class="city"><h6>Raf-Raf, Tunisie</h1></div>
                        <div class="word"><h6>Villa</h1></div>
                        <div class="review"><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""><img src="img/star.svg" alt=""></div>
                    </div>
                </div>
            </div>

            <!--  
-->
        </div>
        <div class="rightheader">
            <div class="largebox">
                <h3>Des résidences extraordinaires à des prix exceptionnels</h3>
                <a class="button" href="destinations.php" title="Découvrir les résidences">
                    <p>Les résidences les mieux notées</p>
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12"
                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                    </svg>
                </a>
            </div>
            <a class="thinbox" href="destinations.php" title="Explorer les destinations">
                <h4>Voir toutes les destinations</h4>
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                </svg>
            </a>
            <div class="flexrow">
                <div class="smallbox smallboxone">
                    <h3>Villas au bord de mer</h3>
                    <a class="button" href="destinations.php" title="Découvrir les villas">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12"
                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                        </svg>
                    </a>

                </div>
                <div class="smallbox smallboxtwo">
                    <h3>Châlets en montagne</h3>
                    <a class="button" href="destinations.php" title="Découvrir les villas">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12"
                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                        </svg>
                    </a>

                </div>
            </div>

        </div>
    </header>

    <!-- chiffres -->
    <div id="about-home" class="about-home">
        <div class="about-left">
            <div class="about-head">
                <h3>Spécialiste de villas et maisons de vacances</h3>
                <h7>Pour vos prochaines vacances, profitez de votre indépendance !
                    <br>WeRent propose de nombreuses locations de vacances indépendantes : villas privées, maisons et
                    penthouse
                    pour des séjours uniques.
                </h7>
            </div>
            <div class="step">
                <div>

                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M48 256C48 141.1 141.1 48 256 48c63.1 0 119.6 28.1 157.8 72.5c8.6 10.1 23.8 11.2 33.8 2.6s11.2-23.8 2.6-33.8C403.3 34.6 333.7 0 256 0C114.6 0 0 114.6 0 256v40c0 13.3 10.7 24 24 24s24-10.7 24-24V256zm458.5-52.9c-2.7-13-15.5-21.3-28.4-18.5s-21.3 15.5-18.5 28.4c2.9 13.9 4.5 28.3 4.5 43.1v40c0 13.3 10.7 24 24 24s24-10.7 24-24V256c0-18.1-1.9-35.8-5.5-52.9zM256 80c-19 0-37.4 3-54.5 8.6c-15.2 5-18.7 23.7-8.3 35.9c7.1 8.3 18.8 10.8 29.4 7.9c10.6-2.9 21.8-4.4 33.4-4.4c70.7 0 128 57.3 128 128v24.9c0 25.2-1.5 50.3-4.4 75.3c-1.7 14.6 9.4 27.8 24.2 27.8c11.8 0 21.9-8.6 23.3-20.3c3.3-27.4 5-55 5-82.7V256c0-97.2-78.8-176-176-176zM150.7 148.7c-9.1-10.6-25.3-11.4-33.9-.4C93.7 178 80 215.4 80 256v24.9c0 24.2-2.6 48.4-7.8 71.9C68.8 368.4 80.1 384 96.1 384c10.5 0 19.9-7 22.2-17.3c6.4-28.1 9.7-56.8 9.7-85.8V256c0-27.2 8.5-52.4 22.9-73.1c7.2-10.4 8-24.6-.2-34.2zM256 160c-53 0-96 43-96 96v24.9c0 35.9-4.6 71.5-13.8 106.1c-3.8 14.3 6.7 29 21.5 29c9.5 0 17.9-6.2 20.4-15.4c10.5-39 15.9-79.2 15.9-119.7V256c0-28.7 23.3-52 52-52s52 23.3 52 52v24.9c0 36.3-3.5 72.4-10.4 107.9c-2.7 13.9 7.7 27.2 21.8 27.2c10.2 0 19-7 21-17c7.7-38.8 11.6-78.3 11.6-118.1V256c0-53-43-96-96-96zm24 96c0-13.3-10.7-24-24-24s-24 10.7-24 24v24.9c0 59.9-11 119.3-32.5 175.2l-5.9 15.3c-4.8 12.4 1.4 26.3 13.8 31s26.3-1.4 31-13.8l5.9-15.3C267.9 411.9 280 346.7 280 280.9V256z" />
                    </svg>
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

                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                </div>
                <div>
                    <h5>Plus de 26000 propriétés</h5>
                    <p>Un grand choix de maisons de vacances à louer, situées principalement en Europe: France, Espagne,
                        Italie,
                        Croatie, Portugal, Grèce ...</p>
                </div>
            </div>
            <div class="step">
                <div>

                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
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
            <div id="slider-wrapper-about">

                <input checked type="radio" name="slide-about" class="control" id="Slide1-about" />
                <label for="Slide1-about" id="s1-about"></label>
                <input type="radio" name="slide-about" class="control" id="Slide2-about" />
                <label for="Slide2-about" id="s2-about"></label>
                <input type="radio" name="slide-about" class="control" id="Slide3-about" />
                <label for="Slide3-about" id="s3-about"></label>
                <input type="radio" name="slide-about" class="control" id="Slide4-about" />
                <label for="Slide4-about" id="s4-about"></label>

                <div class="overflow-wrapper">
                    <div class="slide" id="slide1-about"></div>
                    <div class="slide" id="slide2-about"></div>
                    <div class="slide" id="slide3-about"></div>
                    <div class="slide" id="slide4-about"></div>
                </div>
            </div>
</div>
</div>
            <?php require ('includes/footer.php'); ?>

            <!-- scripts javascript -->
            <script src="script/script.js"></script>
</body>

</html>