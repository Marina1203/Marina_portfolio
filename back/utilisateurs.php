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
if (isset($_POST['prenom']) && $_POST['nom'] != '' && $_POST['email'] != ''&& $_POST['site'] != ''&& $_POST['site2'] != '' && $_POST['telephone'] != '' && $_POST['portable'] != ''&& $_POST['pseudo'] != '' && $_POST['mdp'] != ''&& $_POST['age'] != '' && $_POST['anniversaire'] != ''&& $_POST['genre'] != '' && $_POST['civilite'] != ''&& $_POST['adresse'] != '' && $_POST['code_postal'] != ''&& $_POST['ville'] != '' && $_POST['pays'] != ''&& $_POST['commentaires'] != '') // Si on à reçu un nouveau utilisateur
{
    $prenom = addslashes ($_POST['prenom']);
    $nom = addslashes ($_POST['nom']);
    $email = addslashes ($_POST['email']);
    $site = addslashes ($_POST['site']);
    $site2 = addslashes ($_POST['site2']);
    $telephone = addslashes ($_POST['telephone']);
    $portable = addslashes ($_POST['portable']);
    $pseudo = addslashes ($_POST['pseudo']);
    $mdp = addslashes ($_POST['mdp']);
    $age = addslashes ($_POST['age']);
    $anniversaire = addslashes ($_POST['anniversaire']);
    $genre = addslashes ($_POST['genre']);
    $civilite = addslashes ($_POST['civilite']);
    $adresse = addslashes ($_POST['adresse']);
    $code_postal = addslashes ($_POST['code_postal']);
    $ville = addslashes ($_POST['ville']);
    $pays = addslashes ($_POST['pays']);
    $commentaires = addslashes ($_POST['commentaires']);
    $id_utilisateur = addslashes ($_POST['id_utilisateur']);
   
   

    $pdoCV -> exec(" INSERT INTO t_utilisateurs VALUES ('$prenom', '$nom', '$email', '$site','$site2','$telephone', '$portable', '$pseudo', '$mdp', '$age','$anniversaire', '$genre', '$civilite', '$adresse', '$code_postal', '$ville', '$pays', '$commentaires')");

    header("location: ../admin/utilisateurs.php");
     
    exit();     
}// ferme le if isset $_POST
//******************************/

// Suppression d'un élément(ici : competence) de la BDD
if (isset($_GET['id_utilisateur'])) // On récupére ce que je supprime dans l'url par son id
{
    $efface = $_GET['id_utilisateur']; // je passe l'id dans une variable $efface
    $sql = " DELETE FROM t_utilisateurs WHERE id_utilisateur='$efface' "; // Requête pur supprimer un élément de la BDD

    $pdoCV -> query($sql); // On peut le faire avec exec() également

    header("location: ../admin/utilisateurs.php");
}// ferme le if isset $_GET pour suppression?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UTILISATEURS</title>
</head>
<body>
<div class="jumbotron"><h1>Les utilisateurs et insertion d'un nouveau utilisateur</h1></div><!-- fin de jumbotron -->
<?php require 'inc/navigation.php'; ?>
<div class="container-fluid">


        
        <?php 
            // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
            $sql = $pdoCV -> prepare("SELECT * FROM t_utilisateurs");
            $sql -> execute();
            $nbr_utilisateurs = $sql -> rowCount();
        ?>
    
    <div class="">
              <table border="2" class="table table-striped">
              <caption>La liste des utilisateurs : <?php echo $nbr_utilisateurs; ?></caption><br>
              <thead class="thead-dark">
                    <tr>
                    <th class="bgvert">Prenom</th>
                    <th class="bgvert">Nom</th>
                    <th class="bgvert">Email</th>
                    <th class="bgvert">Site</th>
                    <th class="bgvert">Site2</th>
                    <th class="bgvert">Téléphone</th>
                    <th class="bgvert">Portable</th>
                    <th class="bgvert">Pseudo</th>
                    <th class="bgvert">Mdp</th>
                    <th class="bgvert">Age</th>
                    <th class="bgvert">Anniversaire</th>
                    <th class="bgvert">Genre</th>
                    <th class="bgvert">Civilité</th>
                    <th class="bgvert">Adresse</th>
                    <th class="bgvert">Code_postal</th>
                    <th class="bgvert">Ville</th>
                    <th class="bgvert">Pays</th>
                    <th class="bgvert">Commentaires</th>
                    <th class="bgvert">Modifier</th>
                    <th class="bgvert">Suppression</th>
                    </tr>
              </thead>
              <tbody class="table  table-hover">
              <?php while($ligne_utilisateur=$sql->fetch())
              {?>
                    <tr class="table bgloisir">
                    <td class="bgvert"><?php echo $ligne_utilisateur['prenom']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['nom']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['email']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['site']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['site2']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['telephone']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['portable']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['pseudo']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['mdp']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['age']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['anniversaire']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['genre']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['civilite']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['adresse']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['code_postal']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['ville']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['pays']; ?></td>
                    <td class="bgvert"><?php echo $ligne_utilisateur['commentaires']; ?></td>
                    <td class="bgvert"><a href="modif_utilisateur.php?id_utilisateur=<?php echo $ligne_utilisateur['id_utilisateur']; ?>">Modif</a></td>
                    <td class="bgvert"><a href="utilisateurs.php?id_utilisateur=<?php echo $ligne_utilisateur['id_utilisateur']; ?>">Suppr</a></td>
                    </tr>
                    <?php
                }
                ?>




              </tbody>
              </table>
       </div>
        <hr>
        <h2>Formulaire d'insertion d'un utilisateur</h2>
        
        <!-- Insertion d'un nouveau utilisateur -->
        <form action="utilisateurs.php" method="post">
            <div class="form-group col-sm-3">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" class="form-control bgvert" placeholder="Prenom" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control bgvert" placeholder="Nom" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control bgvert" placeholder="Email" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="site">Site</label>
                <input type="text" name="site" class="form-control bgvert" placeholder="Site" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="site2">Site2</label>
                <input type="text" name="site" class="form-control bgvert" placeholder="Site" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="telephone">Telephone</label>
                <input type="text" name="telephone" class="form-control bgvert" placeholder="Telephone" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="portable">Portable</label>
                <input type="text" name="portable" class="form-control bgvert" placeholder="Portable" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="nom" class="form-control bgvert" placeholder="Nom" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="mdp">Mdp</label>
                <input type="text" name="mdp" class="form-control bgvert" placeholder="Mdp" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control bgvert" placeholder="Age" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="anniversaire">Anniversaire</label>
                <input type="text" name="anniversaire" class="form-control bgvert" placeholder="Anniversaire" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="genre">Genre</label>
                <select name="genre" id="genre" class="form-control bgvert">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="civilite">Civilite</label>
                <select name="civilite" id="civilite" class="form-control bgvert">
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control bgvert" placeholder="Adresse" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="code_postal">Code_postal</label>
                <input type="text" name="code_postal" class="form-control bgvert" placeholder="Code_postal" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="ville">Ville</label>
                <input type="text" name="ville" class="form-control bgvert" placeholder="Ville" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="pays">Pays</label>
                <input type="text" name="pays" class="form-control bgvert" placeholder="Pays" required>
            </div>
            <div class="form-group col-sm-3">
                <label for="commentaires">Commentaires</label>
                <input type="text" name="commentaires" class="form-control bgvert" placeholder="Commentaires" required>
            </div>
            <div class="form-group col-sm-3">
                <button type="submit" class="btn btn-info btn-lg">Insérer un utilisateur</button>
            </div>
            </form>
</div> <!-- fin de container -->

<?php require 'footer.php'; ?>

