<?php
    session_start();
    include 'DbConnect.php';
    $query = $pdo->prepare('DELETE FROM ouvrages where idBook=?');
    $query->execute([$_GET['idBook']]);

    header('location:DetailsOuvrage.php');
    exit();
?>