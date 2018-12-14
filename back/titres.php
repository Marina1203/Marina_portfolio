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
//insertion d'un titre
if(isset($_POST['titre'])){//si on a reçu un nouveau titre
    if($_POST['titre'] !=''){
        $titre = addslashes($_POST['titre']);
        $accroche = addslashes($_POST['accroche']);
        $pdoCV->exec("INSERT INTO t_titres VALUES (NULL,'$titre','$accroche','1')");

        header("location:../back/titres.php");
        exit();
    } //ferme le if n'est pas vide

} //ferme le if isset

//suppression d'un élement de la BDD
if(isset($_GET['id_titre'])){//on recupère le titre dans l'url par son id
    $efface = $_GET['id_titre']; //je passe l'id dans une variable $efface

    $sql =" DELETE FROM t_titres WHERE id_titre = '$efface'";
    $pdoCV->query($sql);//on peut le faire avec exec également
    
    header("location:../back/titres.php");
}//ferma le if isset pour la suppression
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    
    <title>TITRES</title>
</head>
<body>

<div class="jumbotron">
<h1>Les différents titres de mon PORTFOLIO</h1>
</div>
<?php require 'inc/navigation.php'; ?>
    <div class="container">
        <?php
              //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
              $sql = $pdoCV ->prepare("SELECT * FROM t_titres");
              $sql -> execute();
              $nbr_titres=$sql->rowCount();
              ?>
           <div class="">
                  <table border="2" class="table table-striped">
                  <caption>La liste de mes titres : <?php echo $nbr_titres; ?></caption><br>
                  <thead class="thead-dark">
                        <tr>
                        <th>Titres</th>
                        <th>Accroche</th>
                        <th>Modifier</th>
                        <th>Suppression</th>
                        </tr>
                  </thead>
                  <tbody class="table  table-hover">
                  <?php while($ligne_titre=$sql->fetch())
                  {?>
                        <tr class="table">
                        <td class="bgvert"><?php echo $ligne_titre['titre']; ?></td>
                        <td class="bgvert"><?php echo $ligne_titre['accroche']; ?></td>
                        <td class="bgvert"><a href="modif_titre.php?id_titre=<?php echo $ligne_titre['id_titre']; ?>">Modif</a></td>
                        <td class="bgvert"><a href="titres.php?id_titre=<?php echo $ligne_titre['id_titre']; ?>">Suppr</a></td>
                        </tr>
                        <?php
                    }
                    ?>
    
    
    
    
                  </tbody>
                  </table>
           </div>
        
              <hr>
              <!-- insertion d'un nouveau titre -->
            <form action="titres.php" method="POST">
                    <div class="form-group col-sm-6">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre"  class="form-control bgvert" placeholder="Nouveau titre" required>
                    </div><br>
                    <div class="form-group col-sm-6">
                        <label for="accroche">Accroche</label>
                        <input type="text" name="accroche"  class="form-control bgvert" placeholder="Nouveau accroche" required>
                    </div><br>
                    <button type="submit" class="btn btn-info btn-lg">Insérer un titre</button>
            </form>
<section id="bolchoi">
    <h2> I - Organisations de spectacle</h2>
    
    
   
       <div class="bolchoi bgloisir">
       <h4>Tournées de Bolchoi à Paris</h4>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> <!-- debut de div carousel -->
                    <ul class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            
                            
                        </ul>
                        <div class="carousel-inner">
                                <div class="carousel-item active">
                                        <img class="" src="../back/img/Michka_bolchoi123.jpg" alt="First slide" width="80%" height="50%">
                                        <div class="carousel-caption d-none d-md-block noir">
                                                <h5>Concert1</h5>
                                                
                                            </div> <!-- fin de carousel caption -->
                                    </div> <!-- fin de carousel item active -->
                                    <div class="carousel-item">
                                        <img src="../back/img/Michka_bolchoi2.jpg" alt="Third slide" width="80%" height="30%">
                                        <div class="carousel-caption d-none d-md-block noir">
                                            <h5>Concert2</h5>
                                            
                                        </div><!-- fin de carousel caption -->
                                    </div> <!-- fin de carousel item  -->
                                    <div class="carousel-item">
                                        <img src="../back/img/img-Michka_philarmonia.jpg" alt="Third slide" width="80%" height="30%">
                                        <div class="carousel-caption d-none d-md-block noir">
                                            <h5>Concert3</h5>
                                            
                                        </div><!-- fin de carousel caption -->
                                    </div> <!-- fin de carousel item  -->
                                    <div class="carousel-item">
                                        <img src="../back/img/img-Michka philarmonia2.jpg" alt="Third slide" width="80%" height="40%">
                                        <div class="carousel-caption d-none d-md-block noir">
                                            <h5>Concert4</h5>
                                            
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
                            </div> <!-- fin de class soustexte -->
            </div><!-- fin de div carousel -->
       </div>
        <div class="clear"></div>
   
</section>
<section class="videoFond">
<h2> II - Organisations de soirées musicales</h2>
        <h4>Concert "SOPRANO" Paris 28 octobre</h4>
        <div class="videoTexte embed-responsive embed-responsive-4by3  bgloisir" > 
            <video autoplay loop>
                <source src="video/VID_20171128_213452.mp4" type="video/mp4"
                >
            </video>
             <p>Video concert "Soprano" Paris octobre 2017</p>
        </div>
        <div class="videoTexte1 embed-responsive embed-responsive-4by3  bgloisir" > 
            <video autoplay loop>
                <source src="video/VID_20171128_220209.mp4" height="450" width="300" type="video/mp4">
            </video>
             <p>Video concert "Soprano II" Paris octobre 2017</p>
        </div>
    </section>
    <div class="clear"></div>
<section class="bgloisir">
    <h3>Mes coordonnées:</h3>
    <div id="adresse"><p>Mon adresse</p>
        <p>148-150 avenue Jean Jaurès </p>
        <p>93500 Pantin France</p>
        <div id="email"><p>marina.vasylenko1203@gmail.com</p></div>
        <div id="mob"><p>+33615360311</p></div>
        <div id="reseaux"><p><a href="https://github.com/Marina1203"><i class="fab fa-github"></i></a><a href="https://www.linkedin.com/in/marina-vasylenko-66b1b116a/">   <i class="fab fa-linkedin-in"></i></a></p>
        
    </div>
    </div>
    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.3817156212344!2d2.3946065159748446!3d48.90811927929237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66c46ff98888d%3A0x5d8713bde428d09c!2zMTQ4IEF2ZW51ZSBKZWFuIEphdXLDqHMsIDkzNTAwIFBhbnRpbiwg0KTRgNCw0L3RhtC40Y8!5e0!3m2!1sru!2sru!4v1539598165140" width="450" height="300"  style="border:0" allowfullscreen></iframe>
    </div>
    <div class="clear"></div>
    
</section>

</div>


<?php require 'footer.php'; ?>




