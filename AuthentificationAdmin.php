<?php 
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

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: AuthentificationAdmin.php?idAdmin=' . $_POST['idAdmin']);
        exit();
    }
}

    $idAdmin = isset($_GET['idAdmin']) ? $_GET['idAdmin'] : null;
    $title = 'Authentification Admin';
    include("AuthentificationAdmin.phtml");
?>
