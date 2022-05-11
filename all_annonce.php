<?php
session_start();
require_once "config/bdd.php";
require_once "lheader.php";


if(isset($_SESSION['id_membre']) AND !empty($_SESSION['id_membre']))
{

}else{
    header('Location: inscription.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel = "stylesheet" href = "louer.css">
    <title>Document</title>
</head>
<body>
        <div class="menu-annonce">
            <a href="profil.php?id=<?= $_SESSION['id_membre']; ?>">Voir mon panier</a>
        </div>
<?php

$recup_all = $bdd->query('SELECT * FROM annonce INNER JOIN membre_pro ON annonce.id_pro = membre_pro.id_pro');
while($all = $recup_all->fetch()){
    var_dump($all['id_annonce']);
    var_dump($_SESSION['id_membre']);
?>

    <div class="container-list">       
        <form action="profil-ajouter?id=<?= $all['id_annonce']; ?>" method="POST">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/<?= $all['photo']; ?>" height= 200px class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/sal1.jpg" height= 200px class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/kit8.jpg" height= 200px class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

            <h2><?= $all['type']; ?></h2>
            
            <p> 
                Surface : <?= $all['surface']; ?> m²<br>
                Nombre de piece : <?= $all['piece']; ?><br>
                Nombre de chambre : <?= $all['chambre']; ?><br>
                Prix : <?= $all['prix']; ?> €<br>
                Meublé ou vide : <?= $all['meuble']; ?><br>
                Description : <?= $all['description']; ?><br> 
            </p>
            <button id="annonce-list">
                <a href="mailto: <?= $all['mail_pro']; ?>" id="button-contact">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                </svg>
                Contacter l'annonceur</a>
            </button>

                <input type="hidden" name="photo" value="<?= $all['photo']; ?>">
                <input type="hidden" name="type" value="<?= $all['type']; ?>">
                <input type="hidden" name="surface" value="<?= $all['surface']; ?>">
                <input type="hidden" name="piece" value="<?= $all['piece']; ?>">
                <input type="hidden" name="chambre" value="<?= $all['chambre']; ?>">
                <input type="hidden" name="prix" value="<?= $all['prix']; ?>">
                <input type="hidden" name="meuble" value="<?= $all['meuble']; ?>">
                <input type="hidden" name="description" value="<?= $all['description']; ?>">
                <input type="hidden" name="mail" value="<?= $all['mail_pro']; ?>">
           
            <button type="submit" name="basket" id="favori">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                </svg>
            </button>
        </form>
    </div>
<?php
}
?>
  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</body>
</html>