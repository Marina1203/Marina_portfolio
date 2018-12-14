<?php 
 // connexion à la BDD

 $host='localhost'; //le chemin vers la base de données
 $database='portfolio_marina'; //
 $user='root';//le nom de l'utilisateur pour se connecter
 $psw=''; // mot de passe de l'utilisateur local (sur PC)
//  $psw='root' mot de passe local (pour Mac)


$pdoCV = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw); //$pdoCV est le nom de la variable pour 
//la connexion à la BDD qui nous sert 
//partout ou on doit se servir de cette connexion

$pdoCV->exec('SET NAMES utf8');
?>