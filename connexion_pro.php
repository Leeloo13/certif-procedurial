<?php
session_start();
require_once('config/bdd.php');

if(isset($_POST['connexion_pro']))
{
    $mdp_pro_connect = sha1($_POST['mdp_pro_connect']);
    $mail_pro_connect = htmlspecialchars($_POST['mail_pro_connect']);  
    
    if(!empty ($_POST['mail_pro_connect']) && !empty($_POST['mdp_pro_connect']))
    {
        $pro_verif = $bdd->prepare('SELECT * FROM membre_pro WHERE mail_pro = ? AND mdp_pro= ?');
        $pro_verif->execute([$mail_pro_connect, $mdp_pro_connect]);
        $check_pro = $pro_verif->rowCount();
        var_dump($check_pro);

        if($check_pro)
        {
            $info_pro = $pro_verif->fetch();
            $_SESSION['id_pro'] = $info_pro['id_pro'];
            $_SESSION['nom'] = $info_pro['nom'];
            $_SESSION['mail_pro'] = $info_pro['mail_pro'];
            $_SESSION['civilite'] = $info_pro['civilite'];
            $_SESSION['siren'] = $info_pro['siren'];
            $_SESSION['societe'] = $info_pro['societe'];

            header ("Location: louer.php?id=".$_SESSION['id_pro']);

        }else{
            $erreur = "Identifiant incorrect";
        }
    }else{
        $erreur = "Veuillez remplir tous les champs";
    }

 
}


$pro_verif = $bdd->prepare('SELECT')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription_pro.css">
    <title>Document</title>
</head>
<body>
    <h1>Connexion : </h1>
    <div class="formulaire">
        <form action="" method = "POST">
            <input type="hidden" name = "getId_pro" >
            <label for="email">Email :</label>
                <br>
            <input type="email" name = "mail_pro_connect"> 
                <br><br>


            <label for="mot de passse">Mot de passe :</label>
                <br>
            <input type="password" name = "mdp_pro_connect">
                <br><br>

            <button type = "submit" name = 'connexion_pro'>Me connecter</button>
            <br><br>
        <?php
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur.'</font>';
        }
        ?>
        <br><br>
        </form>     
    </div>
    
</body>
</html>