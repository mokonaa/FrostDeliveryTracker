
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../php/head.php")?>
    <title>Frost Delivery Tracker</title>
    <link rel="stylesheet" href="accueil.css">
</head>

<body>



   

    <?php include("../php/header.php")?>




    <section class="accueil">
        <div class="accueil-title">
            <h1>Suivre votre colis</h1>
            <p>Garder un oeil sur l'état et la localisation de votre colis.<br>Vous n'avez qu'à rentrer le numéro
        de votre colis et vous serez redirigés vers la page adaptée.</p>
            <div class="accueil-button">
                <input type="text" placeholder="n° de colis">
                <button id="numeroColisButton">Suivre mon colis</button>
            </div>
        </div>

        <div class="accueil-avantage-globaux">
            <h1>Les avantages</h1>
            <div class="accueil-avantage-globaux-container">
                <div class="accueil-avantage-globaux-container-card">
                    <img src="./img/haute-qualite.png" alt="">
                    <h2>Un transport sécurisé </h2>
                    <p>Nous faisons appel aux meilleurs transporteurs pour assurer la sécurité de vos colis</p>
                </div>
                <div class="accueil-avantage-globaux-container-card">
                    <img src="./img/freezing.png" alt="">
                    <h2>Des produits toujours frais à l’arrivée </h2>
                    <p>Grâce à notre système nous pouvons contrôler la température des produits lors du transport</p>
                </div>
                <div class="accueil-avantage-globaux-container-card">
                    <img src="./img/delivery.png" alt="">
                    <h2>Un suivi de vos colis</h2>
                    <p> Vous pourrez suivre le cheminement de vos colis en temps réel grâce à notre système de localisation</p>
                </div>
            </div>
        </div>


        <div class="accueil-presentation">
            <h1>Qui est la FDT</h1>
            <p>
                Nous sommes une petite entreprise avec de grands objectifs. En effet, nous voulons révolutionner le
                monde du transport en gardant à l'esprit que la chaîne du froid est un problème majeur...
            </p>
            <a href="../pageApropos/apropos.php">En savoir plus...</a>
        </div>


        <div class="accueil-partenaires">
            <h1>Nos partenaires</h1>
            <div class="accueil-partenaires-content">
                <img src="./img/auchan.png" alt="auchan" draggable="false">
                <img src="./img/LOGO_ECV_CSC_Vert_RVB.jpg" alt="ECV" draggable="false">
                <img src="./img/carrefour.png" alt="carrefour" draggable="false">
                <img src="./img/LOGO_ECV_CSC_Vert_RVB.jpg" alt="ECV" draggable="false">
                <img src="./img/E.Leclerc logo blog.png" alt="Leclerc" draggable="false">
                <img src="./img/LOGO_ECV_CSC_Vert_RVB.jpg" alt="ECV" draggable="false">
            </div>
        </div>
    
    </section>

    <?php include("../php/footer.php")?>
</body>

</html>