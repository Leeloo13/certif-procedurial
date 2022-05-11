<?php
session_start();
require_once('config/bdd.php');
require_once "lheader.php";

if(!isset($_SESSION['id_membre']))
{
    header('Location: connexion.php');
}

if(isset($_POST['basket'])){
        
    var_dump($_GET['id']);

    $id_annonce = $_GET['id'];

    $insert_annonce = $bdd->prepare('INSERT INTO ajouter(id_membre, id_annonce) VALUES(?, ?)');       
    $insert_annonce->execute([$_SESSION['id_membre'], $id_annonce]);


    
}else{
    echo "???";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <h1><?= $_SESSION['id_membre']; ?></h1>
 
    <?php
    
    $recup_annonce = $bdd->prepare('SELECT * FROM ajouter INNER JOIN annonce ON ajouter.id_annonce = annonce.id_annonce  WHERE id_membre = ?');
    $recup_annonce->execute([$_SESSION['id_membre']]);
    while($info = $recup_annonce->fetch()){var_dump($_SESSION['id_membre']);
    ?>
    <div class="container-list">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/<?= $info['photo']; ?>" height= 200px class="d-block w-100" alt="...">
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
            <h2><?= ucfirst($info['type']); ?></h2>
                <p>
                    Surface : <?= $info['surface']; ?>m²<br>
                    Nombre de pièces : <?= $info['piece']; ?><br>
                    Nombre de chambres :<?= $info['chambre']; ?><br>
                    Prix : <?= $info['prix']; ?>€<br><br>
                    Meublé ou vide : <?= ucfirst($info['meuble']); ?><br>
                    Description : <?= $info['description']; ?><br>
                    <h2> <?= $info['id_pro']; ?></h2>
                    <h2> <?= $info['id_annonce']; ?></h2>
                </p>           
        </div>
    <?php
    }
    $info_pro = $bdd->prepare("SELECT * FROM annonce INNER JOIN membre_pro ON annonce.id_pro = membre_pro.id_pro WHERE id_pro = ?");
    $info_pro->execute([$info['id_pro']]);
    while($i_f = $info_pro->fetch()){
    ?>

    <p><?= $i_f['mail_pro']; ?></p>

    <?php
    }
    ?>

    
</body>
</html>