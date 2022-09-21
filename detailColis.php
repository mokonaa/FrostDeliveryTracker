<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Frost Delivery Tracker - Détails du colis</title>
        <link rel="icon" type="image/png" sizes="64x64" href="img/favicon.png">
        <meta name="description"
            content="Frost Delivery Tracker, une solution simple pour que vos livraisons arrivent sans aucun problème.">
    
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    </head>
    
<body>
   <!--<header>
        <a href="index.html"><img src="img/logo.png" alt="Frost Delivery Tracker Logo" class="logo"
                draggable="false"></a>
        <nav>
            <a href="index.html">Accueil</a>
            <a href="apropos.html" class="page-active">À propos</a>
            <a href="partenaires.html">Partenaires</a>
            <a href="adherer.html">Adhérer</a>
            <a href="faq.html">FAQ</a>
        </nav>
    </header>-->

    <section class="detailsColis">
        <div>
            <h1 id="title">
                <!--<img id="title_pic" src="img/box.png" alt="icon d'un colis" />-->
                Détails du colis
            </h1>
            <div>Vous retrouverez sur cette page toutes les informations concernant votre colis.</div>
        </div>

        <!--- Détails--->
        <div id='containerInfos'>
            <div class="singleInfo">
                <p>ID : </p>
                <p>XXXXXX</p>
            </div>
            <div class="singleInfo">
                <p>Fournisseur : </p>
                <p>XXXXXX</p>
            </div>
            <div class="singleInfo">
                <p>Destinataire : </p>
                <p>XXXXXX</p>
            </div>
            <div class="singleInfo">
                <p>Heure de départ : </p>
                <p>XX : XX</p>
            </div>
            <div>
                <div class="singleInfo">
                    <p>Plage de température définie : </p>
                    <p>XX°C - XX°C</p>
                </div>
                <div class="singleInfo">
                    <p>Suivi du température : </p> 
                    <!---- Graphiques à intégrer ---->
                </div>
                <div>
                    Test
                </div>
            </div>
            <div id='mapwrapper' style="position: relative;
            height: 47vh;">
                <p>Position géographique : </p>
                <div>
                    <!----- Carte Google Maps à intégrer ---->
                    <div id="map" style="height:180px;">
                                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<footer>
        <div class="footer-top">
            <div class="footer-top-card">
                <h4 class="footer-top-card-title">Nous Contacter</h4>
                <p class="footer-top-card-content">1 Rue du Dahomey<br>75011 Paris<br>xxxxxx.xxxxxx@ecv.fr<br>01 85 08
                    26 86</p>
                <img src="img/logo.png" alt="Frost Delivery Tracker Logo" class="logo" draggable="false">
            </div>
            <div class="footer-top-card">
                <h4 class="footer-top-card-title">Frost Delivery Tracker</h4>
                <div class="footer-top-card-content">
                    <a href="engagements.html">Nos engagements</a>
                    <a href="partenaires.html">Nos partenaires</a>
                    <a href="apropos.html" class="page-active">À propos de nous</a>
                    <a href="conditions.html">Conditions générales</a>
                    <a href="faq.html">FAQ / Aide</a>
                </div>
            </div>
            <div class="footer-top-card">
                <h4 class="footer-top-card-title">Adhérer à notre produit</h4>
                <div class="footer-top-card-content">
                    <a href="engagements.html">Nos engagements</a>
                    <a href="adherer.html">Adhérer</a>
                    <a href="faq.html">FAQ</a>
                </div>
            </div>
            <div class="footer-top-card">
                <h4 class="footer-top-card-title">Menu</h4>
                <div class="footer-top-card-content">
                    <a href="index.html">Accueil</a>
                    <a href="apropos.html" class="page-active">À propos</a>
                    <a href="partenaires.html">Partenaires</a>
                    <a href="adherer.html">Adhérer</a>
                    <a href="faq.html">FAQ</a>
                </div>
            </div>
        </div>
        <span class="footer-bottom">© 2022 Frost Delivery Tracker - Tous droits réservés</span>
    </footer>-->
    
</body>
<!--<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7O3kpyDj3zfPxjrTu0CWtexfnmpkrFlA&callback=initMap"></script>-->


<script>
    console.log('halloha');
    console.log('hellloooooo');

    // condition à ajouter pour l'affichage de la carte 
    /*let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
    });
    }
    // window.initMap = initMap;
    window.onload = function(){
		// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
        console.log('onload done');
		initMap(); 
	};*/

    /*
    document.getElementById("map").removeAttribute("style");

    function initMap() {
        const myLatLng = { lat: 48.8549, lng: 2.3380 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: myLatLng,
        });

        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });
    }

    window.initMap = initMap;
    document.getElementById("map").removeAttribute("style");
    console.log("removed it ? ");*/


    var map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    console.log("finished, does it show up ?");

</script>
</html>