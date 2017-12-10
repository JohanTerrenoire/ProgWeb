<?php
//Enregistrer les données récupérées du formulaire
try {
  //Connexion à la base de données.
  $user = 'list';//L'utilisateur pour se connecter
  $mdp = 'passwd';//Son mot de passe
  $machine = 'localhost';//Adresse de la machine où est stockée la base
  $basename = 'ProgWeb';//Nom de la base de données
  $bdd = new PDO('mysql:host='.$machine.';dbname='.$basename.';charset=utf8', $user, $mdp);

  //Préparation de la requête et exécution
  $req = $bdd->prepare('INSERT INTO liste(id, item) VALUES(:id, :item)');//Preparer la requête
  $req->bindParam(':id', $idbdd);//Attribuer le paramètre ID
  $req->bindParam(':item', $ajoutbdd);//Attribuer le paramètre item
  $idbdd = 'null';//Définir la valeur du paramètre ID
  $ajoutbdd = $_POST['item'];//Définir la valeur du paramètre item
  $req->execute();//Exécuter la requête

} catch (Exception $e) {
  //En cas d'erreur d'ouverture de la base, afficher les erreurs.
  die('Erreur : ' . $e->getMessage());
}
//Renvoyer vers la page d'accueil
header('Location: accueil.php');
 ?>
