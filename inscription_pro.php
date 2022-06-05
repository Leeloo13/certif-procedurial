<?php
require_once('config/bdd.php');

if(isset($_POST['creer']))
{
    $civilite = htmlspecialchars($_POST['civilite']);
    $nom = htmlspecialchars($_POST['nom']);
    $siren = htmlspecialchars($_POST['siren']);
    $societe = htmlspecialchars($_POST['societe']);
    $mail_pro = htmlspecialchars($_POST['mail_pro']);
    $mdp_pro = sha1($_POST['mdp_pro']);

    if(!empty($_POST['civilite']) && !empty($_POST['nom']) && !empty($_POST['siren']) && !empty($_POST['societe']) && !empty($_POST['mail_pro']) && !empty($_POST['mdp_pro']))
    {

        $insert_annonce = $bdd->prepare('INSERT INTO membre_pro( civilite, nom, siren, societe, mail_pro, mdp_pro) VALUES (?, ?, ?, ?, ?, ?)');
        $insert_annonce->execute([$civilite, $nom, $siren, $societe, $mail_pro, $mdp_pro]);

        $message = "Votre compte a bien été créer ";
 

    }else{
        $erreur = "Veuillez remplir tous les champs, s'il vous plait!";
    }
}
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
    <h1>Première fois ici ? Créez un compte</h1>
        <div class="formulaire">
                <form action=""  method ="POST">
                    <label for="civilité">Civilité : </label>
                    <br>
                    <select name = "civilite" >
                    <option value=""> Non renseigné </option>
                    <option value="Mme">Mme</option>
                    <option value="M.">M.</option>
                    </select>
                    <br><br>

                    <label for="nom">Nom : </label>
                    <br>
                    <input type="text" name = "nom">
                    <br><br>

                    <label for="siren">SIREN :</label>
                    <br>
                    <input type="number" name = "siren">
                    <br><br>

                    <label for="raison sociale">Raison sociale :</label>
                    <br>
                    <input type="text" name = "societe">
                    <br><br>

                    <label for="email">Email :</label>
                    <br>
                    <input type="email" name = "mail_pro"> 
                    <br><br>


                    <label for="mot de passse">Mot de passe :</label>
                    <br>
                    <input type="password" name = "mdp_pro">
                    <br><br>

                    <button type = "submit" name = 'creer'>Créer mon compte</button>
                            
                    <p>Vous êtes déjà inscrit ? 
                        <a href="connexion_pro.php"> Connectez-vous </a>
                    </p>
                    <br>

    <?php
    if(isset($erreur)){
        echo '<font style="color:red">'.$erreur.'</font>';
    }
    
    if(isset($message)){
        echo '<font style="color:blue">'.$message.'</font>';
    }
    ?>
    <br><br>   
                </form>
            <br>   
        </div>
</body>
</html>