<?php
    session_start();
    include 'DbConnect.php'; // Connexion à la base de données

    $errors = []; // Pour stocker les messages d'erreur
    $password = $newPassword = $confirmPassword = ""; // Initialisation des variables
<<<<<<< HEAD
    $username=$_SESSION['username'];
=======
    $idAdmin = isset($_GET['idAdmin']) ? $_GET['idAdmin'] : ''; // Récupérer l'ID de l'admin depuis l'URL
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38

    // Récupérer les erreurs de la session après la redirection
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']); // Supprimer les erreurs de la session après récupération
    }

   

    if (!empty($_POST)) {
        // Récupérer les données POST
        $password = trim($_POST['password']);
        $newPassword = trim($_POST['newPassword']);
        $confirmPassword = trim($_POST['confirmPassword']);
<<<<<<< HEAD
=======
        $idAdmin = $_POST['idAdmin'];
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38

        // Validation des champs
        if (empty($password)) {
            $errors[] = "Le champ 'Mot de passe actuel' est obligatoire.";
        }
        if (empty($newPassword)) {
            $errors[] = "Le champ 'Nouveau mot de passe' est obligatoire.";
        }
        if (empty($confirmPassword)) {
            $errors[] = "Le champ 'Confirmer mot de passe' est obligatoire.";
        }

        // Vérification si les nouveaux mots de passe correspondent
        if (!empty($newPassword) && !empty($confirmPassword) && $newPassword !== $confirmPassword) {
            $errors[] = "Les nouveaux mots de passe ne correspondent pas.";
        }

        // Si aucune erreur n'a été détectée
        if (empty($errors)) {
            try {
                // Vérifier le mot de passe actuel
<<<<<<< HEAD
                $query = $pdo->prepare("SELECT password FROM admin WHERE username = :username AND password = :password");
                $query->execute(['username' => $username, 'password' => $password]);
=======
                $query = $pdo->prepare("SELECT password FROM admin WHERE idAdmin = :idAdmin AND password = :password");
                $query->execute(['idAdmin' => $idAdmin, 'password' => $password]);
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
                $result = $query->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    // Mise à jour du mot de passe dans la base
<<<<<<< HEAD
                    $update = $pdo->prepare("UPDATE admin SET password = :newPassword WHERE username = :username");
                    if ($update->execute(['newPassword' => $newPassword, 'username' => $username])) {
                        header('location: index.php');
=======
                    $update = $pdo->prepare("UPDATE admin SET password = :newPassword WHERE idAdmin = :idAdmin");
                    if ($update->execute(['newPassword' => $newPassword, 'idAdmin' => $idAdmin])) {
                        header('location: index.php?idAdmin=' . $idAdmin);
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
                        exit();
                    }else {
                        $errors[] = "Échec de la mise à jour du mot de passe.";
                    }
                } else {
                    $errors[] = "Mot de passe actuel incorrect.";
                }
            } catch (PDOException $e) {
                $errors[] = "Erreur de base de données : " . $e->getMessage();
            }
        }

        // Si des erreurs sont détectées, les stocker dans la session et rediriger
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
<<<<<<< HEAD
            header('location: ChangerMotDePasse.php');
=======
            header('location: ChangerMotDePasse.php?idAdmin=' . $idAdmin);
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
            exit();
        }
    }

    // Affichage des erreurs et du formulaire
<<<<<<< HEAD
    $title = "Changer Mot de passe";
    include 'ChangerMotDePasse.phtml';
=======
    $template = "ChangerMotDePasse";
    $title = "Changer Mot de passe";
    include 'layout.phtml';
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
?>
