<?php
require_once "config/bdd.php";
require_once "lheader.php";


if(isset($_POST['envoyer']))
{
$prenom = htmlspecialchars($_POST['prenom']);
$nom = htmlspecialchars($_POST['nom']);
$mail = htmlspecialchars($_POST['mail']);
$mdp = htmlspecialchars($_POST['mdp']);

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']))
    {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            // Je vérifie que l'adresse mail ne se trouve pas déjà dans ma base donnée

            $check = $bdd->prepare('SELECT * FROM membre WHERE mail = ?');
            $check ->execute([$mail]);
            $check_mail = $check->rowCount();

            
            if($check_mail == 0){

                $role = "user";
                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

                //J'insère les données dans la table "membre"

                $insert = $bdd->prepare('INSERT INTO membre( prenom, nom, mail, mdp, role) VALUES (?, ? ,? , ?, ? )');
                $insert ->execute([$prenom, $nom, $mail, $mdp, $role]);

                //J'envoi un message lien pour la connexion lorsque l'inscription est validée
                $message  = "Votre inscirption à bien été enregistrée : <a href = \"connexion.php\">Me connecter</a>";
               

            }else{
                $erreur = "Utilisateur connu";
            }
        }else{
            $erreur = "Veuillez entre une adresse valide";
        }
    }else{
        $erreur = "Veuillez remplir tous les champs";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>

    <div class = "cart-form">
    <h2>Creer votre compte</h2>

        <form action="" method="POST">
            
                        <label for="nom"> Votre nom: </label><br>
                        <input type="text" placeholder="Nom" name="nom" id = "type"><br><br>
                
                        <label for="prénom">Votre prénom: </label><br>
                        <input type="text" placeholder="Prénom" name="prenom" id = "type"><br><br>
                
                        <label for="mail">Votre email : </label><br>
                        <input type="email" placeholder="Email" name="mail" id = "type"><br><br>
                
                        <label for="mdp">Votre mot de passe : </label><br>
                        <input type="password" placeholder="Mot de passe" name="mdp" id = "type"><br><br>
            
                <button type="submit" name="envoyer" align="center">Envoyer</button><br><br>
                <a href="connexion.php">Déjà inscrit ?</a><br><br>


            <?php
            if(isset($erreur)){
                echo '<font color="red"> '.$erreur.'</font>';     
            }
            if(isset($message)){
                echo '<font color="blue"> '.$message.'</font>';     
            }
            ?>

        </form>
        <br>
    </div>
   


</body>
</html>