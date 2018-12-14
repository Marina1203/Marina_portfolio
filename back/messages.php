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

//suppression d'un élement de la BDD
if(isset($_GET['id_message'])){//on recupère le message dans l'url par son id
    $efface = $_GET['id_message']; //je passe l'id dans une variable $efface

    $sql =" DELETE FROM t_messages WHERE id_message = '$efface'";
    $pdoCV->query($sql);//on peut le faire avec exec également
    
    header("location:../back/messages.php");
}//ferma le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Admin : les messages</title>
</head>
<body>

<div class="jumbotron">
<h1>Gestion de messages </h1></div>
<?php require 'inc/navigation.php'; ?>
    
<div class="container">

    <?php
          //requête pour compter et chercher plusieurs enregistrements on ne peut compter que si on a un prepare
          $sql = $pdoCV ->prepare("SELECT * FROM t_messages");
          $sql -> execute();
          $nbr_messages=$sql->rowCount();
          ?>
       <div class="">
              <table border="2" class="table table-striped">
              <caption>La liste de messages : <?php echo $nbr_messages; ?></caption><br>
              <thead class="thead-dark">
                    <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Suppression</th>
                    </tr>
              </thead>
              <tbody class="table  table-hover">
              <?php while($ligne_message=$sql->fetch())
              {?>
                    <tr class="table table-hover">
                    <td class="bgvert"><?php echo $ligne_message['nom']; ?></td>
                    <td class="bgvert"><?php echo $ligne_message['email']; ?></td>
                    <td class="bgvert"><?php echo $ligne_message['sujet']; ?></td>
                    <td class="bgvert"><?php echo $ligne_message['message']; ?></td>
                    <td class="bgvert"><a href="messages.php?id_message=<?php echo $ligne_message['id_message']; ?>">Suppr</a></td>
                    </tr>
                    <?php
                }
                ?>
              </tbody>
              </table>
       </div>
    
          <hr>

</div>
            
<?php require 'footer.php'; ?>
    
