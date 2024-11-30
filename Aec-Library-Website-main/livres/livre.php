<?php
    session_start();
    include "../../DbConnect.php";
    if (!isset($_GET['categorie']) || empty($_GET['categorie'])){
        die('Paramètre "categorie" manquant ou invalide');
    }

    $sql = $pdo->prepare('SELECT * FROM ouvrages WHERE categorie = ?');
    $sql->execute([$_GET['categorie']]);
    $cls = $sql->fetchAll();
    if($cls==false){
        echo"cette categorie est invalide";
        header('Location: index2.php');
        exit;
    }
    else{
        $_SESSION['books'] = $cls;
    }

    include "livre.phtml";
?>
