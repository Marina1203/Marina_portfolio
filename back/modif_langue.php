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
if(isset($_POST['langue'])){
    $langue = addslashes($_POST['langue']);
    $niveau = addslashes($_POST['niveau']);
    $id_langue = $_POST['id_langue'];

    $pdoCV->exec("UPDATE t_langues SET langue='$langue',niveau='$niveau' WHERE id_langue='$id_langue'");
    header("location:../back/formations.php");
    exit();
    
}

//je récupère l'id de ce que je mets à jour
$id_langue=$_GET['id_langue']; 
$sql = $pdoCV->query("SELECT * FROM t_langues WHERE id_langue ='$id_langue'");
$ligne_langue = $sql->fetch(); //

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : modif d'une langue</title>
</head>
<body>

<div class="jumbotron"> <h1>Mise à jour d'une langue</h1></div>
<?php require 'inc/navigation.php'; ?>
<div class="container">

       <!-- mise a jour d'une langue-->
       <form action="modif_langue.php" method="POST">
                <div>
                    <label for="langue">Langue</label>
                    <input type="text" name="langue"  class="form-control bgvert"value="<?php echo $ligne_langue['langue']; ?>" required>
                </div><br>
                <div>
                    <label for="niveau">Niveau</label>
                    <input type="text" name="niveau" class="form-control bgvert" value="<?php echo $ligne_langue['niveau']; ?>" required>
                </div><br>
            
                <input type="hidden" name="id_langue"  value="<?php echo $ligne_langue['id_langue']; ?>">
               <div class=""> <button type="submit" class="btn btn-info btn-lg">MAJ</button>
               </div>
        </form>
</div>

<?php require 'footer.php'; ?>

    
