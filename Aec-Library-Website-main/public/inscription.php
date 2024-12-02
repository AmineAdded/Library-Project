<?php
session_start();
$errors = []; // Initialiser comme tableau

if (isset($_SESSION['nom'])) { // Si une session est active
    header('Location: ../index2.php');
    exit();
}

include "../../DbConnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Vérifie si un formulaire a été soumis
    extract($_POST);

    // // Valider les champs
    // if (empty($nom)) {
    //     $errors[] = "Le champ 'Nom' est requis.";
    // }
    // if (empty($prenom)) {
    //     $errors[] = "Le champ 'Prénom' est requis.";
    // }
    // if (empty($email)) {
    //     $errors[] = "Le champ 'Email' est requis.";
    // }
    // if (empty($password)) {
    //     $errors[] = "Le champ 'Mot de passe' est requis.";
    // }
    // if (empty($tel)) {
    //     $errors[] = "Le champ 'Téléphone' est requis.";
    // }
    // if (empty($_FILES['file']['name'])) { // Vérifie si un fichier a été uploadé
    //     $errors[] = "Le fichier est requis.";
    // }

    // Vérifier si l'email existe déjà
    if (empty($errors)) {
        $req = $pdo->prepare('SELECT * FROM adherent WHERE email = ?');
        $req->execute([$email]);
        $cls = $req->fetch();
        if ($cls) {
            $errors[] = "L'email existe déjà.";
        }
    }

    // Si aucune erreur, insérer l'utilisateur
    if (empty($errors)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $filePath = basename($_FILES['file']['name']); // Définir un chemin pour le fichier
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

        $sql = $pdo->prepare("INSERT INTO adherent (nom, prenom, email, tel, password, picture) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute([$nom, $prenom, $email, $tel, $pass, $filePath]);
        header('Location: login.php');
        exit();
    }
}
    include "inscription.phtml";


?>