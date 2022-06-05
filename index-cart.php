<?php
require_once('config/bdd.php');
require_once ("lheader.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="selection_annonce.css">
    <title>Document</title>
</head>
    <body>
        <div class="container-index">
            <form action="selection_annonce.php" method="POST">
                <h2>A combien s'élève votre budget ?</h2>
                <div class="input-card" style="margin: auto; display:flex; justify-content:space-around;">
                    <input type="text" placeholder="Marseille" id="input">
                    <input type="number" name="price" placeholder="Prix maximum €" id="input"><br>
                 </div>
                    <div class="search">
                        <input type="submit" id="valider" value="Rechercher" name="rechercher">
                    </div>
            </form>
        </div>   
    </body>
</html>