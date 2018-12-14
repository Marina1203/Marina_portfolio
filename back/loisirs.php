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

//insertion d'un loisir
if(isset($_POST['loisir'])){//si on a reçu un nouveau loisir
    if($_POST['loisir'] !=''){
        $loisir = addslashes($_POST['loisir']);
        $pdoCV->exec("INSERT INTO t_loisirs VALUES (NULL,'$loisir','1')");

        header("location:../back/loisirs.php");
        exit();
    } //ferme le if n'est pas vide

} //ferme le if isset

//suppression d'un élement de la BDD
if(isset($_GET['id_loisir'])){//on recupère le loisir dans l'url par son id
    $efface = $_GET['id_loisir']; //je passe l'id dans une variable $efface

    $sql =" DELETE FROM t_loisirs WHERE id_loisir = '$efface'";
    $pdoCV->query($sql);//on peut le faire avec exec également
    
    header("location:../back/loisirs.php");
}//ferma le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : les loisirs</title>
</head>
<body>

<div class="jumbotron"><h1>Les loisirs et insertion d'un nouveau loisir</h1></div>
<?php require 'inc/navigation.php'; ?>
<div class="container">
    <?php
          //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV ->prepare("SELECT * FROM t_loisirs");
          $sql -> execute();
          $nbr_loisirs=$sql->rowCount();
          ?>
       <div class="">
              <table border="1" class="table table-striped">
              <caption>La liste des loisirs : <?php echo $nbr_loisirs; ?></caption><br>
              <thead class="thead-dark">
                    <tr>
                    <th>Loisirs</th>
                    <th>Modifier</th>
                    <th>Suppression</th>
                    </tr>
              </thead>
              <tbody class="table  table-hover">
              <?php while($ligne_loisir=$sql->fetch())
              {?>
                    <tr class="table">
                    <td class="bgvert"><?php echo $ligne_loisir['loisir']; ?></td>
                    <td class="bgvert"><a href="modif_loisir.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?>">Modif</a></td>
                    <td class="bgvert"><a href="loisirs.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?>">Suppr</a></td>
                    </tr>
                    <?php
                }
                ?>




              </tbody>
              </table>
       </div>
    
          <hr>
          <!-- insertion d'un nouveau loisir -->
        <form action="loisirs.php" method="POST">
                <div class="form-group col-sm-6">
                    <label for="loisir">Loisir</label>
                    <input type="text" name="loisir"  class="form-control bgvert" placeholder="Nouveau loisir" required>
                </div><br>
                <button type="submit" class="btn btn-info btn-lg">Insérer un loisir</button>
        </form>
</div>

<?php require 'footer.php'; ?>
    
