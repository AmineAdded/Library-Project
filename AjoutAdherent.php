<?php 
    include("DBconnect.php");
    $idAdmin=$_GET['idAdmin'];

    if (!empty($_POST)) {
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $password=$_POST['password'];
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

        $query= $pdo->prepare('insert into adherent (prenom,nom,email,tel,password,picture) values (?,?,?,?,?,?)');
        $query->execute([$prenom,$nom,$email,$tel,$password,$picture]);
         header('location: DetailsAdherent.php?idAdmin='.$idAdmin);
         exit();
    }
    
    $title='Ajout Adhérent';
    $template='AjoutAdherent';
    include("layout.phtml");
?>