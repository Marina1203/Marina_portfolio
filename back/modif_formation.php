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
if(isset($_POST['titre_form'])){
    $formation = addslashes($_POST['titre_form']);
    $stformation = addslashes($_POST['stitre_form']);
    $lieu = addslashes($_POST['lieu']);
    $dates = addslashes($_POST['dates_form']);
    $description = addslashes($_POST['description']);
    $id_formation = $_POST['id_formation'];

    $pdoCV->exec("UPDATE t_formations SET titre_form='$formation',stitre_form='$stformation',lieu='$lieu',dates_form ='$dates',description = '$description' WHERE id_formation='$id_formation'");
    header("location:../back/formations.php");
    exit();
    
}

//je récupère l'id de ce que je mets à jour
$id_formation=$_GET['id_formation']; 
$sql = $pdoCV->query("SELECT * FROM t_formations WHERE id_formation ='$id_formation'");
$ligne_formation = $sql->fetch(); //

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : modif d'une formation</title>
</head>
<body>

<div class="jumbotron"> <h1>Mise à jour d'une formation</h1></div>
<?php require 'inc/navigation.php'; ?>
<div class="container">

       <!-- mise a jour d'une formation-->
       <form action="modif_formation.php" method="POST">
                <div>
                    <label for="titre_form">Formation</label>
                    <input type="text" name="titre_form"  class="form-control bgvert"value="<?php echo $ligne_formation['titre_form']; ?>" required>
                </div><br>
                <div>
                    <label for="stitre_form">Soustitre</label>
                    <input type="text" name="stitre_form" class="form-control bgvert" value="<?php echo $ligne_formation['stitre_form']; ?>" required>
                </div><br>
                <div>
                    <label for="lieu">Lieu</label>
                    <input type="text" name="lieu" class="form-control bgvert" value="<?php echo $ligne_formation['lieu']; ?>" required>
                </div><br>
                <div>
                    <label for="dates_form">Dates</label>
                    <input type="text" name="dates_form" class="form-control bgvert" value="<?php echo $ligne_formation['dates_form']; ?>" required>
                </div><br>
                <div>
                        <label for="description" class="text-info">Description</label>
                        <textarea type="text" name="description"   id="description" value="<?php echo $ligne_formation['description']; ?>" required></textarea>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
            </script>
                    </div><br>
                <input type="hidden" name="id_formation"  value="<?php echo $ligne_formation['id_formation']; ?>">
               <div class=""> <button type="submit" class="btn btn-info btn-lg">MAJ</button>
               </div>
        </form>
</div>

<?php require 'footer.php'; ?>

    
