<?php   

    $host = "localhost";
    $user = "root";
    $pass = "";
    $base = "testbdd";

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