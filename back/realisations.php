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

//insertion d'une réalisation
if(isset($_POST['titre_real'])){//si on a reçu un nouvelle realisation
    if($_POST['titre_real'] !=''){
        $realisation = addslashes($_POST['titre_real']);
        $strealisation = addslashes($_POST['stitre_real']);
        $dates = addslashes($_POST['dates_real']);
        $description = addslashes($_POST['description']);
        $pdoCV->exec("INSERT INTO t_realisations VALUES (NULL,'$realisation','$strealisation','$dates','$description','1')");

        header("location:../back/realisations.php");
        exit();
    } //ferme le if n'est pas vide

} //ferme le if isset

//suppression d'un élement de la BDD
if(isset($_GET['id_realisation'])){//on recupère la realisation dans l'url par son id
    $efface = $_GET['id_realisation']; //je passe l'id dans une variable $efface

    $sql =" DELETE FROM t_realisations WHERE id_realisation = '$efface'";
    $pdoCV->query($sql);//on peut le faire avec exec également
    
    header("location:../back/realisations.php");
}//ferma le if isset pour la suppression ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réalisations</title>
</head>
<body>

<div class="jumbotron"><h1>Les réalisations et insertion d'une nouvelle réalisation</h1></div>
<?php require 'inc/navigation.php'; ?>
    <div class="container">
    <?php
          //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV ->prepare("SELECT * FROM t_realisations");
          $sql -> execute();
          $nbr_realisations=$sql->rowCount();
          ?>
       <div class="">
              <table border="1" class="table table-striped">
              <caption>La liste des réalisations : <?php echo $nbr_realisations; ?></caption><br>
              <thead class="thead-dark">
                    <tr>
                    <th>Réalisations</th>
                    <th>Soustitre</th>
                    <th>Dates</th>
                    <th>Description</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    </tr>
              </thead>
              <tbody class="table  table-hover">
              <?php while($ligne_realisation=$sql->fetch())
              {?>
                    <tr class="table">
                    <td class="bgvert"><?php echo $ligne_realisation['titre_real']; ?></td>
                    <td class="bgvert"><?php echo $ligne_realisation['stitre_real']; ?></td>
                    <td class="bgvert"><?php echo $ligne_realisation['dates_real']; ?></td>
                    <td class="bgvert"><?php echo $ligne_realisation['description']; ?></td>
                    <td class="bgvert"><a href="modif_realisation.php?id_realisation=<?php echo $ligne_realisation['id_realisation']; ?>">Modif</a></td>
                    <td class="bgvert"><a href="realisations.php?id_realisation=<?php echo $ligne_realisation['id_realisation']; ?>">Suppr</a></td>
                    </tr>
                    <?php
                }
                ?>

              </tbody>
              </table>
       </div>
    
          <hr>
          <!-- insertion d'une nouvelle réalisation -->
        <form action="realisations.php" method="POST">
                <div class="form-group col-sm-6">
                    <label for="titre_real">Réalisations</label>
                    <input type="text" name="titre_real"  class="form-control bgvert" placeholder="Nouvelle Réalisation" required>
                </div><br>
                <div class="form-group col-sm-6">
                        <label for="stitre_real">Soustitre</label>
                        <input type="text" name="stitre_real"  class="form-control bgvert" placeholder="Sous titre experience" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="dates_real">Dates</label>
                        <input type="text" name="dates_real"  class="form-control bgvert" placeholder="Dates" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="description" class="text-black">Description</label>
                        <textarea type="text" name="description"  id="description" required></textarea>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
            </script>
                    </div><br>
                <button type="submit" class="btn btn-info btn-lg">Insérer une rélisation</button>
        </form>


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> <!-- debut de div carousel -->
                <ul class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        
                    </ul>
                    <div class="carousel-inner">
                            <div class="carousel-item active">
                                    <img class="d-block w-100" src="../back/img/screen_licorne.jpg" alt="First slide" width="80%" height="60%">
                                    <div class="carousel-caption d-none d-md-block noir">
                                            <h5>Eval1</h5>
                                            
                                        </div> <!-- fin de carousel caption -->
                                </div> <!-- fin de carousel item active -->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../back/img/screen_chat_adopter.JPG" alt="Second slide" width="80%" height="100%">
                                    <div class="carousel-caption d-none d-md-block noir">
                                            <h5>Eval2</h5>
                                            
                                        </div><!-- fin de carousel caption -->
                                </div> <!-- fin de carousel item  -->
                                <div class="carousel-item">
                                    <img src="../back/img/screen-jurassic.jpg" alt="Third slide" width="80%" height="20%">
                                    <div class="carousel-caption d-none d-md-block noir">
                                        <h5>Eval3</h5>
                                        
                                    </div><!-- fin de carousel caption -->
                                </div> <!-- fin de carousel item  -->
                                <div class="carousel-item">
                                    <img src="../back/img/screen-mixa-wp.jpg" alt="Third slide" width="80%" height="20%">
                                    <div class="carousel-caption d-none d-md-block noir">
                                        <h5>Site_dyakov</h5>
                                        
                                    </div><!-- fin de carousel caption -->
                                </div> <!-- fin de carousel item  -->
                                <div class="carousel-item">
                                    <img src="../back/img/mdyakov-divi-screen.JPG" alt="Third slide" width="80%" height="20%">
                                    <div class="carousel-caption d-none d-md-block noir">
                                        <h5>Site_mdyakov</h5>
                                        
                                    </div><!-- fin de carousel caption -->
                                </div> <!-- fin de carousel item  -->
                                
                    </div> <!-- fin de carousel-inner -->
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        
                        <div class="soustexte">
                            <h3>Mes réalisations</h3>
                        </div> <!-- fin de class soustexte -->
        </div><!-- fin de div carousel -->
    </div>

<?php require 'footer.php'; ?>
    


