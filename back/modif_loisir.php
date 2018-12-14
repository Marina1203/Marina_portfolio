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
if(isset($_POST['loisir'])){
    $loisir = addslashes($_POST['loisir']);
    $id_loisir = $_POST['id_loisir'];

    $pdoCV->exec("UPDATE t_loisirs SET loisir='$loisir' WHERE id_loisir='$id_loisir'");
    header("location:../back/loisirs.php");
    exit();
    
}

//je récupère l'id de ce que je mets à jour
$id_loisir=$_GET['id_loisir']; 
$sql = $pdoCV->query("SELECT * FROM t_loisirs WHERE id_loisir ='$id_loisir'");
$ligne_loisir = $sql->fetch(); //

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Admin : modif d'un loisir</title>
</head>
<body>
<div class="jumbotron"> <h1>Mise à jour d'un loisir</h1></div>
<?php require 'inc/navigation.php'; ?>
<div class="container">
       <!-- mise a jour d'un loisir-->
       <form action="modif_loisir.php" method="POST">
                <div>
                    <label for="loisir" class="espace">Loisir</label>
                    <input type="text" name="loisir" class="form-control bgvert" value="<?php echo $ligne_loisir['loisir']; ?>" required>
                </div><br>
                <input type="hidden" name="id_loisir"  value="<?php echo $ligne_loisir['id_loisir']; ?>">
               <div class=""> <button type="submit" class="btn btn-info btn-lg">MAJ</button>
               </div>
        </form>
</div>

<?php require 'footer.php'; ?>

    
