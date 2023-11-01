<?php
require_once('../Model/Databases.php');
$db = Databases::getInstance();

if (isset($_POST['modif'])) {
    $f = $db->Selectionner($_POST['modif']);
    include '../View/Asset/Form.php';
} elseif (isset($_POST['send'])) {
    $id = $_POST['idmodif'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numeroTelephone = $_POST['numeroTelephone'];
    $db->UpdateClient($id, $nom, $prenom, $numeroTelephone);
    header('location:../View/Asset/admin.php');
}
if (isset($_POST['supp'])) {
    $db->supprimerContact($_POST['supp']);
    header('location:../View/Asset/admin.php');
}

if (isset($_POST['term'])) {
    echo $_POST['term'];
    $db->UpdtaeFavoris($_POST['term']);
    header('location:../View/Asset/ListFav.php');
}
if (isset($_POST['plusterm'])) {
    echo $_POST['plusterm'];
    $db->UpdtaeFavorisD($_POST['plusterm']);
    header('location:../View/Asset/ListFav.php');
}
