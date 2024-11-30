<?php
//session avec 300 secondes = 5 minutes
$tempsMaxInactivite = 300;

if (isset($_SESSION['dernier_acces'])) {
    $tempsInactif = time() - $_SESSION['dernier_acces'];

    if ($tempsInactif > $tempsMaxInactivite) {
        session_unset();
        session_destroy();
        header("Location: AfficherAdmin.php?message=session_expiree");
        exit();
    }
}

$_SESSION['dernier_acces'] = time();
?>