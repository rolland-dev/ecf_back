<?php
// XX a changer dans le nom du fichier "PENSER a faire des copies du fichier si besoin" par le nom de la table a creer

// premiÃ¨re chose la connexion
require_once '../connect.php';

// la requete sql a changer par ce que vous avais besoin je vais faire une table TYPE USERS 

$sql = "CREATE TABLE Emprunts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    id_livre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_user) REFERENCES Users(id),
    FOREIGN KEY (id_livre) REFERENCES Livres(id)
  )";

// si la requete n'est pas valide 
if(!mysqli_query($conn,$sql)){
    echo " Erreur de creation de emprunts";
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