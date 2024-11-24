<?php
    session_start();
    include 'DbConnect.php'; // Connexion à la base de données

    $errors = []; // Pour stocker les messages d'erreur
    $password = $newPassword = $confirmPassword = ""; // Initialisation des variables
    $username=$_SESSION['username'];

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
                $query = $pdo->prepare("SELECT password FROM admin WHERE username = :idAdmin AND password = :password");
                $query->execute(['username' => $idAdmin, 'password' => $password]);
                $result = $query->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    // Mise à jour du mot de passe dans la base
                    $update = $pdo->prepare("UPDATE admin SET password = :newPassword WHERE username = :username");
                    if ($update->execute(['newPassword' => $newPassword, 'username' => $username])) {
                        header('location: index.php');
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
            header('location: ChangerMotDePasse.php');
            exit();
        }
    }

    // Affichage des erreurs et du formulaire
    $title = "Changer Mot de passe";
    include 'ChangerMotDePasse.phtml';
?>
