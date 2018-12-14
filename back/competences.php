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

// Insertion d'un élément en BDD
if (isset($_POST['competence']) && $_POST['niveau'] != '' && $_POST['categorie'] != '') // Si on à reçu une nouvelle compétence
{
    $competence = addslashes ($_POST['competence']);
    $niveau = addslashes ($_POST['niveau']);
    $categorie = addslashes ($_POST['categorie']);

    $pdoCV -> exec(" INSERT INTO t_competences VALUES (NULL, '$competence', '$niveau', '$categorie', '1')");

    header("location: ../back/competences.php");
     
    exit();     
}// ferme le if isset $_POST
//******************************/

// Suppression d'un élément(ici : competence) de la BDD
if (isset($_GET['id_competence'])) // On récupére ce que je supprime dans l'url par son id
{
    $efface = $_GET['id_competence']; // je passe l'id dans une variable $efface
    $sql = " DELETE FROM t_competences WHERE id_competence='$efface' "; // Requête pur supprimer un élément de la BDD

    $pdoCV -> query($sql); // On peut le faire avec exec() également

    header("location: ../back/competences.php");
}// ferme le if isset $_GET pour suppression


$order = '';
if(isset($_GET['order']) && isset($_GET['column'])){

	if($_GET['column'] == 'competence'){
		$order = ' ORDER BY competence';
	}
	elseif($_GET['column'] = 'niveau'){
		$order = ' ORDER BY niveau';
	}
	elseif($_GET['column'] == 'categorie'){     
		$order = ' ORDER BY categorie';
	}
	if($_GET['order'] == 'asc'){      
		$order.= ' ASC';
	}
	elseif($_GET['order'] == 'desc'){
		$order.= ' DESC';
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
<body>
<div class="jumbotron">
<h1>Les compétences et insertion d'un nouvelle compétence</h1></div>
<?php require 'inc/navigation.php'; ?>
    <div class="container">
            <?php 
                // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
                $sql = $pdoCV -> prepare("SELECT * FROM t_competences" . $order);
                $sql -> execute();
                $nbr_competence = $sql -> rowCount();
            ?>
        
            <div class="voir">
                <table border="2"  class="table table-striped" >
                <caption>La liste des compétences : <?php echo $nbr_competence; ?></caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Compétences<a href="competences.php?column=competence&order=asc">Croissant</a>|<a href="competences.php?column=competence&order=desc">Décroissant</a> </th> 
                            <th scope="col">Niveaux<a href="competences.php?column=niveau&order=asc">Croissant</a>|<a href="competences.php?column=niveau&order=desc">Décroissant</a></th> 
                            <th scope="col">Catégorie<a href="competences.php?column=categorie&order=asc">Croissant</a>|<a href="competences.php?column=categorie&order=desc">Décroissant</a></th> 
                            <th scope="col">Supprimer </th> 
                            <th scope="col">Modifier </th> 
                        </tr>        
                    </thead>
                    <?php 
                    while($ligne_competence = $sql -> fetch())
                        {
                    ?>
                    <tbody class=" table table-hover">
                        <tr class="table table-hover">
                            <td class="bgvert"><?php echo $ligne_competence['competence']; ?></td>
                            <td class="bgvert"><?php echo $ligne_competence['niveau']; ?>/100</td>
                            <td class="bgvert"><?php echo $ligne_competence['categorie']; ?></td>
                            <td class="bgvert">
                                <a href="competences.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">Supprimer</a> 
                            </td>
                            <td class="bgvert">
                                <a href="modif_competence.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">Modifier</a> 
                            </td>
                        </tr>
                    <?php 
                        } // Fin du while 
                    ?>
                    </tbody>
                </table>        
            </div>
            <hr>
            <h2>Formulaire d'insertion d'une compétence</h2>
            
            <!-- Insertion d'un nouveau compétence -->
            <form action="competences.php" method="post">
                <div class="form-group col-sm-6">
                    <label for="competence">Compétence</label>
                    <input type="text" name="competence" class="form-control bgvert" class="bgvert" placeholder="Nouvelle compétence" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="niveau">Niveau</label>
                    <input type="text" name="niveau" class="form-control bgvert"  placeholder="Niveau en chiffre sur 100" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" class="form-control bgvert" id="categorie">
                        <option value="Front">Front</option>
                        <option value="Gestion de projet">Gestion de projet</option>
                        <option value="Back">Back</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-info btn-lg">Insérer une compétence</button>
                </div>
                </form>
</div>    

<?php require 'footer.php'; ?>
