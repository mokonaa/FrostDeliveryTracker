<?php   

    $host = "localhost";
    $user = "sql_ecv_aammara";
    $pass = "WwCpJC9N2Q";
    $base = "base_ecv_aammara";

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
?>