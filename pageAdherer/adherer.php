<!DOCTYPE html>
<html lang="en">
<head>

    <?php include("../php/head.php")?>
    <title>Adhérer à Frost Delivery Tracker</title>
    <link rel="stylesheet" href="adherer.css">

</head>
<body>


        <?php include("../php/header.php")?>


    <section>
        <div class="container-offre">
            <div class="txt-offre">
                <h2>Arduino - TKinter</h2>
                <p>Proposez à vos clients de gardez un œil sur l’état et la localisation de leurs colis.
                <br> <br>
                Plus de doute sur le transport des produits… Avec notre boîtier Arduino-TKinter les utilisateurs pourront vérifier la température ainsi que la localisation des produits en temps réel.</p>
            </div>

            <div class="img-offre">
                <img src="img/boitier.png" alt="Notre boîtier Arduino - TKinter">
            </div>
        </div> 

        <form class="form">
            <div class="infos">
                <h3>Nous contacter</h3>
                <label for="Nom"> Nom </label> <input id="Nom" placeholder= "Entrez votre nom..."></input>
                <label for="Email">Email </label> <input id="Email" placeholder= "Entrez une adresse mail valide..."></input>
                <label for="Massage"> Message </label> <input id="Message" placeholder= ></input>
                <button>Envoyer</button>
            </div>
            
            <div class="contact">
                <div class="infos-contact">
                    <h4>Contactez-nous</h4>
                    <p class="infos-perso">01 85 08 26 86 <br>
                        xxxxxx.xxxxxx@ecv.fr</p>
                    <h4>Emplacement</h4>
                    <p class="infos-perso">1 Rue du Dahomey <br> 75011 Paris</p>
                    <h4>Siret</h4>
                    <p class="infos-siret"> 123 456 789 00023</p>
                </div>
            </div>
        </form>
    </section>


        <?php include("../php/footer.php")?>


</body>
</html>