<?php
// forcement quand vous allez deployer sur un serveur  
// c'est donnée vous seront fournie par l'hebergeur

// chemin de connection a la bdd ACHANGER lors du déployement "si besoin"
$host="localhost";
// nom d'acces de la bdd ACHANGER lors du déployement
$user="root";
// mots de passe d'acces a la bdd ACHANGER lors du déployement
$pass="";

// ouvrir la connexion a la bdd
$conn = mysqli_connect($host,$user,$pass);
 
//si ma connection et pas bonne 
if(!$conn){
    die("connexion erreur : ".mysqli_connect_error());
}

// creation de la BDD
//a changer le "nombdd" par votre NOM DE BDD
$sql = "create DATABASE if not exists site_biblio "; 
// on verifie si la BDD a bien etai cree
if(mysqli_query($conn,$sql)){
    echo " la BDD a été crée";
}else{
    echo " Création Echouée";
}
// on referme la bdd
mysqli_close($conn);

////////////////////////////////////////////////////////////////////////////////////////
//// ce fichier est a lancer une seule fois SAUF Si la creation de la BDD a ECHOUER ////
////////////////////////////////////////////////////////////////////////////////////////
?>

