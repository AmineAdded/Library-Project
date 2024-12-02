<?php 
<<<<<<< HEAD
    session_start(); // Activation des sessions
    if(isset($_SESSION['idAdmin'])){//S'il y a une session
        header('location: index.php');
        exit();
    }
    include("DBconnect.php");

    $errors = [];

    if (!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $idAdmin=$_POST['idAdmin'];

        if (empty($username) || empty($password)) {
            $errors[] = "Veuillez remplir tous les champs";
        } else {
            $query = $pdo->prepare('SELECT * FROM admin WHERE username = ?');
            $query->execute([$username]);
            $adminBase = $query->fetch(PDO::FETCH_ASSOC);
            
            if (!$adminBase) {
                $errors[] = "Admin inexistant";
            } else {
                if($password == $adminBase['password']){
                    $_SESSION['idAdmin']=$adminBase['idAdmin'];
                    $_SESSION['username']=$adminBase['username'];
                    $_SESSION['email']=$adminBase['email'];
                    $_SESSION['picture']=$adminBase['picture'];
                    header('location:index.php');
                    exit();
                }
                else{
                    $errors[]="Nom d'utilisateur ou mot de passe invalide";
                }
            }
        }
=======
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
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: AuthentificationAdmin.php?idAdmin=' . $_POST['idAdmin']);
        exit();
    }
}

<<<<<<< HEAD
    $idAdmin = isset($_GET['idAdmin']) ? $_GET['idAdmin'] : null;
    $title = 'Authentification Admin';
    include("AuthentificationAdmin.phtml");
=======
$idAdmin = isset($_GET['idAdmin']) ? $_GET['idAdmin'] : null;
$title = 'Authentification Admin';
$template = 'AuthentificationAdmin';
include("layout.phtml");
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
?>
