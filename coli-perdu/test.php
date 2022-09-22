<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="test.php" method="post">
        Nom :     <input type="text" name="nom" />
        Age :     <input type="text" name="age" />
        Adresse : <input type="text" name="adresse" />
        <input type="submit" name="submit" /> 
    </form>

    <?php
   // Vérifier si le formulaire est soumis 
   if ( isset( $_POST['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $nom = $_POST['nom']; 
     $age = $_POST['age']; 
     $adresse = $_POST['adresse'];
     // afficher le résultat
     echo '<h3>Informations récupérées en utilisant POST</h3>'; 
     echo 'Nom : ' . $nom . ' Age : ' . $age . ' Adresse : ' . $adresse; 
     exit;
    }
?>

</body>
</html>