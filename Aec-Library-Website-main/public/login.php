<?php
session_start();
$errors = [];

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

include "../../DbConnect.php";

if (isset($_POST['submit'])) {
    extract($_POST);

    $req = $pdo->prepare('SELECT * FROM adherent WHERE email = :email');
    $req->bindValue(':email', $email);
    $req->execute();
    $cls_id = $req->fetch();

    if ($cls_id == false || !password_verify($password, $cls_id['password'])) {
        if (!in_array("Email ou mot de passe incorrect.", $errors)) {
            $errors[] = "Email ou mot de passe incorrect.";
        }
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $_SESSION['idAdherent'] = $cls_id['idAdherent'];
        $_SESSION['nom'] = $cls_id['nom'];
        $_SESSION['prenom'] = $cls_id['prenom'];
        $_SESSION['email'] = $cls_id['email'];
        $_SESSION['password'] = $cls_id['password'];
        $_SESSION['tel'] = $cls_id['tel'];
        $_SESSION['picture'] = $cls_id['picture'];
        header('Location: ../index2.php');
        exit();
    }
}

include "login.phtml";
