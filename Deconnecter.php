<?php 
    session_start();
    session_destroy();

    unset($_SESSION['idAdmin']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['picture']);

    header('location: AfficherAdmin.php');
    exit();
?>