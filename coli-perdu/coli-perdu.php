<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../php/head.php")?>
    <title>Service client</title>
    <link rel="stylesheet" href="coli-perdu.css">
</head>

<body>
    <header>
        <?php require("../php/header.php") ?>
    </header>

    <section>
        <div class="form-container">
            <form action="" class="coli-perdu-form" method="post" >
                <img src="../img/arrow-left-short.svg" width="32" alt="retour en arrière" id="login-button-return" onclick="window.history.go(-1); return false;">
                    
                <div class="form-title">Mon coli est perdu</div>
                <div class="coli-perdu-container">
                    <label for="numéro">Identifiant</label>
                    <input type="text" id="identifiant" autocomplete="off" required>
                </div> 
                <div class="coli-perdu-container">
                    <label for="numéro">Numéro du coli</label>
                    <input type="text" id="numéro" autocomplete="off" required>
                </div> 
                <div class="coli-perdu-container">
                    <label for="story">Message:</label>
                    <textarea rows="5" cols="30" placeholder="Dites nous en plus..."></textarea>
                </div>
                <button type="submit" id="submit" name="submit">Envoyer</button>
            </form>
            <?php
                if ( isset( $_POST['submit'] ) ) {
                    echo 'votre message a bien été pris en compte';
                }            
            ?>
        </div>
    </section>

    <footer>
        <?php require("../php/footer.php") ?>
    </footer>

</body>

</html>