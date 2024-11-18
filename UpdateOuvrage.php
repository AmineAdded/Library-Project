<?php
    include 'DbConnect.php';
    $idAdmin=$_GET['idAdmin'];

    if(!empty($_POST)){
        $idBook=$_POST['idBook'];
        $titre=$_POST['titre'];
        $auteur=$_POST['auteur'];
        $quantite=$_POST['quantite'];
        $categorie=$_POST['categorie'];
        $frais=$_POST['frais'];
        $idAdmin=$_POST['idAdmin'];
        
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

        $sql="UPDATE ouvrages SET
        titre = '$titre',
        auteur = '$auteur',
        quantite = '$quantite',
        categorie = '$categorie',
        frais = '$frais',
        picture = '$picture'
        WHERE idBook = '$idBook'";

        $query=$pdo->prepare($sql);
        $query->execute();

        header('location:DetailsOuvrage.php?idAdmin='.$idAdmin);
        exit();
    }

    $query=$pdo->prepare('SELECT * FROM ouvrages WHERE idBook = ?');
    $query->execute([$_GET['idBook']]);
    $ouvrages = $query->fetch();

    $title='Update Ouvrage';
    $template='UpdateOuvrage';
    include 'layout.phtml';
?>