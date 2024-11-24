<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header('location:AfficherAdmin.php');
    exit();
}

// Inclure la connexion à la base de données
include("DBconnect.php");

// Requête pour compter les adhérents
$query = $pdo->prepare("SELECT COUNT(*) AS total FROM adherent");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

// Requête pour compter les feedbacks
$query = $pdo->prepare("SELECT COUNT(*) AS total FROM feedback");
$query->execute();
$resultFeed = $query->fetch(PDO::FETCH_ASSOC);

//Requete pour les revenus
$query = $pdo->prepare("SELECT sum(frais) AS total from emprunt,ouvrages where emprunt.id = ouvrages.idBook");
$query->execute();
$resultRevenus = $query->fetch(PDO::FETCH_ASSOC);

//requete pour calculer le nombre de livres emprunt
$query = $pdo->prepare("SELECT COUNT(*) AS total FROM emprunt");
$query->execute();
$resultEmp = $query->fetch(PDO::FETCH_ASSOC);

// Requête pour les statistiques
$sql = 'SELECT SUM(quantite) AS quantite,categorie FROM ouvrages GROUP BY categorie';
$statistiques = $pdo->prepare($sql);
$statistiques->execute();
$categorie = [];
$quantite = [];
foreach ($statistiques as $data) {
    $categorie[] = $data['categorie'];
    $quantite[] = $data['quantite'];
}

// Créer un cookie pour 60 secondes
$name = "user";
$value = "Amine";
$expire = time() + 60; // Expire dans 60 secondes
$path = "/";
setcookie($name, $value, $expire, $path);

// Configuration pour le rendu de la page
$title = 'Acceuil';
$template = 'index';
include("layout.phtml");
?>

<script>
    // Fonction pour vérifier si un cookie existe
    function getCookie(name) {
        let cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i].trim();
            if (cookie.startsWith(name + "=")) {
                return cookie.split('=')[1];
            }
        }
        return null;
    }

    // Vérification régulière de l'état du cookie
    setInterval(function() {
        if (!getCookie('user')) {
            // Redirection si le cookie a expiré
            window.location.href = 'AfficherAdmin.php';
        }
    }, 1000); // Vérification toutes les secondes
</script>