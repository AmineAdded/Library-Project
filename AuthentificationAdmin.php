<?php 
session_start(); // Activation des sessions
include("DBconnect.php");
$errors = [];

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $errors[] = "Veuillez remplir tous les champs";
    } else {
        $query = $pdo->prepare('SELECT username, password FROM admin WHERE idAdmin = ?');
        $query->execute([$_POST['idAdmin']]);
        $adminBase = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($adminBase && $adminBase['username'] == $username && $adminBase['password'] == $password) {
            header('Location: index.php?idAdmin=' . $_POST['idAdmin']);
            exit();
        } else {
            $errors[] = "Nom d'utilisateur ou mot de passe invalide";
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: AuthentificationAdmin.php?idAdmin=' . $_POST['idAdmin']);
        exit();
    }
}

$idAdmin = isset($_GET['idAdmin']) ? $_GET['idAdmin'] : null;
$title = 'Authentification Admin';
$template = 'AuthentificationAdmin';
include("layout.phtml");
?>
