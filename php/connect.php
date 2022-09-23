<?php   

    $host = "192.168.117.77:8889";
    $user = "rilbo";
    $pass = "gX[fq!hPcaxgYlSw";
    $base = "FDT";

    $conn = mysqli_connect($host,$user,$pass,$base);

    // Détection d'erreur bdd
    if(mysqli_connect_error())
    {
        echo "<script>alert('Non connecté à la BDD.');</script>";
    }
    // else
    // {
    //     echo "Connecté à la BDD";
    // }
?>