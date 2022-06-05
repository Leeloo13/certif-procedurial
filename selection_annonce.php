<?php
ob_start();
session_start();
require_once('config/bdd.php');
require_once "lheader.php";

if(isset($_SESSION['id_membre']) AND !empty($_SESSION['id_membre']))
{
    
}else{
    header('Location: connexion.php');
}


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
<div class="nav-pro">
        <h2>Bonjour <?php echo $_SESSION['prenom'] ?><?= ucfirst($_SESSION['nom']); ?></h2>
        <a href="profil-ajouter.php">Voir mon panier</a>
    </div> 
<?php
if(isset($_POST['rechercher'])){

    $price = htmlspecialchars($_POST['price']);
    

    $filter = $bdd->prepare("SELECT * FROM annonce INNER JOIN membre_pro ON annonce.id_pro = membre_pro.id_pro WHERE prix BETWEEN 0 AND $price");
    $filter->execute([$price]);
    while($info = $filter->fetch()){ 
        var_dump($info ['id_annonce']);
        ?>




<div class="container-list">
   <form action="profil-ajouter.php?id=<?= $info['id_annonce']; ?>" method="POST">
                   <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/<?= $info['photo']; ?>" height= 300px class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/sal1.jpg" height= 300px class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/kit3.jpg" height= 300px class="d-block w-100" alt="...">
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
<div class="info">
  <div class="title">
    <h2><?= ucfirst($info['type']); ?></h2>
    <p>Surface : <?= $info['surface']; ?>m²<br></p>
  </div>
        <div class="piece">
          <div class="piece-num">
            <img src="images/icons8-porte-ouverte-39.png" alt=""> 
          <?= $info['piece']; ?></div> 
          <div class="piece-num">
            <img src="images/icons8-lit-39.png" alt="">
           <?= $info['chambre']; ?></div>    
        </div> 
        <div class="prix">
            <h3><?= $info['prix']; ?>€/mois</h3>
        <p> <?= ucfirst($info['meuble']); ?></p>
        </div> 
        <p><?= $info['description']; ?></p>
           
       
            
</div>
        <div class="validation">
          <a href="mailto: <?= $info ['mail_pro']; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
              Contacter l'agence
          </a>
          <button type="submit" name="basket">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
            </svg>
          </button>
        </div>
    </form>
    </div>
<?php
    }
}
?>
</body>
</html>