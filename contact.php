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
    <title>Contactez-nous</title>
    <link rel="shortcut icon" href="img/icon.webp">
</head>

<body>
    <?php include ('includes/navigation.php'); ?>

    <div class="contact" id="faq">
        <h1 class="contact-title">👋 Besoin d'aide ?</h1>
        <div class="contact-header">
            <div class="contact-left">
                <div class="faq">
                    <h3>Questions fréquentes</h3>
                    <div class="faq-item">
                        <input type="checkbox" id="faq1">
                        <label for="faq1" class="faq-item-title"><span class="icon"></span>Quels types de logements
                            puis-je réserver
                            sur votre site ?</label>
                        <div class="faq-item-desc"> Sur notre site, vous pouvez réserver une variété de logements, y
                            compris des
                            villas de luxe, des maisons traditionnelles, des appartements modernes, des chalets de
                            montagne et bien
                            plus encore.</div>
                    </div>

                    <div class="faq-item">
                        <input type="checkbox" id="faq2">
                        <label for="faq2" class="faq-item-title"><span class="icon"></span>Comment puis-je trouver des
                            logements
                            adaptés à mes besoins spécifiques ?</label>
                        <div class="faq-item-desc">Utilisez nos filtres de recherche avancée pour affiner vos résultats
                            en fonction
                            de critères tels que le nombre de chambres, la présence d'équipements spécifiques (comme une
                            cuisine,
                            une baignoire, wi-fi, etc.), l'emplacement et bien d'autres encore.</div>
                    </div>

                    <div class="faq-item">
                        <input type="checkbox" id="faq3">
                        <label for="faq3" class="faq-item-title"><span class="icon"></span>Y a-t-il des frais cachés
                            associés à la
                            réservation d'un logement ?</label>
                        <div class="faq-item-desc">Non, nous croyons en la transparence. Les frais supplémentaires, tels
                            que les
                            frais de nettoyage ou de service, sont clairement indiqués sur la page de chaque logement
                            avant que vous
                            ne procédiez à la réservation.</div>
                    </div>

                    <div class="faq-item">
                        <input type="checkbox" id="faq4">
                        <label for="faq4" class="faq-item-title"><span class="icon"></span>Que dois-je faire si j'ai des
                            problèmes
                            pendant mon séjour ?</label>
                        <div class="faq-item-desc">Si vous rencontrez des problèmes pendant votre séjour, veuillez
                            contacter notre
                            équipe d'assistance clientèle disponible 24h/24 et 7j/7. Nous ferons de notre mieux pour
                            résoudre
                            rapidement tous les problèmes que vous pourriez rencontrer.</div>
                    </div>

                    <div class="faq-item">
                        <input type="checkbox" id="faq5">
                        <label for="faq5" class="faq-item-title"><span class="icon"></span>Puis-je amener mon animal de
                            compagnie
                            avec moi ?</label>
                        <div class="faq-item-desc">Certains logements autorisent les animaux de compagnie, tandis que
                            d'autres
                            peuvent avoir des restrictions à ce sujet. Utilisez nos filtres de recherche pour trouver
                            des logements
                            qui acceptent les animaux de compagnie.</div>
                    </div>
                </div>
            </div>
            <div class="contact-right">
                <div class="contact-center">
                    <form action="confirmation-support.php" method="POST">
                        <div class="contact-body">
                            <h3>Rien trouvé ? Contactez-nous 📩</h3>
                            <div class="contact-form">
                                <div class="twoinput">
                                    <div class="input-form">
                                        <label for="nom" id="NomContactInfo">Nom <span
                                                class="warning">*</span></label>
                                        <input required type="text" name="nom" id="nom" placeholder="Entrez votre nom"
                                            aria-describedby="NomContactInfo">
                                    </div>
                                    <div class="input-form">
                                        <label for="prenom" id="PrenomContactInfo">Prénom <span
                                                style="color:red">*</span></label>
                                        <input required type="text" name="prenom" id="prenom"
                                            placeholder="Entrez votre prénom" aria-describedby="PrenomContactInfo">
                                    </div>
                                </div>
                                <div class="input-form">
                                    <label for="email" id="EmailContactInfo">Email <span
                                            style="color:red">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="exemple@mail.fr" required
                                        aria-describedby="EmailContactInfo">
                                    <!-- Ajout d'une indication sur le format de l'email -->
                                </div>
                                <div class="input-form">
                                    <label for="tel" id="TelContactInfo">Téléphone <span
                                            style="color:red">*</span></label>
                                    <input type="tel" maxlength="10" name="tel" id="tel" placeholder="0011223344"
                                        required aria-describedby="TelContactInfo">
                                    <!-- Ajout d'une indication sur le format du téléphone -->
                                </div>
                                <div class="input-form">
                                    <label for="message" id="MessageInfo">Message <span
                                            style="color:red">*</span></label>
                                    <textarea name="message" id="message"
                                        placeholder="Entrez votre message (max. 500 caractères)" maxlength="500"
                                        required aria-describedby="MessageInfo"></textarea>
                                </div>
                                <p><span style="color:red">*</span> Champs obligatoires</p>
                                <input type="submit" value="Envoyer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include ('includes/footer.php'); ?>
</body>

</html>