<!doctype html>
<html lang="fr">

    <head>
         <?php include("../php/head.php")?>
         <link rel="stylesheet" href="../css/styleColis.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    </head>
    
<body>
  
    <header>
        <?php include("../php/header.php")?>
    </header>

    <section class="detailsColis">
        <div class="details">
            <h1 id="title">
                Détails de votre colis
            </h1>
            <h3>Vous retrouverez sur cette page toutes les<br> informations concernant votre colis.</h3>
        </div>

        <!--- Détails--->
        <div id='containerInfos'>
            <div class="infos">
                <div class="singleInfo">
                    <p class='subtitle'>Numéro de colis (ID)</p>
                    <p>XXXXXX</p>
                </div>
                <div>
                    <div class="singleInfo">
                        <p class='subtitle'>Plage de température définie</p>
                        <p>XX°C - XX°C</p>
                    </div>
                    <div class="singleInfo">
                        <p class='subtitle'>Suivi du température</p>
                        <div class="wrapper-temp">
                            <h3>Température en celsius</h3>
                            <div class="temp-container">
                                <canvas id="myChart" height="90">
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-temp">
                <p class='subtitle'>Position géographique</p>
                <div id='mapwrapper'>
                        <!----- Carte Google Maps à intégrer ---->
                        <div id="map" style="height:40vh;">
                                        
                        </div>
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


  /*
  geojson.features.push({
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [json.stationBeanList[i].longitude, json.stationBeanList[i].latitude]
    },
    "properties": {
      "id": json.stationBeanList[i].id,
      "stationName": json.stationBeanList[i].stationName,
      "totalDocks": json.stationBeanList[i].totalDocks,
      "station": json.stationBeanList[i].stationName,
      "stAddress1": json.stationBeanList[i].stAddress1,
      "stAddress2": json.stationBeanList[i].stAddress2,
      "city": json.stationBeanList[i].city,
      "postalCode": json.stationBeanList[i].postalCode,
      "testStation": json.stationBeanList[i].testStation
      //"positionColis" : json.stationBeanList[i].positionColis
    }
  });
  */
}

// window.CP.exitedLoop(1);
// document.getElementById('json').innerHTML = JSON.stringify(json, null, 2);
// document.getElementById('geojson').innerHTML = JSON.stringify(geojson, null, 2);
// L.geoJSON(geojsonFeature).addTo(map);

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
        console.log(latlng)
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
</html>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../main.js"></script>
<!--<script src="conversionjson.js"></script>-->