<?php require 'connexion.php'; 
session_start();// a mettre dans toutes les pages de l'admin

if(isset($_SESSION['connexion_admin'])){//si on est connecté

    $id_utilisateur=$_SESSION['id_utilisateur'];
    $email=$_SESSION['email'];
    $mdp=$_SESSION['mdp'];
    $nom=$_SESSION['nom'];

    // echo $id_utilisateur;

}else{ //si on n'est pas connécté on ne peut pas accéder à l'admin
    header('location:autentification.php');
} 
//pour vider les variables de session on destroy !
if(isset($_GET['quitter'])){
    $_SESSION['connexion_admin']=''; 
      $_SESSION['id_utilisateur']='';
      $_SESSION['email']='';
      $_SESSION['nom']='';
      $_SESSION['mdp']='';

      unset($_SESSION['connexion_admin']);
      session_destroy();

      header('location:autentification.php');
}
// Gestion mise à jour d'une information
if (isset($_POST['competence']))
{
    $competence = addslashes($_POST['competence']);
    $niveau = addslashes($_POST['niveau']);
    $categorie = addslashes($_POST['categorie']);
    
    $id_competence = $_POST['id_competence'];

    $pdoCV -> exec(" UPDATE t_competences SET competence='$competence', niveau='$niveau', categorie='$categorie' WHERE id_competence='$id_competence' "); 
    header('location: ../back/competences.php');
    exit();
} // Fin if isset $_POST

// Je récupère l'id de ce que je met à jour
$id_competence = $_GET['id_competence']; // par son id et avec get
$sql = $pdoCV -> query(" SELECT * FROM t_competences WHERE id_competence='$id_competence'"); 
$ligne_competence = $sql -> fetch(); // Va récupérer les données 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin : mise à jour d'une compétence</title>
</head>
<body>


<div class="jumbotron">  <h1>Mise à jour d'une compétence</h1> </div>
<?php require 'inc/navigation.php'; ?>
    <div class="container">
    
      
    
        <!-- Mise à jour d'une competence -->
        <h2>Formulaire de modification d'une compétence</h2>
        <form action="modif_competence.php" method="post">
            <div class="">
                <label for="competence">Compétence</label>
                <input type="text" class="form-control bgvert" name="competence" value="<?php echo $ligne_competence['competence']; ?>" required>
            </div>
            <div class="">
                <label for="niveau">Niveau</label>
                <input type="text" class="form-control bgvert" name="niveau" value="<?php echo $ligne_competence['niveau']; ?>" required>
            </div>
    
            
    
            <div class="">
                <label for="categorie">Catégorie</label>
                <select class="form-control bgvert" name="categorie" id="categorie">
                    <!-- Front -->
                    <option value="Front"
                        <?php // pour ajouter select="selected" à la balise option si c'est la catégorie de la compétence
                        if (!(strcmp("Front", $ligne_competence['categorie']))) { // strcmp compare les chaînes de caractères
                            echo "selected=\"selected\"";
                        }
                        ?>>Front</option>
    
    
                   <!-- Gestion de projet -->
                    <option value="Gestion de projet"  <?php 
                        if (!(strcmp("Gestion de projet", $ligne_competence['categorie']))) { 
                            echo "selected=\"selected\"";
                        }
                        ?>>Gestion de projet</option>
    
                    <!-- Back -->
                    <option value="Back" 
                        <?php 
                        if (!(strcmp("Back", $ligne_competence['categorie']))) { 
                            echo "selected=\"selected\"";
                        }
                        ?>>Back</option> 
                </select>
            </div>
    
    
            <div class="">
                <input type="hidden" class="form-control bgvert" name="id_competence" value="<?php echo $ligne_competence['id_competence']; ?>">
                <button type="submit" class="form-control btn btn-info btn-lg">Mise à jour d'un compétence</button>
            </div>
        </form>
    </div>
                   
    <?php require 'footer.php'; ?>
    
