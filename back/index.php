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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $sql=$pdoCV->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
    $ligne_utilisateur = $sql->fetch();
    ?>
   
    <title>Admin  <?php echo $ligne_utilisateur['prenom']; ?></title>
</head>
<body>
<div class="jumbotron">
    <h1>Je suis sur le site PORTFOLIO</h1>
    <div><img src="../back/img/Marina_photo123.jpg"  class="photo" alt=""></div>
</div> <!-- fin de jumbotron -->
    <?php require 'inc/navigation.php'; ?>
    <div class="container">
   
    <section class="section"><!-- début section -->
           <div class="block">
                <h2 class="titreSection">Mon Profil en images</h2>
                <div class="gauche"><!-- début classe gauche -->
                
                    <div class="image">
                        <figure><img src="../back/img/image18.jpg " alt="Image ML1"> <figcaption>Viser l'essentiel</figcaption>
                        </figure>
                    </div> <!-- fin de classe image-->

                </div><!-- fin de classe gauche -->


                <div class="droite">
                    <p>"" Le génie c'est quelqu'un qui vise un objectif qu'il est seul à distinguer, et l'atteint."</p>
                    <p>"Viser ne suffit pas, il faut encore ajuster."" </p>
                    <p>Citation de Pierre-Claude-Victor Boiste ; Le dictionnaire universel (1843)</p>
                </div> <!-- fin de classe droite -->

                <div class="clear"></div>

                <div class="droite">
                    <div class="image">
                       <figure> <img src="../back/img/image17.jpg" alt="Image ML2"><figcaption>Londres mon amour</figcaption></figure>
                    </div> <!-- fin de classe image-->
                </div>  <!-- fin de classe droite -->

                <div class="gauche">
                    <p>"Je passais, il y a quelque temps, sur le Pont de Londres, et m’arrêtai pour regarder ce que j’aime : le spectacle d’une eau riche et lourde et complexe, parée de nappes de nacre, troublée de nuages de fange, confusément chargée d’une quantité de navires dont les blanches vapeurs, les bras mouvants, les actes bizarres qui balancent dans l’espace balles et caisses, animent les formes et font vivre la vue."</p>
                    <p>Paul Valéry – London Bridge (1941)</p>
                </div> <!-- fin de classe gauche -->

                <div class="clear"></div>

                <div class="gauche">
                    <div class="image">
                        <figure><img src="../back/img/image22.jpg" alt="Image ML3"><figcaption>Du bon pain</figcaption></figure>
                    </div><!-- fin de classe image-->
                </div><!-- fin de classe gauche -->

                <div class="droite">
                    <p> "La surface du pain est merveilleuse d'abord à cause de cette impression quasi panoramique qu'elle donne : comme si l'on avait à sa disposition sous la main les Alpes, le Taurus ou la Cordillère des Andes.
                    Ainsi donc une masse amorphe en train d'éructer fut glissée pour nous dans le four stellaire, où durcissant elle s'est façonnée en vallées, crêtes, ondulations, crevasses... Et tous ces plans dès lors si nettement articulés, ces dalles minces où la lumière avec application couche ses feux, - sans un regard pour la mollesse ignoble sous-jacente."</p>
                    <p>Francis Ponge - Le parti pris des choses (1942)</p>
                </div> <!-- fin de classe droite -->

                <div class="clear"></div>

                    <div class="droite">
                        <div class="image">
                        <figure><img src="../back/img/IMG_20171231_120554.jpg" alt="Image ML4"><figcaption>Baden-Baden</figcaption></figure>
                        </div><!-- fin de classe image-->
                    </div><!-- fin de classe droite -->

                <div class="gauche">
                    <p> "Vous arrivez, non par une route pavée et boueuse, mais par les chemins sablés d’un jardin anglais. A droite, des bosquets, des grottes taillées, des ermitages, et même une petite pièce d’eau, ornement sans prix, vu la rareté de ce liquide, qui se vend au verre dans tout le pays de Baden […]"</p>
                    <p>Baden-Baden et Gérard de Nerval - Les lettres de voyage à son ami Alexandre Dumas.(1838) </p>
                </div> <!-- fin de classe gauche -->

                <div class="clear"></div>

                <div class="gauche">
                    <div class="image">
                        <figure><img src="../back/img/image605.JPG" alt="Image ML5"><figcaption>Printemps en fleurs</figcaption></figure>
                    </div><!-- fin de classe image-->
                    <div class="image">
                        <figure><img src="../back/img/image616.JPG" alt="Image ML6"><figcaption>Printemps fleuri</figcaption></figure>
                    </div><!-- fin de classe image-->
                </div><!-- fin de classe gauche -->

                <div class="droite">
                    <p>"Voici donc les longs jours, lumière, amour, délire !
                        Voici le printemps ! mars, avril au doux sourire,
                        Mai fleuri, juin brûlant, tous les beaux mois amis !
                        Les peupliers, au bord des fleuves endormis,
                        Se courbent mollement comme de grandes palmes ;
                        L’oiseau palpite au fond des bois tièdes et calmes ;
                        Il semble que tout rit, et que les arbres verts
                        Sont joyeux d’être ensemble et se disent des vers.
                        Le jour naît couronné d’une aube fraîche et tendre ;
                        Le soir est plein d’amour ; la nuit, on croit entendre,
                        A travers l’ombre immense et sous le ciel béni,
                        Quelque chose d’heureux chanter dans l’infini."</p>
                        <p>Victor Hugo - Toute la lyre (1868)</p>
                </div> <!-- fin de classe droite -->

                <div class="clear"></div>

               <div class="droite">
                    <div class="image">
                        <figure><img src="../back/img/image715.JPG" alt="Image ML7"><figcaption>Soirée théâtre</figcaption></figure>
                    </div><!-- fin de classe image-->
               </div><!-- fin de classe droite -->

               <div class="gauche">
                    <p>Si pour lutter contre une maladie on donne une infinité de remèdes, cela signifie que la maladie est incurable.

                </p><p>Anton Tchekhov - LA CERISAIE.</p>
                <p>" Chacun ne peut juger que d'après soi-même. "
                </p>
                <p>Fiodor Dostoïevski - Les démons (1871)</p>
                                </div> <!-- fin de classe droite -->

                <div class="clear"></div>
           </div><!-- fin de classe block-->
            <div class="clear"></div>
    </section><!-- fin section -->
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
    
   
    </div> <!-- fin de container -->
   
				
	

    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>


<?php require 'footer.php'; ?>

 