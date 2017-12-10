<?php
  //Connexion à la base de données.
  $user = 'list';//L'utilisateur pour se connecter
  $mdp = 'passwd';//Son mot de passe
  $machine = 'localhost';//Adresse de la machine où est stockée la base
  $basename = 'ProgWeb';//Nom de la base de données
  $bdd = new PDO('mysql:host='.$machine.';dbname='.$basename.';charset=utf8', $user, $mdp);
  $reponse = $bdd->query("SELECT MAX(id) from liste;");//Requête pour récupérer l'ID Maximum
  $donnees = $reponse->fetch();//Récupération des données de la requête
  $req = $bdd->exec("DELETE FROM liste WHERE id=(".$donnees[0].");");
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8" />
          <meta http-equiv="refresh" content="0;URL=accueil.php">
         <link rel="stylesheet" href="style.css" />
         <title>To Do List</title>
     </head>
     <body>
       <div id="Titre"><h1>My ToDo List</h1></div>
       <h3> Item supprimé !</h3>
       <a href="accueil.php"><input type="button" value="Revenir à la page d'accueil"/></a>
     </body>
 </html>
