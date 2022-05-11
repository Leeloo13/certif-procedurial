<?php
session_start();
require_once('config/bdd.php');

if(isset($_GET['id']) && !empty($_GET['id']))
{
    $get_id = $_GET['id'];
    $get_annonce = $bdd->prepare('SELECT * FROM annonce WHERE id_annonce = ?');
    $get_annonce->execute(array($get_id));

    $check_annonce = $get_annonce->rowCount();

    if($check_annonce)
    {
        var_dump($_GET['id']);
        $data_annonce = $get_annonce->fetch();
        $type = $data_annonce['type'];
        $surface = $data_annonce['surface'];
        $piece = $data_annonce['piece'];
        $chambre = $data_annonce['chambre'];
        $prix = $data_annonce['prix'];
        $meuble = $data_annonce['meuble'];
        $photo = $data_annonce['photo'];
        $description = $data_annonce['description'];

        if(isset($_POST['valider']))
        {
            $change_type = htmlspecialchars($_POST['type']);
            $change_prix = htmlspecialchars($_POST['prix']);
            $change_surface = htmlspecialchars($_POST['surface']);
            $change_piece = htmlspecialchars($_POST['piece']);
            $change_chambre = htmlspecialchars($_POST['chambre']);
            $change_meuble = htmlspecialchars($_POST['meuble']);
            $change_photo = htmlspecialchars($_POST['photo']);
            $change_photo = htmlspecialchars($_POST['description']);

            if(!empty($_POST['type']) && !empty($_POST['surface']) && !empty($_POST['piece']) && !empty($_POST['chambre'])  && !empty($_POST['prix'] && !empty($_POST['meuble']) && !empty($_POST['photo']) && !empty($_POST['description'])))
            {
                $update_annonce = $bdd->prepare('UPDATE annonce SET type = ?, prix = ?, surface = ?, piece = ?, chambre = ?, meuble = ?, photo = ?, description = ? WHERE id_annonce = ?');
                $update_annonce->execute([$change_type, $change_prix, $change_surface, $change_piece, $change_chambre, $change_meuble, $change_photo, $change_photo, $get_id]);

                header('Location: list_annonce.php?id='.$_SESSION['id_pro']);
            }
            }else{
                $erreur = 'Veuillez remplir tous les champs';
            }
        }else{
            $erreur = "Annonce non répertoriée";
        }
    }else{
        $erreur = "Cet identifiant n'existe pas";
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
            <p>Bonjour <?php echo $_SESSION['civilite'] ?> <?= ucfirst($_SESSION['nom']) ?> | <a href="list_annonce.php">Retourner vers mes annonces</a> | Modifiez votre annonce : </p>
        </div>  <?php var_dump($_SESSION['id_pro']); ?>
    <form action="" method ="POST">

        <div class="container-form-annonce">
            <div id="container">   
                <h3>Quel type de bien souhaitez-vous louer ?</h3>
                <div class="type" >
                    <input type="radio" name = "type" value = "appartement" id = "type" onclick = "javascript:document.location='#surface';">
                        <label for="meublé">Appartement</label><br>
                        <img src="asset/appartement.png"  alt="" height="100px">               
                    </input>             
                    <input type="radio" name = "type" value = "maison" id = "type" style="transition:.5s;" onclick = "javascript:document.location='#surface';" >
                        <label for="maison">Maison</label><br>
                        <img src="asset/maison.png"  alt="" height="100px">
                    </input>
                </div>
            </div>    

        <div id="container">
            <h3>Quel est la surface de votre bien ?</h3>
                <input type="number" id= "number" name = "surface" placeholder = "m²" value="<?= $data_annonce['surface'];?>"> 
            <h3>Ajouter des photos :</h3>
                <input type="file" name = "photo" value="<?= $data_annonce['photo'];?>">
        </div>
                
        <div id="container">
            <h3>Combien y a t-il de pièces : </h3>
                <input type="number" id= "number" name= "piece" placeholder = "Nombre de pièce" value="<?= $data_annonce['piece'];?>">
            <h3>Combien y a t-il de chambre:</h3>
                <input type="number" id= "number" name= "chambre" placeholder = "Nombre de chambre" value="<?= $data_annonce['chambre'];?>">
        </div>

        <div id="container">
            <h3>Votre bien est :</h3>
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
            <h3>A combien s'élève le loyer : </h3>       
                <input type="number" id= "number" name = "prix" placeholder = "€/mois" value="<?= $data_annonce['prix'];?>">
        </div>

        <div id="container">
            <h3>Décrivez votre bien en quelques mots :</h3>
                <input type="text" name = "description" id="description" value="<?= $data_annonce['description'];?>">    
        </div>

        <div id="container">
            <button class = "btn-valid" name = "valider" >Continuez</button>
            
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
    </form>
</body>
</html>


