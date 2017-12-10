<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>To Do List</title>
    </head>

    <body>
    <div id="Titre"><h1>My ToDo List</h1></div>
    <div id="liste">
      <?php
          try {
            //Connexion à la base de données.
            $user = 'list';//L'utilisateur pour se connecter
            $mdp = 'passwd';//Son mot de passe
            $machine = 'localhost';//Adresse de la machine où est stockée la base
            $basename = 'ProgWeb';//Nom de la base de données
            $bdd = new PDO('mysql:host='.$machine.';dbname='.$basename.';charset=utf8', $user, $mdp);
            $tablename = 'liste';//Nom de la table
          } catch (Exception $e) {
            //En cas d'erreur d'ouverture de la base, afficher les erreurs.
            die('Erreur : ' . $e->getMessage());
          }
          try {
            $reponse = $bdd->query('SELECT * FROM liste');
          } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
          }
          echo"<ul>";
            while ($donnees = $reponse->fetch()){
              print_r("<li>".$donnees['item']."</li>");
            }
          echo"</ul>";
      ?>
    </div>
    <!--L'ajout d'un enregistrement-->
    <div id="ajout">
      <h3>Ajouter à ma liste</h3>
      <form method="post" action="envoyerDonnees.php">
        <input type="text" placeholder="Tapez ici " name="item"/>
        <input type="submit" value="Ajouter"/>
      </form>
    </div>
    <!--La suppression du dernier enregistrement-->
    <div id="supprimer">
      <form method="post" action="supprimer.php">
        <input type="submit" value="Supprimer" />
      </form>
    </br>
      <form method="post" action="supprimerAll.php">
        <input type="submit" value="Tout supprimer" />
      </form>
    </div>
    </body>
</html>
