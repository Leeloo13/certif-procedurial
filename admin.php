<?php
session_start();
require_once "config/bdd.php";
require_once "lheader.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- selctionner à partir de la session membre_pro le mieu que l'on puisse faire c'est faire une jointure à partir de l'annonce du pro et ensuite faire une jointure avec l'id de l'annonce le plus dur eva être d'avoir les noms du membre  -->
    <?php
    $get_it = $bdd->query('SELECT * FROM ajouter INNER JOIN membre ON ajouter.id_membre = membre.id_membre');
    while($get = $get_it->fetch()){
    ?>
 
    <div class="container">
        <p>
            <?= $get['id_membre']; ?><br>
            Nom : <?= $get['nom']; ?><br>
            Prénom : <?= $get['prenom']; ?><br>
            Mail : <?= $get['mail']; ?><br>
            Annonce : <?= $get['id_annonce']; ?><br>
           
        </p>
    

    <?php
    } 
    ?>
       <?php
    $recup_annonce = $bdd->query('SELECT * FROM ajouter INNER JOIN annonce ON ajouter.id_annonce = annonce.id_annonce');
    while($info = $recup_annonce->fetch()){
    ?>

    Type : <?= $info['type']; ?><br>
    Description : <?= $info['description']; ?>

    <?php
    }
    ?>
    
</body>
</html>