<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:AfficherAdmin.php');
    exit();
}

include("DBconnect.php");
//requete
$query = $pdo->query('
    SELECT 
        nom,
        prenom,
        tel,
        titre,
        frais,
        dateEmp,
        DATE_ADD(dateEmp, INTERVAL 15 DAY) AS dateRetour
    FROM 
        emprunt
    JOIN 
        adherent ON adherent.idAdherent = emprunt.userid
    JOIN 
        ouvrages ON ouvrages.idBook = emprunt.id
');
$emprunts = $query->fetchAll();


$query1 = $pdo->prepare("SELECT COUNT(*) AS total FROM adherent");
$query1->execute();
$result = $query1->fetch(PDO::FETCH_ASSOC);

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

//Requette pour assigner le nom et l'image de l'admin
$query2 = $pdo->prepare("SELECT username,picture FROM admin where username=?");
$query2->execute([$_SESSION['username']]);
$result1 = $query2->fetch(PDO::FETCH_ASSOC);

$title = 'Details emprunts';
$template = 'DetailsEmprunt';
include("layout.phtml");