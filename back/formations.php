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



//insertion d'une formation
if(isset($_POST['titre_form'])){//si on a reçu un nouvelle formation
    if($_POST['titre_form'] !=''){
        $formation = addslashes($_POST['titre_form']);
        $stformation = addslashes($_POST['stitre_form']);
        $lieu = addslashes($_POST['lieu']);
        $dates = addslashes($_POST['dates_form']);
        $description = addslashes($_POST['description']);
        $pdoCV->exec("INSERT INTO t_formations VALUES (NULL,'$formation','$stformation','$lieu','$dates','$description','1')");

        header("location:../back/formations.php");
        exit();
    } //ferme le if n'est pas vide

} //ferme le if isset

//suppression d'un élement de la BDD
if(isset($_GET['id_formation'])){//on recupère la formation dans l'url par son id
    $efface = $_GET['id_formation']; //je passe l'id dans une variable $efface

    $sql =" DELETE FROM t_formations WHERE id_formation = '$efface'";
    $pdoCV->query($sql);//on peut le faire avec exec également
    
    header("location:../back/formations.php");
}//ferma le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Admin : les formations</title>
</head>
<body>

<div class="jumbotron">
<h1>Les formations et insertion d'une nouvelle formation</h1></div>
<?php require 'inc/navigation.php'; ?>
    
<div class="container">

    <?php
          //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV ->prepare("SELECT * FROM t_formations");
          $sql -> execute();
          $nbr_formations=$sql->rowCount();
          ?>
       <div class="">
              <table border="2" class="table table-striped">
              <caption>La liste des formations : <?php echo $nbr_formations; ?></caption><br>
              <thead class="thead-dark">
                    <tr>
                    <th>Formations</th>
                    <th>Soustitre</th>
                    <th>Lieu</th>
                    <th>Dates</th>
                    <th>Description</th>
                    <th>Modifier</th>
                    <th>Suppression</th>
                    </tr>
              </thead>
              <tbody class="table  table-hover">
              <?php while($ligne_formation=$sql->fetch())
              {?>
                    <tr class="table table-hover">
                    <td class="bgvert"><?php echo $ligne_formation['titre_form']; ?></td>
                    <td class="bgvert"><?php echo $ligne_formation['stitre_form']; ?></td>
                    <td class="bgvert"><?php echo $ligne_formation['lieu']; ?></td>
                    <td class="bgvert"><?php echo $ligne_formation['dates_form']; ?></td>
                    <td class="bgvert"><?php echo $ligne_formation['description']; ?></td>
                    <td class="bgvert"><a href="modif_formation.php?id_formation=<?php echo $ligne_formation['id_formation']; ?>">Modif</a></td>
                    <td class="bgvert"><a href="formations.php?id_formation=<?php echo $ligne_formation['id_formation']; ?>">Suppr</a></td>
                    </tr>
                    <?php
                }
                ?>




              </tbody>
              </table>
       </div>
    
          <hr>
          <!-- insertion d'une nouvelle formation -->
        <form action="formations.php" method="POST">
                <div class="form-group col-sm-6">
                    <label for="titre_form">Formation</label>
                    <input type="text" name="titre_form" class="form-control bgvert"  placeholder="Nouvelle formation" required>
                </div><br>
                <div class="form-group col-sm-6">
                        <label for="stitre_form">Soustitre</label>
                        <input type="text" name="stitre_form" class="form-control bgvert" placeholder="Sous titre formation" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="lieu">Lieu</label>
                        <input type="text" name="lieu" class="form-control bgvert" placeholder="Sous titre formation" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="dates_form">Dates</label>
                        <input type="text" name="dates_form" class="form-control bgvert"  placeholder="Dates" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="description" class="text-black">Description</label>
                        <textarea type="text" name="description"  class="bgvert" id="description" required></textarea>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
                
            </script>
                    </div><br>
                <button type="submit" class="btn btn-info btn-lg">Insérer une formation</button>
        </form>
</div>
            
<?php require 'footer.php'; ?>
    
