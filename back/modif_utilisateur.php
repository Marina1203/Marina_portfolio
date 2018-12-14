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
//gestion mise à jour d'une information
if(isset($_POST['prenom'])){
    $prenom = addslashes ($_POST['prenom']);
    $nom = addslashes ($_POST['nom']);
    $email = addslashes ($_POST['email']);
    $site = addslashes ($_POST['site']);
    $site2 = addslashes ($_POST['site2']);
    $telephone = addslashes ($_POST['telephone']);
    $portable = addslashes ($_POST['portable']);
    $pseudo = addslashes ($_POST['pseudo']);
    $mdp = addslashes ($_POST['mdp']);
    $age = addslashes ($_POST['age']);
    $anniversaire = addslashes ($_POST['anniversaire']);
    $genre = addslashes ($_POST['genre']);
    $civilite = addslashes ($_POST['civilite']);
    $adresse = addslashes ($_POST['adresse']);
    $code_postal = addslashes ($_POST['code_postal']);
    $ville = addslashes ($_POST['ville']);
    $pays = addslashes ($_POST['pays']);
    $commentaires = addslashes ($_POST['commentaires']);
    $id_utilisateur = addslashes ($_POST['id_utilisateur']);
   
   

    $pdoCV -> exec(" UPDATE t_utilisateurs  SET prenom = '$prenom', nom ='$nom', email ='$email', site ='$site', site2 = '$site2', telephone ='$telephone', portable = '$portable', pseudo = '$pseudo', mdp = '$mdp', age = '$age', anniversaire = '$anniversaire', genre = '$genre', civilite = '$civilite', adresse = '$adresse', code_postal = '$code_postal', ville = '$ville', pays = '$pays', commentaires = '$commentaires' WHERE id_utilisateur='$id_utilisateur'");

    header("location: ../back/utilisateurs.php");
     
    exit();     
}// ferme le if isset $_POST
//******************************/

// Je récupère l'id de ce que je met à jour
$id_utilisateur = $_GET['id_utilisateur']; // par son id et avec get
$sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur='$id_utilisateur'"); 
$ligne_utilisateur = $sql -> fetch(); // Va récupérer les données 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin : mise à jour d'un utilisateur</title>
</head>
<body>


<div class="jumbotron"> <h1>Mise à jour d'une utilisateur</h1></div>
<?php require 'inc/navigation.php'; ?>
    <div class="container">
    
        <!-- Mise à jour d'un utilisateur -->
        <h2>Formulaire de modification d'un utilisateur</h2>
        <form action="modif_utilisateur.php" method="post">
        <div class="form-group col-sm-5">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" class="form-control bgvert" placeholder="Prenom"  value="<?php echo $ligne_utilisateur['prenom']; ?>"required>
            </div>
            <div class="form-group col-sm-5">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control bgvert" placeholder="Nom" value="<?php echo $ligne_utilisateur['nom']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control bgvert" placeholder="Email" value="<?php echo $ligne_utilisateur['email']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="site">Site</label>
                <input type="text" name="site" class="form-control bgvert" placeholder="Site" value="<?php echo $ligne_utilisateur['site']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="site2">Site2</label>
                <input type="text" name="site2" class="form-control bgvert" placeholder="Site2" value="<?php echo $ligne_utilisateur['site2']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="telephone">Telephone</label>
                <input type="text" name="telephone" class="form-control bgvert" placeholder="Téléphone" value="<?php echo $ligne_utilisateur['telephone']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="portable">Portable</label>
                <input type="text" name="portable" class="form-control bgvert" placeholder="Portable" value="<?php echo $ligne_utilisateur['portable']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" class="form-control bgvert" placeholder="Pseudo" value="<?php echo $ligne_utilisateur['pseudo']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="mdp">Mdp</label>
                <input type="text" name="mdp" class="form-control bgvert" placeholder="Mdp" value="<?php echo $ligne_utilisateur['mdp']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control bgvert" placeholder="Age" value="<?php echo $ligne_utilisateur['age']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="anniversaire">Anniversaire</label>
                <input type="text" name="anniversaire" class="form-control bgvert" placeholder="Anniversaire" value="<?php echo $ligne_utilisateur['anniversaire']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="genre">Genre</label>
                <select name="genre" class="form-control bgvert" id="genre">
                    <!-- Homme -->
                    <option value="homme"
                        <?php // pour ajouter select="selected" à la balise option si c'est le choix du genre
                        if (!(strcmp("homme", $ligne_utilisateur['genre']))) { // strcmp compare les chaînes de caractères
                            echo "selected=\"selected\"";
                        }
                        ?>>Homme</option>
    
    
                   <!-- Femme -->
                    <option value="Femme"  <?php 
                        if (!(strcmp("Femme", $ligne_utilisateur['genre']))) { 
                            echo "selected=\"selected\"";
                        }
                        ?>>Femme</option>
    
                </select>
            </div>
            <div class="form-group col-sm-5">
                <label for="civilite">Civilite</label>
                <select name="civilite" class="form-control bgvert" id="civilite">
                    <!-- Mr -->
                    <option value="Mr"
                        <?php // pour ajouter select="selected" à la balise option si c'est le choix de la civilite
                        if (!(strcmp("Mr", $ligne_utilisateur['civilite']))) { // strcmp compare les chaînes de caractères
                            echo "selected=\"selected\"";
                        }
                        ?>>Mr</option>
    
    
                   <!-- Mme -->
                    <option value="Mme"  <?php 
                        if (!(strcmp("Mme", $ligne_utilisateur['civilite']))) { 
                            echo "selected=\"selected\"";
                        }
                        ?>>Mme</option>
    
                </select>
            </div>
            <div class="form-group col-sm-5">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control bgvert" placeholder="Adresse" value="<?php echo $ligne_utilisateur['adresse']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="code_postal">Code_postal</label>
                <input type="text" name="code_postal" class="form-control bgvert" placeholder="Code_postal" value="<?php echo $ligne_utilisateur['code_postal']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="ville">Ville</label>
                <input type="text" name="ville" class="form-control bgvert" placeholder="Ville" value="<?php echo $ligne_utilisateur['ville']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="pays">Pays</label>
                <input type="text" name="pays" class="form-control bgvert" placeholder="Pays" value="<?php echo $ligne_utilisateur['pays']; ?>" required>
            </div>
            <div class="form-group col-sm-5">
                <label for="commentaires">Commentaires</label>
                <input type="text" name="commentaires" class="form-control bgvert" placeholder="Commentaires"  value="<?php echo $ligne_utilisateur['commentaires']; ?>"required>
            </div>
    
            <div class="form-group col-sm-5">
                <input type="hidden" name="id_utilisateur" value="<?php echo $ligne_utilisateur['id_utilisateur']; ?>">
                <button type="submit" class="btn bg-info btn-lg text-white">Mise à jour d'un utilisateur</button>
            </div>
        </form>
    </div>
                    
    <?php require 'footer.php'; ?>
    
