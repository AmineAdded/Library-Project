<?php
<<<<<<< HEAD
    session_start();
    include 'DbConnect.php';
    $username=$_SESSION['username'];
=======
    include 'DbConnect.php';
    $idAdmin=$_GET['idAdmin'];
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38

    if(!empty(($_POST))){
        //Les champs entre []: viennent du champ input
        $titre=$_POST['titre'];
        $auteur=$_POST['auteur'];
        $quantite=$_POST['quantite'];
        $categorie=$_POST['categorie'];
        $frais=$_POST['frais'];
<<<<<<< HEAD
        $description=$_POST['description'];


        $username=$_SESSION['username'];
=======
        $idAdmin=$_POST['idAdmin'];
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
        
         // Initialisation du chemin de l'image par défaut
         $picture = '';

         // Vérification si un fichier a été téléchargé
         if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
<<<<<<< HEAD
             $target_dir = ""; // Répertoire où stocker l'image
=======
             $target_dir = "assets/imgs/"; // Répertoire où stocker l'image
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
             $target_file = $target_dir . basename($_FILES["picture"]["name"]);
 
             // Déplacer le fichier téléchargé vers le répertoire cible
             if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                 $picture = $target_file; // Enregistrer le chemin du fichier
             } else {
                 echo "Une erreur est survenue lors de l'upload de l'image.";
             }
         }
         
<<<<<<< HEAD
        $sql="INSERT INTO ouvrages(titre,auteur,quantite,categorie,frais,picture,description) values (?,?,?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        $query->execute([$titre,$auteur,$quantite,$categorie,$frais,$picture,$description]);
        
        header('location: DetailsOuvrage.php');
    }
    $title='Ajout Ouvrage';
    include 'AjoutOuvrage.phtml';
=======
        $sql="INSERT INTO ouvrages(titre,auteur,quantite,categorie,frais,picture) values (?,?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        $query->execute([$titre,$auteur,$quantite,$categorie,$frais,$picture]);
        
        header('location: DetailsOuvrage.php?idAdmin='.$idAdmin);
    }
    $template='AjoutOuvrage';
    $title='Ajout Ouvrage';
    include 'Layout.phtml';
>>>>>>> b4dec9dce4f59785422b808d75f4cefbf841eb38
?>