<?php

    require('../php/connect.php');

    //On démarre la session (possibilité ensuite d'utiliser $_SESSION)
    // session_start();

    // //S'il n'y pas de SESSION ID, on retourne vers la page de connexion, cela veut dire que personne ne s'est connecté
    // if(!isset($_SESSION['ID']))
    // {
    //     header('location: ../pageConnexion/connexion.php');
    // }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Configuration d'un colis</title>
    <link rel="stylesheet" href="configurationColis.css">
    <?php require("../php/head.php") ?>
</head>

<body>
    <?php require("../php/header.php") ?>
    <div class="form-container">
        <form id="configuration-form" method="POST">
            <div class="form-title">Configuration de colis</div>
            <div class="configuration-container">
                <select name="arduino" id="arduino" required>

                    <?php
                        $numberArd = "SELECT * FROM `arduino` WHERE `install` = 0";
                        $tmp = mysqli_query($conn, $numberArd);
                        $result = mysqli_fetch_all($tmp, MYSQLI_ASSOC);
                        
                        

                        foreach ($result as $key => $value) {
                            echo '<option value="'.$value["mac"].'">'.$value["name"].'</option>';
                        }

                        $conn->close();

                    ?>
                    
                </select>
            </div>
            <div class="configuration-container">
                <label for="tracking-number">Numéro de colis</label>
                <input name="tracking-number" type="text" id="tracking-number" autocomplete=off placeholder="n° de colis" required>
            </div>
            <div class="configuration-container">
                <div class="temperature-title">Plage des températures
                </div>
                <div class="temperature-container">
                    <div class="temperature">
                        <input name="min-temp" type="text" id="min-temp" placeholder="Min." autocomplete=off required>
                    </div>
                    <div class="temperature">
                        <input name="max-temp" type="text" id="max-temp" placeholder="Max." autocomplete=off required>
                    </div>
                </div>
            </div>
            <button type="submit" name="btnConfiguration">Confirmer</button>
        </form>
    </div>
    <?php require("../php/footer.php"); 

    $conn = mysqli_connect($host,$user,$pass,$base);
    // Bouton connexion pressé
    if(isset($_POST['btnConfiguration']))
    {

        // ctype_alnum() alphanumérique
        // is_numeric verifier int ou float

        // vérification du type de champs


        if (ctype_alnum($_POST['tracking-number']) && is_numeric($_POST['min-temp']) && is_numeric($_POST['max-temp'])) {
            $location = "SELECT `domain` FROM `hotspots`";
            $tmp = mysqli_query($conn, $location);
            $result = mysqli_fetch_all($tmp, MYSQLI_ASSOC);
            $locationNum = $result[0]['domain'];

            // $macArd = "SELECT `mac` FROM `arduino` WHERE";
            $installVar = 0;
            $numArdMac = $_POST['arduino'];

            $datePackage = date("Y-m-d");
            echo $datePackage;
            // on enregistre la requete qui cherche un compte existant dans la bdd puis l'execute
            $query = "INSERT INTO packages(mac_ard, num_pkg, temp_min, temp_max, location_address, install, date, trip) VALUES ('".$numArdMac."','".$_POST['tracking-number']."','".$_POST['min-temp']."','".$_POST['max-temp']."','".$locationNum."', '".$installVar."', '".$datePackage."','".$locationNum."')";
            echo $query;
            mysqli_query($conn, $query);
        

            // $numArdMac = $_POST['arduino'];
            // echo $_POST['arduino'];
            
            $query2 = "UPDATE arduino SET install = 1 WHERE mac = '".$numArdMac."'";
            mysqli_query($conn, $query2);

            echo "<script>alert('Le colis a bien été enregistré.');</script>";
            
        }
        else {
            echo "<script>alert('Veuillez vérifier les informations saisies dans le formulaire.');</script>";
        }

        exit();
        








        // // si on trouve une ligne qui correspond, on démarre une session et "crée" un ID puis redirection
        // if($result)
        // {
        //     echo "<script>alert('Colis ajouté.');</script>";
        // }
        // //sinon on signale que le mdp n'est pas bon
        // else
        // {
        //     echo "<script>alert('Colis non ajouté.');</script>";
        // }
    }

    ?>

</body>

</html>