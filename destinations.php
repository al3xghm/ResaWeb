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

<div class="destinations">


    <div class="des-left">
        <h4>Filtres</h4>
    </div>
    <div class="des-right">
        <h4>Résultats</h4>
        <div class="des-right-top"></div>
        <div class="des-right-bottom">
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90K €<span>/nuit</span></h2>
                </div>
            </div>  
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div>     
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div>   
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div>  
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div>  
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div>    
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div>  
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div> 
            <div class="container-des">
                <div class="img"></div>
                <div class="text">
                    <h5>Villa Phenicia</h5>
                    <div class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h6>Paris, France</h6>
                    </div>
                    <h2>90k €<span>/nuit</span></h2>
                </div>
            </div>                                                   
</div>
    </div>
</div> 

<?php include ('includes/footer.php'); ?>
</body>
</html>
