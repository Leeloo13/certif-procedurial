<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ras_2', 'root', '');
}catch(PDOException $e){
    echo "$erreur:" .$e->getMessage();
}
?>