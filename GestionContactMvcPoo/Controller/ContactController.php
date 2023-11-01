<?php
require_once('../Model/Databases.php');
$db = Databases::getInstance();
if (isset($_POST['envoyer'])) {
    extract($_POST);
    $fav = 'non';
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
    $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
    $numTel = htmlspecialchars($_POST['numero'], ENT_QUOTES);
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['numero'])) {
        if (substr($numTel, 0, 2) == "77" || substr($numTel, 0, 2) == "76" || substr($numTel, 0, 2) == "78" || substr($numTel, 0, 2) == "70") {
            $client = new Client($nom, $prenom, $numTel, $fav);
            $db->ajouterUtilisateur($client);
            header('location:../View/Asset/admin.php');
        }
    } else {
        echo "Down";
    }
}
