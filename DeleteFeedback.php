<?php
    include 'DbConnect.php';
    $query = $pdo->prepare('DELETE FROM feedback where id=?');
    $query->execute([$_GET['id']]);

    header('location:Feedback.php?idAdmin='.$_GET['idAdmin']);
    exit();
?>