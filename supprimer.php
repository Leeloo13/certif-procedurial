<?php
session_start();
require_once('config/bdd.php');
var_dump($_SESSION['id_pro']);

if(isset($_GET['id']) && !empty($_GET['id']))
{
    $get_id = ($_GET['id']);

    $get_data = $bdd->prepare('SELECT * FROM annonce WHERE id_annonce');
    $get_data->execute([$get_id]);
    $delete = $get_data->rowCount();

    if($delete)
    {
        $delete = $bdd->prepare('DELETE FROM annonce WHERE id_annonce = ?');
        $delete->execute([$get_id]);

        header('Location: profil-ajouter.php?id='.$_SESSION['id_pro']);
        
    }else{
        echo "Cette annonce n'existe pas";
    }
}else{
    echo "Aucun identifiant trouvé";
}