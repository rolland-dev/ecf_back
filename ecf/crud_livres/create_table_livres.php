<?php 

require_once '.././connect.php';

?>

<?php

$sql= 
  "CREATE TABLE IF NOT EXISTS Livres (
  id_livre int(6) unsigned auto_increment primary key,
  titre varchar(164) DEFAULT NULL,
  auteur varchar(63) DEFAULT NULL,
  editeur varchar(96) DEFAULT NULL,
  categories varchar(50) DEFAULT NULL)";

if(!mysqli_query($conn,$sql)){
  echo " Erreur de creation de livres";
}



$conn -> close();
?>


