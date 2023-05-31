<?php
// XX a changer dans le nom du fichier "PENSER a faire des copies du fichier si besoin" par le nom de la table a creer

// premiÃ¨re chose la connexion
require_once '../connect.php';

// la requete sql a changer par ce que vous avais besoin je vais faire une table TYPE USERS 

$sql =" create table if not exists users(
    id int(6) unsigned auto_increment primary key,
    email varchar(50) not null unique,
    mdp text not null,
    ROLE varchar(15) not null,
    cgu varchar(15) not null
    )";

// si la requete n'est pas valide 
if(!mysqli_query($conn,$sql)){
    echo " Erreur de creation de USERS";
}



// si voua avez besoin de rajouter une colonne ou de modifier votre table 
// a changer le 'nomtable' le ADD par l'action souhaiter demandeer a alan pour plus d'info sinon google et votre ami  ^^
// le ALTER TABLE et obligatoire le reste c est a vous de construire votre requete 

// $sql = 'ALTER TABLE `NomTABLE` ADD column `xx` not null';

/////////////////////////////
// a faire si ALTER TABLE  //
//mysqli_query($conn,$sql);//
/////////////////////////////

$conn -> close();

?>