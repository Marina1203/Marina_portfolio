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
if(isset($_POST['titre_exp'])){
    $experience = addslashes($_POST['titre_exp']);
    $stexperience = addslashes($_POST['stitre_exp']);
    $dates = addslashes($_POST['dates_exp']);
    $descrip = addslashes($_POST['description']);
    $id_experience = $_POST['id_experience'];

    $pdoCV->exec("UPDATE t_experiences SET titre_exp='$experience',stitre_exp ='$stexperience', dates_exp= '$dates',description = '$descrip' WHERE id_experience='$id_experience'");
    header("location:../back/experiences.php");
    exit();
    
}

//je récupère l'id de ce que je mets à jour
$id_experience=$_GET['id_experience']; 
$sql = $pdoCV->query("SELECT * FROM t_experiences WHERE id_experience ='$id_experience'");
$ligne_experience = $sql->fetch(); //

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : modif d'une experience</title>
</head>
<body>

<div class="jumbotron">  <h1>Mise à jour d'une experience</h1></div>
<?php require 'inc/navigation.php'; ?>
<div class="container">

       <!-- mise a jour d'une experience-->
       <form action="modif_experience.php" method="POST">
                <div class="">
                    <label for="titre_exp">Experience</label>
                    <input type="text" name="titre_exp" class="form-control bgvert"value="<?php echo $ligne_experience['titre_exp']; ?>" required>
                </div><br>
                <div class="">
                    <label for="stitre_exp">Soustitre</label>
                    <input type="text" name="stitre_exp" class="form-control bgvert"value="<?php echo $ligne_experience['stitre_exp']; ?>" required>
                </div><br>
                <div class="">
                    <label for="dates_exp">Dates</label>
                    <input type="text" name="dates_exp"class="form-control bgvert" value="<?php echo $ligne_experience['dates_exp']; ?>" required>
                </div><br>
                <div class="bgvert">
                        <label for="description" class="text-black">Description</label>
                        <textarea type="text" name="description"   id="description" value="<?php echo $ligne_experience['description']; ?>" required></textarea>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
            </script>
                    </div><br>
                <input type="hidden" name="id_experience" class="form-control bgvert" value="<?php echo $ligne_experience['id_experience']; ?>">
               <div class=""> <button type="submit" class="btn btn-info btn-lg">MAJ</button>
               </div>
        </form>
</div>

<?php require 'footer.php'; ?>

    
