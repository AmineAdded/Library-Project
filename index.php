<?php 
    include("DBconnect.php");
    //Requette pour compter les adhérents
    $query = $pdo->prepare("SELECT COUNT(*) AS total FROM adherent");
    $query->execute();
    $result=$query->fetch(PDO::FETCH_ASSOC);

    $query = $pdo->prepare("SELECT COUNT(*) AS total FROM feedback");
    $query->execute();
    $resultFeed=$query->fetch(PDO::FETCH_ASSOC);

    //Requette pour assigner le nom et l'image de l'admin
    $query1=$pdo->prepare("SELECT username,picture FROM admin where idAdmin=?");
    $query1->execute([$_GET['idAdmin']]);
    $result1=$query1->fetch(PDO::FETCH_ASSOC);

    $title='Acceuil';
    $template='index';
    include("layout.phtml");
?>