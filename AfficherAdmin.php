<?php
<<<<<<< HEAD
    session_start(); // Activation des sessions
    if(isset($_SESSION['idAdmin'])){//S'il y a une session
        header('location: index.php');
        exit();
    }
=======
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
    //connecter à la base de donnée
    include 'DbConnect.php';
    //la requete avec l'attribut query()
    $query = $pdo->prepare("SELECT * FROM admin");
    $query->execute();

    $admins = $query->fetchAll();
<<<<<<< HEAD
    $title="Affichage Admin";
    include "AfficherAdmin.phtml";
=======
    $template="AfficherAdmin";
    $title="Affichage Admin";
    include "layout.phtml";
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
?>
