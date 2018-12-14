<?php  require 'connexion.php';

session_start();// a mettre dans toutes les pages de l'admin

//traitement pour la connexion 
if(isset($_POST['connexion'])){
    $email=addslashes($_POST['email']);
    $mdp=addslashes($_POST['mdp']);

    $sql=$pdoCV->prepare("SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp'");
    //on verifie email et mot de passe
    $sql->execute();
    $nbr_utilisateur = $sql -> rowCount();//on compte si il est dans la BDD, le compte repond 0 si il n'y est pas et repond 1 si il y est
  // echo $nbr_utilisateur;
    if($nbr_utilisateur == 0){
      echo '<p>Erreur</p>';
    }else{
      $ligne_utilisateur =$sql -> fetch();

      $_SESSION['connexion_admin']='connecte'; //connexion pour admin
      $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
      $_SESSION['email']=$ligne_utilisateur['email'];
      $_SESSION['nom']=$ligne_utilisateur['nom'];
      $_SESSION['mdp']=$ligne_utilisateur['mdp'];

      echo $ligne_utilisateur['nom'];

     header('location:index.php'); 
        
    }

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.autentification.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Anton|Lemonada:300,400|Oswald:300,400" rel="stylesheet"> 
    <title>Admin : authentification</title>
</head>

    <body class="text-center bgblue">
    <form action="autentification.php" method="post" class="form-signin">
    <h1>Admin : authentification</h1>
      <h1 class="h3 mb-3 font-weight-normal">Authentifiez-vous</h1>
      <label for="email" class="sr-only">Votre email</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Votre email svp" required autofocus>

      <label for="mdp" class="sr-only">Mot de passe</label>
      <input type="password" name="mdp" id="inputPassword" class="form-control" placeholder="Votre mot de passe svp" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="se souvenir de moi"> Se souvenir de moi
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="connexion" type="submit">Se connecter</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
    
</html>