<?php
    include("DBconnect.php");
    $query = $pdo->prepare('DELETE FROM adherent where idAdherent=?');
    $query->execute([$_GET['idAdherent']]);

    header('location: DetailsAdherent.php?idAdmin='.$_GET['idAdmin']);
    exit();
?>