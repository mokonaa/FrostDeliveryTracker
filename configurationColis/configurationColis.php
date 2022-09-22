<?php

    require('../php/connect.php');

    //On démarre la session (possibilité ensuite d'utiliser $_SESSION)
    session_start();

    //S'il n'y pas de SESSION ID, on retourne vers la page de connexion, cela veut dire que personne ne s'est connecté
    if(!isset($_SESSION['ID']))
    {
        header('location: ../pageLogin/login.php');
    }

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
                    <option value="Arduino">Arduino</option>
                </select>
            </div>
            <div class="configuration-container">
                <label for="tracking-number">Numéro de colis</label>
                <input name="tracking-number" type="text" id="tracking-number" autocomplete=off required>
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

    // Bouton connexion pressé
    if(isset($_POST['btnConfiguration']))
    {

        // ctype_alnum() alphanumérique
        // is_numeric verifier int ou float

        // vérification du type de champs


        if (ctype_alnum($_POST['tracking-number']) && is_numeric($_POST['min-temp']) && is_numeric($_POST['max-temp']) && ctype_alnum($_POST['depart']) && ctype_alnum($_POST['expediteur'])) {
            
            // on enregistre la requete qui cherche un compte existant dans la bdd puis l'execute
            $query = "INSERT INTO config_colis(device, tracking_number, temp_min, temp_max, expediteur) VALUES ('".$_POST["arduino"]."','".$_POST['tracking-number']."','".$_POST['min-temp']."','".$_POST['max-temp']."','".$_POST['expediteur']."')";
            mysqli_query($conn, $query);

            echo "<script>alert('Le colis a bien été enregistré.');</script>";
            
        }
        else {
            echo "<script>alert('Veuillez vérifier les informations saisies dans le formulaire.');</script>";
        }
        








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