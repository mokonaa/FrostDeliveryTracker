<?php

    require('../php/connect.php');

    //On démarre la session (possibilité ensuite d'utiliser $_SESSION)
    // session_start();

    //S'il n'y pas de SESSION ID, on retourne vers la page de connexion, cela veut dire que personne ne s'est connecté
    /*if(!isset($_SESSION['ID']))
    {
        header('location: ../pageConnexion/connexion.php');
    }*/

?>

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


        <?php 
            //TODO mettre les identifiants propre à l'hébergement 
            /*$servername = 'localhost';
            $username = 'root';
            $password = 'root';
            $dbname = "frost"; */
            $userInfos = [];
            $tempArrayIn = [];
            $tempArrayOut = [];
            $tempInfos = []; 
            $DateArray=[];
            $tempPositionColis = []; 

        

            // Détection d'erreur bdd
            if(mysqli_connect_error())
            {
                echo "<script>alert('Non connecté à la BDD.');</script>";
            }

            // Create connection
            /*$conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
            }*/
            $id = $_POST['numeroColisInput']; 
            // requête pour aller chercher les données du colis
            $sql = "SELECT * FROM Packages WHERE num_pkg = '$id'";
            echo $sql; 
            //$result = $conn->query($sql);
             $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    //var_dump($row);
                    // echo "id: " . $row["id"]."<br>";
                    array_push($userInfos, $row);
                    // var_dump($row);
                    if (isset($row["data"])) {
                          // var_dump($row["data"]);
                          $testData = json_decode($row["data"]);
                          /*echo "<br> <br>";
                          var_dump($testData[1]);
                          echo "<br> IN <br>";
                          echo($testData[0]->{'tempIn'});*/ 


                         // var_dump(json_decode($row["data"], true));

                         //echo(substr($row["data"], 0, 65)); 
                         $jObj = json_decode(substr($row["data"], 0, 65));
                         // var_dump($jObj);

                         $j = 0; 
                         $chaineADecoder = ""; 
                         // echo "<br> SUBTRING <br>";
                         // boucle pour chercher les temps in et out 
                        //  for ($i=0; $i<10; $i++) {
                        //     // echo "j value ".$j."<br>";
                        //     $chaineADecoder = substr($row["data"], $j, 65); 
                        //     // echo $chaineADecoder;
                        //     $chaineADecoderObject = json_decode($chaineADecoder);
                        //     // var_dump($chaineADecoderObject);
                        //     $j += 66;
                        //     array_push($tempArrayIn, $chaineADecoderObject->{'tempIn'});
                        //     array_push($tempArrayOut, $chaineADecoderObject->{'tempOut'});
                        //  }


                        for ($i=0; $i<count($testData); $i++) {
                            // echo "j value ".$j."<br>";
                            // $chaineADecoder = substr($row["data"], $j, 65); 
                            // echo $chaineADecoder;
                            // $chaineADecoderObject = json_decode($chaineADecoder);
                            // var_dump($chaineADecoderObject);
                            // $j += 66;
                            //array_push($tempArrayIn, $chaineADecoderObject->{'tempIn'});
                            // array_push($tempArrayOut, $chaineADecoderObject->{'tempOut'});
                            // var_dump($testData[$i]);
                            /*echo ($testData[$i]->{'tempIn'});
                            echo "<br> hhhhhhhhhhh";*/
                            array_push($tempArrayIn, $testData[$i]->{'tempIn'});
                            array_push($tempArrayOut, $testData[$i]->{'tempOut'});
                            array_push($DateArray, $testData[$i]->{'date'});
                         }
                         //var_dump($jObj);
                         //echo "balbalbalblaalblaa totototo";
                        // echo $jObj->{'tempIn'}; 
                          //  echo 'OUT';
                        // echo $jObj->{'tempOut'}; 

                        
                         array_push($tempInfos, $row["data"]);
                    
                    }
                }
            } else {
                echo "0 results";
            }
            //$conn->close();
            //var_dump($DateArray);
            /*echo "<br> RESULTS ARRAY IN <br>"; 
            var_dump($tempArrayIn);
            echo "<br> <br> RESULTS ARRAY OUT <br>"; 
            var_dump($tempArrayOut);*/




            // Create connection
            // $conn2 = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            /*if ($conn2->connect_error) {
                // die("Connection failed: " . $conn->connect_error);
            }*/

            // requête pour aller chercher les données du colis
            $sqlPosition = "SELECT * FROM Hotspots;"; 
            $resultPosition = mysqli_query($conn,$sqlPosition);

            if ($resultPosition->num_rows > 0) {
            // output data of each row
            while($row = $resultPosition->fetch_assoc()) {
                //var_dump($row);
                //echo "id: " . $row["id"]."<br>";
                array_push($tempPositionColis, $row['longi']);
                array_push($tempPositionColis, $row['lattti']);
            
            }
            } else {
                echo "0 results";
            }

            // var_dump($tempPositionColis);
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
            <div class="details">
                <h1 id="title">
                    Détails de votre colis
                </h1>
                <h3>Vous retrouverez sur cette page toutes les <br>informations concernant votre colis.</h3>
            </div>

            <!--- Détails--->
            <div id='containerInfos'>
                <div class="infos">
                    <div class="singleInfo">
                        <p class='subtitle'>Numéro de colis (ID) </p>
                        <p><?php echo $userInfos[0]['id'] ?></p>
                    </div>
                    <div>
                        <div class="singleInfo">
                            <p class='subtitle'>Plage de température définie</p>
                            <p>De <?php echo $userInfos[0]['temp_min'] ?> °C à <?php echo $userInfos[0]['temp_max'] ?> °C</p>
                        </div>
                        <div class="singleInfo">
                            <p class='subtitle'>Suivi du température : </p>
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


<script>
    var map = L.map('map').setView([48.86004350462898, 2.2978489601227094], 11);
    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);


    var geojson = {
        type: "FeatureCollection",
        features: [],
    }; 

    var positionColis = <?php  echo json_encode($tempPositionColis); ?>;
    var jsonStructure = {
        "executionTime": "2016-08-30 12:27:40 PM",
        "colis": [{
            "id": 72,
            "positionColisLongitude" : positionColis[0], // 48.86004350462898  
            "positionColisAltitude" : positionColis[1] // 2.2978489601227094
        }]
    };

    // conversion json to geoJson
    for (i = 0; i < jsonStructure.colis.length; i++) {
        geojson.features.push({
            "geometry": {
                "type": "Point",
                "coordinates": [jsonStructure.colis[i].positionColisLongitude, jsonStructure.colis[i].positionColisAltitude]
            },
            "type": "Feature",
            "id": i,
                
        });
    }

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


    /*var bicycleRental = {
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
    };*/


    /*
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
   */
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    var dates = <?php  echo json_encode($DateArray); ?>;
    // console.log(dates);

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

    // var celsius = [0, 10, 5, 2, 20, 30, 45]; // température fixe}]
    // var fahrenheit = [10, 10, 50, 2, 20, 30, 45]; // température fixe}]
    var celsius = <?php  echo json_encode($tempArrayIn); ?>;
    var fahrenheit = <?php  echo json_encode($tempArrayOut); ?>;
    //var tempGlobalInfos = <?php  echo json_encode($tempInfos); ?>; // OJECT !
    var minmax = <?php  echo json_encode($userInfos); ?>;
    console.log(minmax);
    //console.log(tempGlobalInfos[0]);
    //console.log(arraytempGlobalInfos[0][0]);
    //var tempGlobalInfosParsed = JSON.parse(arraytempGlobalInfos);
    
    //console.Log(JSON.parse(tempGlobalInfos[0]));
    //console.log(celsius);
    //console.log(typeof tempGlobalInfos);
    //onsole.log(tempGlobalInfosParsed);

    const data = {
        labels: dates,
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
        }/*,
        {
            label: 'Temp Min & Max',
            data: minmax,
            borderColor: 'rgb(005, 99, 132)',
            backgroundColor: 'rgb(005, 99, 132)',
            yAxisID: 'y1',
        }*/
        ]
    };

    const config = {
        type: 'line',
        data: data,
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
        config
    );
</script>
</html>
<!--<script src="../main.js"></script>-->
