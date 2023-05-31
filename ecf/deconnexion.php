<?php
session_start();

$_SESSION['connexion'] ='no';

// on vide les variable $_SESSION

unset($_SESSION['email']);
unset($_SESSION['ROLE']);
//si d'autre $_SESSION les mettre ici

//  ET / OU

session_destroy();

header('location: ../index.php');

?>