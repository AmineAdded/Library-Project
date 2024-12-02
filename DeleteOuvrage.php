<?php
<<<<<<< HEAD
    session_start();
=======
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
    include 'DbConnect.php';
    $query = $pdo->prepare('DELETE FROM ouvrages where idBook=?');
    $query->execute([$_GET['idBook']]);

<<<<<<< HEAD
    header('location:DetailsOuvrage.php');
=======
    header('location:DetailsOuvrage.php?idAdmin='.$_GET['idAdmin']);
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
    exit();
?>