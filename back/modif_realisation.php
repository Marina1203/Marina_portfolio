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
if(isset($_POST['titre_real'])){
    $realisation = addslashes($_POST['titre_real']);
    $strealisation = addslashes($_POST['stitre_real']);
    $dates = addslashes($_POST['dates_real']);
    $id_realisation = $_POST['id_realisation'];
    $description = $_POST['description'];

    $pdoCV->exec("UPDATE t_realisations SET titre_real='$realisation',stitre_real='$strealisation',dates_real ='$dates', description='$description' WHERE id_realisation='$id_realisation'");
    header("location:../back/realisations.php");
    exit();
    
}

//je récupère l'id de ce que je mets à jour
$id_realisation=$_GET['id_realisation']; 
$sql = $pdoCV->query("SELECT * FROM t_realisations WHERE id_realisation ='$id_realisation'");
$ligne_realisation = $sql->fetch(); //

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : modif d'une réalisation</title>
</head>
<body>

<div class="jumbotron"> <h1>Mise à jour d'une réalisation</h1></div>
<?php require 'inc/navigation.php'; ?>
<div class="container">
        <!-- mise a jour d'une réalisation -->
       <form action="modif_realisation.php" method="POST">
                <div class="">
                    <label for="titre_real">Réalisation</label>
                    <input type="text" class="form-control bgvert" name="titre_real" value="<?php echo $ligne_realisation['titre_real']; ?>" required>
                </div><br>
                <div class="">
                    <label for="stitre_real">Soustitre</label>
                    <input type="text" class="form-control bgvert" name="stitre_real" value="<?php echo $ligne_realisation['stitre_real']; ?>" required>
                </div><br>
                <div class="">
                    <label for="dates_real">Dates</label>
                    <input type="text" class="form-control bgvert" name="dates_real" value="<?php echo $ligne_realisation['dates_real']; ?>" required>
                </div><br>
                <div>
                        <label for="description" >Description</label>
                        <textarea type="text" name="description"   id="description" value="<?php echo $ligne_realisation['description']; ?>" required></textarea>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
            </script>
                    </div><br>
                <input type="hidden" class="form-control bgvert" name="id_realisation"  value="<?php echo $ligne_realisation['id_realisation']; ?>">
               <div class=""> <button type="submit" class="btn btn-info btn-lg">MAJ</button>
               </div>
        </form>
</div>

<?php require 'footer.php'; ?>

    
