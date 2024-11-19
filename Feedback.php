<?php
    include 'DbConnect.php';
    $query=$pdo->query('select * from feedback');
    $feedbacks=$query->fetchAll();

    $query1 = $pdo->prepare("SELECT COUNT(*) AS total FROM adherent");
    $query1->execute();
    $result=$query1->fetch(PDO::FETCH_ASSOC);

    $query = $pdo->prepare("SELECT COUNT(*) AS total FROM feedback");
    $query->execute();
    $resultFeed=$query->fetch(PDO::FETCH_ASSOC);

    //Requette pour assigner le nom et l'image de l'admin
    $query2=$pdo->prepare("SELECT username,picture FROM admin where idAdmin=?");
    $query2->execute([$_GET['idAdmin']]);
    $result1=$query2->fetch(PDO::FETCH_ASSOC);

    $template="Feedback";
    $title="liste feedback";
    include 'layout.phtml';
?>