<?php
    include 'DbConnect.php';
    $query = $pdo->prepare('DELETE FROM ouvrages where idBook=?');
    $query->execute([$_GET['idBook']]);

    header('location:DetailsOuvrage.php?idAdmin='.$_GET['idAdmin']);
    exit();
?>