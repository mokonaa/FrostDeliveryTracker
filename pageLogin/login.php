<?php

    // Connexion de la BDD
    require("../php/connect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../php/head.php")?>
    <title>Connectez-vous</title>
    <link rel="stylesheet" href="./login.css">
</head>

<body>


    <section>
        <div class="form-container">

            <img class="connexion-logo" src="../img/logo.png" alt="logo">
            <form id="connexion-form" method="POST">

                <a class="btn-retour" href="javascript: window.history.go(-1)"><img src="../img/arrow-left-short.svg" width="32" alt="flèche retour"></a>
                    
                <div class="form-title">Connexion</div>
                <div class="connexion-container">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" id="identifiant" autocomplete="off" name="identifiant">
                </div> 
                <div class="connexion-container">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" id="mdp" autocomplete="off" name="motdepasse">
                </div>
                <button type="submit" name="btnConnexion">Se connecter</button>
                <div class="information">
                    <p>Vous n'êtes pas client ?</p>
                    <a href="#">Accéder à nos offres</a>
                </div>
            </div>
        </form>

        </div>
    </section>

    <?php

    // Bouton connexion pressé
    if(isset($_POST['btnConnexion']))
    {

        if(ctype_alnum($_POST['identifiant']))
        {
            // on enregistre la requete qui cherche un compte existant dans la bdd puis l'execute
            $query = "SELECT * FROM `users` WHERE `name`='$_POST[identifiant]' AND `password`='$_POST[motdepasse]'";
            $result = mysqli_query($conn, $query);

            //si on trouve une ligne qui correspond, on démarre une session et "crée" un ID puis redirection
            if(mysqli_num_rows($result)==1)
            {
                session_start();
                print_r($result);
                // $queryEntreprise = "SELECT name FROM compagnies, users WHERE compagnies.id = ";
                // $_SESSION['ENTREPRISE']=$nomEntreprise;
                header("location: ../pageIndex/index.php");
            }
            //sinon on signale que le mdp n'est pas bon
            else
            {
                echo "<script>alert('Mot de passe incorrect.');</script>";
            }
        }
        else
        {
            echo "<script>alert('Merci d'entrer un identifiant composé de lettres et/ou chiffres uniquement.');</script>";
        }
    }
    ?>

</body>

</html>