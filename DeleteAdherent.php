<?php
<<<<<<< HEAD
    session_start();
=======
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
    include("DBconnect.php");
    $query = $pdo->prepare('DELETE FROM adherent where idAdherent=?');
    $query->execute([$_GET['idAdherent']]);

<<<<<<< HEAD
    header('location: DetailsAdherent.php');
=======
    header('location: DetailsAdherent.php?idAdmin='.$_GET['idAdmin']);
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
    exit();
?>