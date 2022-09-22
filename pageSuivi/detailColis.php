<!doctype html>
<html lang="fr">

    <head>
         <?php include("../php/head.php")?>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    </head>
    
<body>


    <?php 
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbname = "frost"; 
        $userInfos = [];
        $tempArrayIn = [];
        $tempArrayOut = [];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        // requête pour aller chercher les données du colis
        $sql = "SELECT * FROM Packages;"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //var_dump($row);
            //echo "id: " . $row["id"]."<br>";
            array_push($userInfos, $row);
            array_push($tempArrayIn, $row["temp_in"]);
            array_push($tempArrayOut, $row["temp_out"]);
        }
        } else {
            echo "0 results";
        }

        $conn->close();

        //var_dump($userInfos);
        //echo "<br>";
        //var_dump($tempArrayIn);
        //echo "<br>";
        //var_dump($tempArrayOut);

        /*
        
          $host = "localhost";
        $conn = mysqli_connect($host,$user,$pass,$base);

        // Détection d'erreur bdd
        if(mysqli_connect_error())
        {
            echo "Non connecté à la BDD.";
        }
        else
        {
            echo "Connecté à la BDD";
        }
        */ 


    ?>
  
    <header>
        <?php include("../php/header.php")?>
    </header>

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
                <p><?php echo $userInfos[0]['id'] ?></p>
            </div>
            <!--<div class="singleInfo">
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
            </div>-->
            <div>
                <div class="singleInfo">
                    <p>Plage de température définie : </p>
                    <p><?php echo $userInfos[0]['temp_min'] ?> °C- <?php echo $userInfos[0]['temp_max'] ?> °C</p>
                </div>
                <div class="singleInfo">
                    <p>Suivi du température : </p>
                    <div class="wrapper-temp">
                        <h3>Température en <span style="background-color: rgb(255, 99, 132); color: white">celsius</span></h3>
                        <div class="temp-container">
                            <canvas id="myChart" height="90">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div id='mapwrapper' style="position: relative;
            height: 47vh;">
                <p>Position géographique : </p>
                <div>
                    <!----- Carte Google Maps à intégrer ---->
                    <div id="map" style="height:40vh;">
                                    
                    </div>
                </div>
                <div style="display:flex;">
                    <div style="margin:5px;" id="json"></div>
                    <div style="margin:5px;"  id="geoJson"></div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <?php include("../php/footer.php")?>
    </footer>
    
</body>
<!--<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7O3kpyDj3zfPxjrTu0CWtexfnmpkrFlA&callback=initMap"></script>-->


<script>
    //  var map = L.map('map').setView([39.74739, -105], 13);
    // 48.86004350462898, 2.2978489601227094
    var map = L.map('map').setView([48.86004350462898, 2.2978489601227094], 15);

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);


    var jsonStructure = {
        "executionTime": "2016-08-30 12:27:40 PM",
        "colis": [{
            "id": 72,
            "positionColisLongitude" : 48.86004350462898, 
            "positionColisAltitude" : 2.2978489601227094
        }]
    };

var json = {
  "executionTime": "2016-08-30 12:27:40 PM",
  "stationBeanList": [{
    "id": 72,
    "stationName": "W 52 St & 11 Ave",
    "availableDocks": 37,
    "totalDocks": 39,
    "latitude": 40.76727216,
    "longitude": -73.99392888,
    "statusValue": "In Service",
    "statusKey": 1,
    "availableBikes": 2,
    "stAddress1": "W 52 St & 11 Ave",
    "stAddress2": "",
    "city": "",
    "postalCode": "",
    "location": "",
    "altitude": "",
    "testStation": false,
    "lastCommunicationTime": "2016-08-30 12:27:28 PM",
    "landMark": ""
  }, {
    "id": 79,
    "stationName": "Franklin St & W Broadway",
    "availableDocks": 1,
    "totalDocks": 33,
    "latitude": 40.71911552,
    "longitude": -74.00666661,
    "statusValue": "In Service",
    "statusKey": 1,
    "availableBikes": 31,
    "stAddress1": "Franklin St & W Broadway",
    "stAddress2": "",
    "city": "",
    "postalCode": "",
    "location": "",
    "altitude": "",
    "testStation": false,
    "lastCommunicationTime": "2016-08-30 12:25:52 PM",
    "landMark": ""
  }]
};
var geojson = {
  type: "FeatureCollection",
  features: [],
};

for (i = 0; i < jsonStructure.colis.length; i++) {
    geojson.features.push({
        "geometry": {
            "type": "Point",
            "coordinates": [jsonStructure.colis[i].positionColisAltitude, jsonStructure.colis[i].positionColisLongitude]
        },
        "type": "Feature",
        "id": i,
            
    });
}

var bicycleRental = {
    "type": "FeatureCollection",
    "features": [
        {
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -104.9998241,
                    39.7471494
                ]
            },
            "type": "Feature",
            "properties": {
                "popupContent": "This is a B-Cycle Station. Come pick up a bike and pay by the hour. What a deal!"
            },
            "id": 51
        },
        {
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -104.9983545,
                    39.7502833
                ]
            },
            "type": "Feature",
            "properties": {
                "popupContent": "This is a B-Cycle Station. Come pick up a bike and pay by the hour. What a deal!"
            },
            "id": 52
        },
        {
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -104.9963919,
                    39.7444271
                ]
            },
            "type": "Feature",
            "properties": {
                "popupContent": "This is a B-Cycle Station. Come pick up a bike and pay by the hour. What a deal!"
            },
            "id": 54
        },
        {
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -104.9960754,
                    39.7498956
                ]
            },
            "type": "Feature",
            "properties": {
                "popupContent": "This is a B-Cycle Station. Come pick up a bike and pay by the hour. What a deal!"
            },
            "id": 55
        },
        {
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -104.9933717,
                    39.7477264
                ]
            },
            "type": "Feature",
            "properties": {
                "popupContent": "This is a B-Cycle Station. Come pick up a bike and pay by the hour. What a deal!"
            },
            "id": 57
        },
        {
            "geometry": {
                "type": "Point",
                "coordinates": [
                    -104.9913392,
                    39.7432392
                ]
            },
            "type": "Feature",
            "properties": {
                "popupContent": "This is a B-Cycle Station. Come pick up a bike and pay by the hour. What a deal!"
            },
            "id": 58
        },
        {
            "geometry": {
                "type": "Point",
                "coordinates": [
                    2.3427223827838906,
                    48.86714336001177
                ]
            },
            "type": "Feature",
            "properties": {
                "popupContent": "This is a B-Cycle Station. Come pick up a bike and pay by the hour. What a deal!"
            },
            "id": 74
        }
    ]
};

var bicycleRentalLayer = L.geoJSON(geojson, {
    style:function(feature){
        return feature.properties && feature.properties.style;
    },

    pointToLayer: function (feature, latlng) {
        // console.log(latlng)
        return L.circleMarker(latlng, {
            radius: 8,
        fillColor: "#ff7800",
        color: "#000",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
        });
    }
}).addTo(map);

/*L.geoJSON(geojsonFeature, {
    pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, geojsonMarkerOptions);
    }
}).addTo(map);*/

/*function onEachFeature(feature, layer) {
		var popupContent = '<p>I started out as a GeoJSON ' +
				feature.geometry.type + ', but now I\'m a Leaflet vector!</p>';

		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		layer.bindPopup(popupContent);
	}*/


/*var bicycleRentalLayer = L.geoJSON([geojsonFeature], {

style: function (feature) {
    return feature.properties && feature.properties.style;
},

onEachFeature: onEachFeature,

pointToLayer: function (feature, latlng) {
    return L.circleMarker(latlng, {
        radius: 8,
        fillColor: '#ff7800',
        color: '#000',
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
    });
}
}).addTo(map);*/


// ANOTHER METHOD I HOPE IT WORKS TT
/*var equipements = geojson; 
var equipements_lyr = L.geoJSON(equipements, {pointToLayer});
var equipements_lyr = L.geoJSON(equipements, {pointToLayer : function (feature, latlng)};

var equipements_lyr = L.geoJSON(equipements, {
    pointToLayer: function (feature, latlng) {
         return L.marker(latlng);
    }
}).addTo(map);*/


</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const temps = [
    '20',
    '-15',
    '-10',
    '-5',
    '0',
    '5',
    '10',
    '15',
    '20',
    
];

// recup donnes températures depuis le json + requete


 // var celsius = [0, 10, 5, 2, 20, 30, 45]; // température fixe}]
// var fahrenheit = [10, 10, 50, 2, 20, 30, 45]; // température fixe}]
console.log("eee"); 
console.log("<?php echo("tototo"); ?>");
console.log(<?php echo ($tempArrayOut[1]) ;?>);
console.log(<?php $tempArrayOut ?>);
console.log(<?php $tempArrayIn ?>);

console.log(<?php  echo json_encode($tempArrayIn); ?>);
var celsius = <?php  echo json_encode($tempArrayIn); ?>;
var fahrenheit = <?php  echo json_encode($tempArrayOut); ?>;

const data = {
    labels: temps,
    datasets: [{
      label: 'Température colis en celsius',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: celsius, // température fixe
    }],
};

const data2 = {
    labels: temps,
    datasets: [
      {
        label: 'In',
        data: celsius,
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgb(255, 99, 132)',
        yAxisID: 'y',
      },
      {
        label: 'Out',
        data: fahrenheit,
        borderColor: 'rgb(005, 99, 132)',
        backgroundColor: 'rgb(005, 99, 132)',
        yAxisID: 'y1',
      }
    ]
  };

// prévoir un bouton farenheight ->  celsius

const config = {
    type: 'line',
    data: data,
    options: {}
};


const config2 = {
    type: 'line',
    data: data2,
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      stacked: false,
      plugins: {
        title: {
          display: true,
          text: 'Suivi température'
        }
      },
      scales: {
        y: {
          type: 'linear',
          display: true,
          position: 'left',
        },
        y1: {
          type: 'linear',
          display: true,
          position: 'right',
  
          // grid line settings
          grid: {
            drawOnChartArea: false, // only want the grid lines for one axis to show up
          },
        },
      }
    },
  };

const myChart = new Chart(
    document.getElementById('myChart'),
    config2
);
</script>
</html>
<!--<script src="../main.js"></script>-->
<!--<script src="conversionjson.js"></script>-->