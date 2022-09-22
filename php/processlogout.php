<?php
session_start();
$_SESSION = array();
session_destroy();
header('refresh:3; URL="../pageIndex/index.php"');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../php/head.php")?>
    <title>Frost Delivery Tracker</title>
    <link rel="stylesheet" href="accueil.css">
</head>

<body>
    <section>

        <p>Vous vous êtes déconnecté avec succès.</p>
    
    </section>
</body>

</html>