<?php
    session_start();
    include "../../DbConnect.php";
    if(!isset($_SESSION['nom'])){
        header('Location: ../public/login.php');
        exit;
    }
    else{
        $req_exist =$pdo->prepare('SELECT userid, id from emprunt where userid=? and id=?');
        $req_exist->execute([$_SESSION['idAdherent'],$_GET['idBook']]);
        $cls=$req_exist->fetch();
        if($cls == true){
            echo '<script>alert("Vous avez déja emprunter ce livre ")</script>';
            header('Location: ../index2.php');
            exit;
        }
        else{
            $today=date("y/m/d");
            $req=$pdo->prepare('INSERT INTO emprunt (id,userid,dateEmp) values(?,?,?)');
            $req->execute([$_GET['idBook'],$_SESSION['idAdherent'],$today]);
            $req1=$pdo->prepare('SELECT * from ouvrages where idBook='.$_GET['idBook']);
            $req1->execute();
            $stmt=$req1->fetch();
            header('Location: livre.php?categorie='.$stmt['categorie'].'&modal=true&idBook='.$_GET['idBook']);
            exit();
        }
    }
    include('livre.phtml');

?>