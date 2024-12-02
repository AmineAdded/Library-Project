<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:AfficherAdmin.php');
    exit();
}
// Inclure la vérification de session
include("verifier_session.php");
include("DBconnect.php");
//requete
$query = $pdo->query('
    select a.nom,a.prenom,a.tel,o.titre,o.frais,e.dateEmp,DATE_ADD(e.dateEmp, INTERVAL 15 DAY) AS dateRetour
    from adherent a,emprunt e,ouvrages o
    where e.id=o.idBook and e.userid=a.idAdherent
');
$query->execute();
$listeEmprunts = $query->fetchAll();


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

//Requette pour assigner le nom et l'image de l'admin
$query2 = $pdo->prepare("SELECT username,picture FROM admin where username=?");
$query2->execute([$_SESSION['username']]);
$result1 = $query2->fetch(PDO::FETCH_ASSOC);

$title = 'Details emprunts';
$template = 'DetailsEmprunt';
include("layout.phtml");
