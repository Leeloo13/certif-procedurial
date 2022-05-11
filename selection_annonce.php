<?php
session_start();
require_once('config/bdd.php');
require_once "lheader.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="selection-annonce.css">
    <title>Document</title>
</head>
<body>             
    <div class="menu-annonce">
        <a href="profil-ajouter.php">Voir mon panier</a>
    </div>
<?php
if(isset($_POST['rechercher'])){

    $price = htmlspecialchars($_POST['price']);
    

    $filter = $bdd->prepare("SELECT * FROM annonce INNER JOIN membre_pro ON annonce.id_pro = membre_pro.id_pro WHERE prix BETWEEN 0 AND $price");
    $filter->execute([$price]);
    while($all = $filter->fetch()){ 
        var_dump($all['id_annonce']);
        ?>

    <div class="container-list">
        <form action="profil-ajouter.php?id=<?= $all['id_annonce']; ?>" method="POST">

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
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
                <h2><?= $all['type']; ?></h2>
                
                <p> 
                    id_pro: <?= $all['id_pro']; ?><br>
                    id_annonce : <?= $all['id_annonce']; ?><br>
                    Surface : <?= $all['surface']; ?> m²<br>
                    Nombre de piece : <?= $all['piece']; ?><br>
                    Nombre de chambre : <?= $all['chambre']; ?><br>
                    Prix : <?= $all['prix']; ?> €<br>
                    Meublé ou vide : <?= $all['meuble']; ?><br>
                    Description : <?= $all['description']; ?><br> 
                    <?= $all['mail_pro']; ?><br> 
                </p>
            
                <button type="submit" name="basket" id="favori">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                    </svg>
                </button>
        </form>
    </div>
<?php
    }
}
?>
</body>
</html>