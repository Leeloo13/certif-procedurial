<?php
session_start();
require_once "config/bdd.php";

if(isset($_POST['connexion'])){

    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdp = $_POST['mdp'];

    if(!empty($_POST['mailconnect']) AND !empty($_POST['mdp'])){
        $user_verif = $bdd->prepare('SELECT * FROM membre WHERE mail = ?');
        $user_verif->execute([$mailconnect]);
        $check_user = $user_verif->fetch();

        if($check_user){

            $passwordHash = $check_user['mdp'];

            if( password_verify($mdp, $passwordHash)){


                $_SESSION['role'] = $check_user['role'];
                $_SESSION['id_membre'] = $check_user['id_membre'];
                $_SESSION['nom'] = $check_user['nom'];
                $_SESSION['prenom'] = $check_user['prenom'];
                $_SESSION['mail'] = $check_user['mail'];

                if($check_user['role'] == 'user'){

                    header ('Location: index.php?id='.$_SESSION['id_membre']);

                }elseif($check_user['role'] == 'admin'){

                    header ('Location: admin.php?id='.$_SESSION['id_membre']);

                }

            }else{
                echo "PB mdp";
            }         
               
        }else{
            $erreur = "Identifiant incorrect<a href = \"inscription.php\"> Inscrivez-vous</a>";
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
    <title>Connexion</title>
</head>
<body>
   
    <div class = "cart-form">
        <h2>Connexion</h2>

            <form action="" method="POST">
            
                                <label for="mail">Votre email : </label><br>
                                <input type="email" placeholder="Email" name="mailconnect" id = "type"><br><br>
                        
                                <label for="mdp">Votre mot de passe : </label><br>
                                <input type="password" placeholder="Mot de passe" name="mdp" id = "type"><br><br>
                

                <button type="submit" name="connexion" align="center">Connexion</button><br><br>

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