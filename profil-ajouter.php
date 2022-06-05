<?php
session_start();
require_once('config/bdd.php');
require_once "lheader.php";

if(isset($_SESSION['id_membre']) AND !empty($_SESSION['id_membre']))
{
    
}else{
    header('Location: connexion.php');
}

if(isset($_POST['basket'])){
        
    var_dump($_GET['id']);

    $id_annonce = $_GET['id'];

    $insert_annonce = $bdd->prepare('INSERT INTO ajouter(id_membre, id_annonce) VALUES(?, ?)');       
    $insert_annonce->execute([$_SESSION['id_membre'], $id_annonce]);


    
  }else{

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="selection_annonce.css">
    <title>Document</title>
</head>
<body>

    <h1><?= $_SESSION['id_membre']; ?></h1>
    <div class="nav-pro">
        <h2>Bonjour <?= ucfirst($_SESSION['prenom']); ?> <?= ucfirst($_SESSION['nom']); ?></h2>
                
        <a href="index.php">Voir les annonces</a> | <a href="">Vos annonces : </a>   
    </div>

    <div class="info-user">
      <h2>Mes informations :</h2>
      <p>
        Nom : <?= ucfirst($_SESSION['nom']); ?> <br><br>
        Prénom : <?= ucfirst($_SESSION['prenom']); ?> <br><br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
       </svg>  38 rue Paul Codaccioni 13007 Marseille <br><br>
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
     </svg> <?= $_SESSION['mail']; ?> <br><br>
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
  </svg> 0618364921 <br><br>
        <p>Donec vitae tortor metus. Aenean vitae ultrices turpis, quis placerat tortor. Sed efficitur facilisis laoreet. Maecenas vestibulum hendrerit viverra. In posuere risus in tincidunt ultrices. Maecenas tempus scelerisque sem quis luctus. Aenean volutpat pharetra erat. Curabitur facilisis nisl eget elementum eleifend. Suspendisse aliquet lacinia varius</p><br>
      </p>
    </div>
 
    <?php
    
    $recup_annonce = $bdd->prepare('SELECT * FROM ajouter INNER JOIN annonce ON ajouter.id_annonce = annonce.id_annonce  WHERE id_membre = ?');
    $recup_annonce->execute([$_SESSION['id_membre']]);
    while($info = $recup_annonce->fetch()){var_dump($_SESSION['id_membre']);
    ?>
<div class="container-list">
   <form action="supprimer.php?id=<?= $info['id_annonce']; ?>" method="POST">
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
        <div class="suppression">
          <button type="submit" name="delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
          </button>
        </div>
    </form>
    </div>


    <?php
    }
    ?>

    
</body>
</html>