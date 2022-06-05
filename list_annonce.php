<?php
ob_start();
session_start();
require_once('config/bdd.php');
require_once "lheader.php";

if(isset($_SESSION['id_pro']) AND !empty($_SESSION['id_pro']))
{
    $info_annonce = $bdd->prepare('SELECT * FROM annonce WHERE id_pro = ?');
    $info_annonce->execute(array($_SESSION['id_pro']));
}else{
    header('Location: inscription_pro.php');
}

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel = "stylesheet" href = "style.css">
     <title>Document</title>
 </head>
 <body>
     <div class="nav-pro">
        <h2>Bonjour <?php echo $_SESSION['civilite'] ?><?= ucfirst($_SESSION['nom']); ?></h2>
        <a href="">Vos annonces : </a>   
    </div>

    <div class="info-user">
      <h2>Mes informations :</h2>
      <p>
        Societe : <?= $_SESSION['societe']; ?> <br><br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
       </svg>  38 rue Paul Codaccioni 13007 Marseille <br><br>
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
     </svg> <?= $_SESSION['mail_pro']; ?> <br><br>
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
  </svg> 0618364921 <br><br>
        <p>Donec vitae tortor metus. Aenean vitae ultrices turpis, quis placerat tortor. Sed efficitur facilisis laoreet. Maecenas vestibulum hendrerit viverra. In posuere risus in tincidunt ultrices. Maecenas tempus scelerisque sem quis luctus. Aenean volutpat pharetra erat. Curabitur facilisis nisl eget elementum eleifend. Suspendisse aliquet lacinia varius</p><br>        
        <p><a href="louer.php">Pubier une nouvelle annonce</a> 
      </p>
    </div>

     <?php 
        while($info = $info_annonce->fetch()){
    ?>

    <div class="container-list">
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
            <button id= "annonce">
                <a href="modifier.php?id=<?= $info['id_annonce']; ?>" id="button-pro">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                Modifier</a>
            </button>
            <button id="annonce">
                <a href="supprimer-annonce.php?id=<?= $info['id_annonce']; ?> " id="button-pro">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                Supprimer</a>
            </button>
        </div>
    </div>
    
    <?php
        }
    ?>

 </body>
 </html>


