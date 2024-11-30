<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header('location:AfficherAdmin.php');
    exit();
}
// Inclure la vérification de session
include("verifier_session.php");
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

//requête pour les emprunts qui passe la date de retour
$query = $pdo->prepare("SELECT COUNT(*) AS total FROM emprunt WHERE DATE_ADD(dateEmp, INTERVAL 15 DAY) < CURDATE()");
$query->execute();
$resultRetard = $query->fetch(PDO::FETCH_ASSOC);
//le nombre des retards
$totalRetard = $resultRetard['total'];

//requette pour afficher les emprunts qui passe la date de retour
$query = $pdo->query('select id,userid,dateEmp,duree from emprunt
    WHERE 
        DATE_ADD(dateEmp, INTERVAL 15 DAY) < CURDATE()');
$emprunts = $query->fetchAll();

// Configuration pour le rendu de la page
$title = 'Acceuil';
$template = 'index';
include("layout.phtml");
?>