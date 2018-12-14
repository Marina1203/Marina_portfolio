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



//insertion d'une langue
if(isset($_POST['langue'])){//si on a reçu un nouvelle formation
    if($_POST['langue'] !=''){
        $langue = addslashes($_POST['langue']);
        $niveau = addslashes($_POST['niveau']);
        $pdoCV->exec("INSERT INTO t_langues VALUES (NULL,'$langue','$niveau','1')");

        header("location:../back/formations.php");
        exit();
    } //ferme le if n'est pas vide

} //ferme le if isset

//suppression d'un élement de la BDD
if(isset($_GET['id_langue'])){//on recupère la formation dans l'url par son id
    $efface = $_GET['id_langue']; //je passe l'id dans une variable $efface

    $sql =" DELETE FROM t_langues WHERE id_langue = '$efface'";
    $pdoCV->query($sql);//on peut le faire avec exec également
    
    header("location:../back/langues.php");
}//ferma le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Admin : les langues</title>
</head>
<body>

<div class="jumbotron">
<h1>Les langues et insertion d'une nouvelle langue</h1></div>
<?php require 'inc/navigation.php'; ?>
    
<div class="container">

    <?php
          //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV ->prepare("SELECT * FROM t_langues");
          $sql -> execute();
          $nbr_langues=$sql->rowCount();
          ?>
       <div class="">
              <table border="2" class="table table-striped">

              <caption>La liste des langues : <?php echo $nbr_langues; ?></caption><br>
              <thead class="thead-dark">
                    <tr>
                    <th>Langues</th>
                    <th>Niveau</th>
                    <th>Modifier</th>
                    <th>Suppression</th>
                    </tr>
              </thead>
              <tbody class="table  table-hover">
              <?php while($ligne_langue=$sql->fetch())
              {?>
                    <tr class="table table-hover">
                    <td class="bgvert"><?php echo $ligne_langue['langue']; ?></td>
                    <td class="bgvert"><?php echo $ligne_langue['niveau']; ?></td>
                    <td class="bgvert"><a href="modif_langue.php?id_langue=<?php echo $ligne_langue['id_langue']; ?>">Modif</a></td>
                    <td class="bgvert"><a href="langues.php?id_langue=<?php echo $ligne_langue['id_langue']; ?>">Suppr</a></td>
                    </tr>
                    <?php
                }
                ?>




              </tbody>
              </table>
       </div>
    
          <hr>
          <!-- insertion d'une nouvelle langue-->
        <form action="langues.php" method="POST">
                <div class="form-group col-sm-6">
                    <label for="langue">Langues</label>
                    <input type="text" name="langue" class="form-control bgvert"  placeholder="Nouvelle langue" required>
                </div><br>
                <div class="form-group col-sm-6">
                        <label for="niveau">Niveau</label>
                        <input type="text" name="niveau" class="form-control bgvert" placeholder="Niveau" required>
                    </div><br>
                <button type="submit" class="btn btn-info btn-lg">Insérer une langue</button>
        </form>
</div>
            
<?php require 'footer.php'; ?>
    
