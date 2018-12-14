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

//insertion d'une experience
if(isset($_POST['titre_exp'])){//si on a reçu une nouvelle experience
    if($_POST['titre_exp'] !=''){
        $experience = addslashes($_POST['titre_exp']);
        $stexperience = addslashes($_POST['stitre_exp']);
        $dates = addslashes($_POST['dates_exp']);
        $description = addslashes($_POST['description']);
        $pdoCV->exec("INSERT INTO t_experiences VALUES (NULL,'$experience','$stexperience','$dates','$description','1')");

        header("location:../back/experiences.php");
        exit();
    } //ferme le if n'est pas vide

} //ferme le if isset

//suppression d'un élement de la BDD
if(isset($_GET['id_experience'])){//on recupère l'experience dans l'url par son id
    $efface = $_GET['id_experience']; //je passe l'id dans une variable $efface

    $sql =" DELETE FROM t_experiences WHERE id_experience = '$efface'";
    $pdoCV->query($sql);//on peut le faire avec exec également
    
    header("location:../back/experiences.php");
}//ferma le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Admin : les experiences</title>
</head>
<body>

<div class="jumbotron">
<h1>Les experiences et insertion d'une nouvelle experience</h1></div>
<?php require 'inc/navigation.php'; ?>
    <div class="container">
        <?php
              //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
              $sql = $pdoCV ->prepare("SELECT * FROM t_experiences");
              $sql -> execute();
              $nbr_experiences=$sql->rowCount();
              ?>
           <div class="">
                  <table border="2" class="table table-striped">
                  <caption>La liste des experiences : <?php echo $nbr_experiences; ?></caption><br>
                  <thead class="thead-dark">
                        <tr>
                        <th class="bgvert">Experiences</th>
                        <th class="bgvert">Soustitre</th>
                        <th class="bgvert">Dates</th>
                        <th class="bgvert">Description</th>
                        <th class="bgvert">Modifier</th>
                        <th class="bgvert">Suppression</th>
                        </tr>
                  </thead>
                  <tbody class="table  table-hover">
                  <?php while($ligne_experience=$sql->fetch())
                  {?>
                        <tr class="table ">
                        <td class="bgvert"><?php echo $ligne_experience['titre_exp']; ?></td>
                        <td class="bgvert"><?php echo $ligne_experience['stitre_exp']; ?></td>
                        <td class="bgvert"><?php echo $ligne_experience['dates_exp']; ?></td>
                        <td class="bgvert"><?php echo $ligne_experience['description']; ?></td>
                        <td class="bgvert"><a href="modif_experience.php?id_experience=<?php echo $ligne_experience['id_experience']; ?>">Modif</a></td>
                        <td class="bgvert"><a href="experiences.php?id_experience=<?php echo $ligne_experience['id_experience']; ?>">Suppr</a></td>
                        </tr>
                        <?php
                    }
                    ?>
    
    
    
    
                  </tbody>
                  </table>
           </div>
        
              <hr>
              <!-- insertion d'une nouvelle formation -->
            <form action="experiences.php" method="POST">
                    <div class="form-group col-sm-6">
                        <label for="titre_exp">Experience</label>
                        <input type="text" name="titre_exp" class="form-control bgvert" placeholder="Nouvelle experience" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="stitre_exp">Soustitre</label>
                        <input type="text" name="stitre_exp" class="form-control bgvert" placeholder="Sous titre experience" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="dates_exp">Dates</label>
                        <input type="text" name="dates_exp" class="form-control bgvert" placeholder="Dates" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="description" class="">Description</label>
                        <textarea type="text" name="description"  id="description" required></textarea>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
            </script>
                    </div><br>
                    <button type="submit" class="btn btn-info btn-lg">Insérer une experience</button>
            </form>
    </div>

<?php require 'footer.php'; ?>
    
