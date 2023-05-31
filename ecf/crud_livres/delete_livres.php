<?php
session_start();
// connexion  
require_once '../connect.php';

//delete
$id=$_POST['id_livre'];

// requete de suppression d'une ligne 
$sql="DELETE FROM livres WHERE id=$id";

// si la requete est valide ou echoue
if ( mysqli_query($conn,$sql)){
    echo "suppression OK";
}else{
    echo 'suppresion non faites !!!';
}

//fermer la connexion 
mysqli_close($conn);
//redirection
// a vous de voir ou vous voulez allez pour ma part sa sera la page admin qu'on fera apres 
header("location : a definir");

//pour INFO  cette page peut etre utlisÃ© par plusieur fichier different a vous dans faire des copies ou autre ^^
// ex : l'admin peut supprimer le compte d'un utilisateur 
// mais le client peut decider de supprimer sont propre compte ... 
// DEUX personne differente donc surement 2 fois ce fichier ou plus ...
?>
