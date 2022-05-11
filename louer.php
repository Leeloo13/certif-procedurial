<?php
session_start();
require_once('config/bdd.php');
require_once "lheader.php";
// var_dump($_SESSION['id_pro']);
// var_dump($_SESSION);

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);

    $pro_verif = $bdd->prepare('SELECT * FROM membre_pro WHERE id_pro = ?');
    $pro_verif->execute([$getid]);
    $info_pro = $pro_verif->fetch();  

}if(isset($_POST['envoyer']))
 {
     $type = htmlspecialchars($_POST['type']);
     $surface = htmlspecialchars($_POST['surface']);
     $piece = htmlspecialchars($_POST['piece']);
     $chambre = htmlspecialchars($_POST['chambre']);
     $meuble = htmlspecialchars($_POST['meuble']);
     $photo = htmlspecialchars($_POST['photo']);
     $description = htmlspecialchars($_POST['description']);
     $prix = htmlspecialchars($_POST['prix']);

     if(!empty($_POST['type']) && !empty($_POST['surface']) && !empty($_POST['piece']) && !empty($_POST['chambre'])  && !empty($_POST['prix'] && !empty($_POST['meuble']) && !empty($_POST['photo']) && !empty($_POST['description'])))
     {
         $insert_annonce = $bdd->prepare('INSERT INTO annonce(id_pro, type, surface, piece, chambre, prix, meuble, photo, description) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
         
         $insert_annonce->execute([$_SESSION['id_pro'], $type, $surface, $piece, $chambre, $prix, $meuble, $photo, $description]);

        //  header("Location: list_annonce.php?id=".$_SESSION['id_pro']);
         $message = "Votre annonce a été enregitré :<br>
         Vous pouvez la modifier ou la supprimer <a href= \"list_annonce.php\">Ici</a>";
         
     }else{
         $erreur = 'Veuillez remplir tous les champs';
     }
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
            <p>Bonjour <?php echo $_SESSION['civilite'] ?> <?= ucfirst($_SESSION['nom']) ?> | <a href="list_annonce.php">Voir toutes vos annonces</a></p>             
        </div>
    <form action="louer.php" method ="POST">

        <div class="container-form-annonce">
            <h1>Mettre un bien en location : </h1>

        <div class="content-line">
            <div class="container-title">   
                <p>Quel type de bien souhaitez-vous louer ?</p>
            </div>
            <div class="container">
                <div class="box">
                    <div class="type">
                    <input type="radio" name = "type" value = "appartement" onclick = "javascript:document.location='#surface';">                     
                        <img src="asset/appartement.png"  alt="" height="100px">
                        <label for="meublé">Appartement</label>
                    </div>               
                    <div class="type2">       
                    <input type="radio" name = "type" value = "maison"  style="transition:.5s;" onclick = "javascript:document.location='#surface';">                        
                        <img src="asset/maison.png"  alt="" height="100px">
                        <label for="maison">Maison</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-line">
            <div class="container-title">
                <p>Quel est la surface de votre bien ?</p> 
            </div>
                <div class="container">
                    <input type="number" id= "number" name = "surface" placeholder = "m²">
                </div>
        </div>

        <div class="content-line">
            <div class="container-title">
                <p>Ajouter des photos :</p>
            </div>
                <div class="container">
                    <input type="file" name = "photo">  
                </div>
        </div>
               
        
        <div class="content-line">
            <div class="container-title">
                <p>Combien y a t-il de pièces ?</p>
            </div>
            <div class="container">
                <input type="number" id= "number" name= "piece" placeholder = "Pièce">
            </div>
        </div>

        <div class="content-line">
            <div class="container-title">
                <p>Combien y a t-il de chambres ?</p>
            </div>
            <div class="container">
                <input type="number" id= "number" name= "chambre" placeholder = "Chambre">      
            </div>
        </div>

        <div class="content-line">
            <div class="container-title">
                <p>Votre bien est-il meublé ou vide ?</p>
            </div>
            <div class="container">
                <div class="meuble">  
                    <div id="meuble">         
                        <input type="radio" name = "meuble" value = "meuble" onclick = "javascript:document.location='#photo';">
                        <label for="meublé">Meublé</label>
                    </div> 
                    <div id="vide">                    
                        <input type="radio" name = "meuble" value = "sans_meuble" onclick = "javascript:document.location='#photo';">
                        <label for="meublé">Vide </label>
                    </div>  
                </div>
            </div>
        </div>

        <div class="content-line">
            <div class="container-title">
                <p>A combien s'élève le loyer ?</p>
            </div>
            <div class="container">
                <input type="number" id= "number" name = "prix" placeholder = "€/mois">
            </div>
        </div>

        <div class="content-line">
            <div class="container-title">
                <p>Décrivez votre bien en quelques mots :</p>
            </div>
            <div class="container">       
                <input type="text" name = "description" id="description">
            </div>
        </div>

        <div class="container-end">
            <div id="container">
                <button class = "btn-valid" name = "envoyer" >Continuez</button>
            </div> 
            <div class="text-answer">
            <?php
            if(isset($erreur)){
                echo '<font style="color:red">'.$erreur.'</font>';
            }
            
            if(isset($message)){
                echo '<font style="color:blue">'.$message.'</font>';
            }
            ?>
            </div>
           
        </div>   

        

        </div>  
    </form>
</body>
</html>


