<?php
// forcement quand vous allez deployer sur un serveur  
// c'est donnée vous seront fournie par l'hebergeur

// chemin de connection a la bdd ACHANGER lors du déployement "si besoin"
$host="localhost";
// nom d'acces de la bdd ACHANGER lors du déployement
$user="root";
// mots de passe d'acces a la bdd ACHANGER lors du déployement
$pass="";
// nom de la bdd A CHANGER par la votre 
// A CHANGER
$db="site_biblio";

// ouvrir la connexion
$conn = mysqli_connect($host,$user,$pass,$db);

// si $host et/ou $user et/ou $pass et/ou $bd n'est pas reconnu et lier ensemble retour d'une erreur.
if (mysqli_connect_error()){
    die('connexion echouée');
}

// fermer la connexion
// mysqli_close($conn);
?>