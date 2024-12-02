<?php 
    include("DBconnect.php");
<<<<<<< HEAD
    session_start();

    $username=$_SESSION['username'];
=======
    $idAdmin=$_GET['idAdmin'];
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38

    if (!empty($_POST)) {
        $idAdherent=$_POST['idAdherent'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $password=$_POST['password'];
<<<<<<< HEAD
=======
        $idAdmin=$_POST['idAdmin'];
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
        
        if (!empty($_FILES['picture']['name'])) {
            $uploadDir = 'assets/imgs/'; // Chemin de stockage des images
            $picture = $uploadDir . basename($_FILES['picture']['name']);
            
            // Déplace le fichier téléchargé
            if (!move_uploaded_file($_FILES['picture']['tmp_name'], $picture)) {
                die('Erreur lors du téléchargement de l\'image.');
            }
        } else {
            // Si aucune nouvelle image n'est téléchargée, conserver l'image actuelle
            $picture = $_POST['current_picture'];
        }
        
        $sql= "UPDATE adherent SET
                nom='$nom',
                prenom='$prenom',
                email='$email',
                tel='$tel',
                password='$password',
                picture='$picture'
                WHERE idAdherent='$idAdherent'";

        $query=$pdo->prepare($sql);
        $query->execute();

<<<<<<< HEAD
        header('location: DetailsAdherent.php');
=======
        header('location: DetailsAdherent.php?idAdmin='.$idAdmin);
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
        exit();
    }

    $requette=$pdo->prepare('select * from adherent where idAdherent=?');
    $requette->execute([$_GET['idAdherent']]);
    $adherents=$requette->fetch();
    
    $title='Update adherent';
<<<<<<< HEAD
    include("UpdateAdherent.phtml");
=======
    $template='UpdateAdherent';
    include("layout.phtml");
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
?>