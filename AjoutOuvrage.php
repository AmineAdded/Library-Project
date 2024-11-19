<?php
    include 'DbConnect.php';
    $idAdmin=$_GET['idAdmin'];

    if(!empty(($_POST))){
        //Les champs entre []: viennent du champ input
        $titre=$_POST['titre'];
        $auteur=$_POST['auteur'];
        $quantite=$_POST['quantite'];
        $categorie=$_POST['categorie'];
        $frais=$_POST['frais'];
        $idAdmin=$_POST['idAdmin'];
        
         // Initialisation du chemin de l'image par défaut
         $picture = '';

         // Vérification si un fichier a été téléchargé
         if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
             $target_dir = "assets/imgs/"; // Répertoire où stocker l'image
             $target_file = $target_dir . basename($_FILES["picture"]["name"]);
 
             // Déplacer le fichier téléchargé vers le répertoire cible
             if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                 $picture = $target_file; // Enregistrer le chemin du fichier
             } else {
                 echo "Une erreur est survenue lors de l'upload de l'image.";
             }
         }
         
        $sql="INSERT INTO ouvrages(titre,auteur,quantite,categorie,frais,picture) values (?,?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        $query->execute([$titre,$auteur,$quantite,$categorie,$frais,$picture]);
        
        header('location: DetailsOuvrage.php?idAdmin='.$idAdmin);
    }
    $template='AjoutOuvrage';
    $title='Ajout Ouvrage';
    include 'Layout.phtml';
?>