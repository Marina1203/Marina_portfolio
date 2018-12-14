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
if(isset($_POST['titre'])){
    $titre = addslashes($_POST['titre']);
    $accroche = addslashes($_POST['accroche']);
    $id_titre = $_POST['id_titre'];

    $pdoCV->exec("UPDATE t_titres SET titre='$titre', accroche='$accroche' WHERE id_titre='$id_titre'");
    header("location:../back/titres.php");
    exit();
    
}

//je récupère l'id de ce que je mets à jour
$id_titre=$_GET['id_titre']; 
$sql = $pdoCV->query("SELECT * FROM t_titres WHERE id_titre ='$id_titre'");
$ligne_titre = $sql->fetch(); //

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Admin : modif d'un titre</title>
</head>
<body>
<div class="jumbotron"> <h1>Mise à jour d'un titre</h1></div>
<?php require 'inc/navigation.php'; ?>
<div class="container">
       <!-- mise a jour d'un titre-->
       <form action="modif_titre.php" method="POST">
                <div class="form-group col-sm-6">
                    <label for="titre" class="espace">Titre</label>
                    <input type="text" name="titre" class="form-control bgvert" value="<?php echo $ligne_titre['titre']; ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="accroche" class="espace">Accroche</label>
                    <input type="text" name="accroche" class="form-control bgvert" value="<?php echo $ligne_titre['accroche']; ?>" required>
                </div>
                <input type="hidden" name="id_titre"  value="<?php echo $ligne_titre['id_titre']; ?>">
               <div class=""> <button type="submit" class="btn btn-info btn-lg">MAJ</button>
               </div>
        </form>
</div>

<?php require 'footer.php'; ?>

    
