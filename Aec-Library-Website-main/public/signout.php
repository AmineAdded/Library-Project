<?php
    session_start();
    session_destroy();
    
    unset($_SESSION['idAdherent']);
    unset($_SESSION['nom']);
    unset($_SESSION['prenom']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['tel']);
    unset($_SESSION['picture']);
    header('Location: ../index.phtml');
    exit();

?>