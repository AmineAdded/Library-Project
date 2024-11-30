<?php
    session_start();


    include "../../DbConnect.php";

    if (isset($_POST['send_feedback'])) {
        if(!isset($_SESSION['idAdherent'])){
            header('Location: login.php');
            exit;
        }
        extract($_POST);

        $req1 = $pdo->prepare('INSERT INTO feedback (username,commentaire,id_ad) VALUES (:nom, :message, :id_ad)');
        $req1->bindValue(':nom', $nom);
        $req1->bindValue(':message', $message);
        $req1->bindValue(':id_ad', $_SESSION['idAdherent']);
        $req1->execute();
        header('Location: ../index2.php');
        exit();

        // if (!empty($errors)) {
        //     $_SESSION['errors'] = $errors;
        //     header('Location: ' . $_SERVER['PHP_SELF']);
        //     exit(); 
        // }
    }
    include '../index2.phtml';
?>
