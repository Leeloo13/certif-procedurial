<?php
session_start();
require_once('config/bdd.php');
require_once( "lheader.php");

if(!isset($_SESSION['id_membre'])){
    header('Location: connexion.php');
}

    if(isset($_POST['ajouter'])){
        
        var_dump($_SESSION['id_membre']);
        header ('Location: all_annonce.php?id='.$_SESSION['id_membre']);

        if(isset($_SESSION['panier'])){
            $session_array_id = array_column($_SESSION['panier'], 'id_annonce');
            var_dump($_SESSION['panier']);

            if(!in_array($_GET['id_annonce'], $session_array_id)){

                
            $session_array = array(
                'id_annonce'=>$_GET['id_annonce'],
                'photo'=>$_POST['photo'],
                'type'=>$_POST['type'],
                'surface'=>$_POST['surface'],
                'piece'=>$_POST['piece'],
                'chambre'=>$_POST['chambre'],
                'prix'=>$_POST['prix'],
                'meuble'=>$_POST['meuble'],
                'description'=>$_POST['description']
            );

            $_SESSION['panier'][]= $session_array;


            }
        }else{

            $session_array = array(
                'id_annonce'=>$_GET['id_annonce'],
                'photo'=>$_POST['photo'],
                'type'=>$_POST['type'],
                'surface'=>$_POST['surface'],
                'piece'=>$_POST['piece'],
                'chambre'=>$_POST['chambre'],
                'prix'=>$_POST['prix'],
                'meuble'=>$_POST['meuble'],
                'description'=>$_POST['description']
            );

            $_SESSION['panier'][]= $session_array;
        }
    }   

    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "louer.css">
        <title>Document</title>
    </head>
    <body>
    <div class="menu-annonce">
            <a href="all_annonce.php?id=<?= $_SESSION['id_membre']; ?>">Retour aux annonces</a>
        </div>
    <?php
        if(!empty($_SESSION['panier'])){
            foreach($_SESSION['panier'] as $key=> $value){          
    ?>
    <div class="container-list">
        <img src="<?= $value['photo'] ;?>" alt="">
        <h2><?= $value['type'] ;?></h2>
            <p>
                <?= $value['type'] ;?><br>
                <?= $value['surface'] ;?> m²<br>
                <?= $value['piece'] ;?><br>
                <?= $value['chambre'] ;?><br>
                <?= $value['prix'] ;?> €<br>
                <?= $value['meuble'] ;?><br>
                <?= $value['description'] ;?><br>
            </p>
        <div class="supprimer">
            <a href="profil.php?action=remove&id=<?= $value['id_annonce']; ?> ">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg>         
            </a>
        </div>
    </div>
    <?php    
        }
    }
    ?>

    <?php
    if(isset($_GET['action'])){

        if(isset($_GET['action']) ==  "remove"){

            foreach($_SESSION['panier'] as $key => $value){

                if($value['id_annonce'] == $_GET['id']){

                    unset($_SESSION['panier'][$key]);
                }
            }
        }
    }
        
    ?>
    </body>
    </html>


