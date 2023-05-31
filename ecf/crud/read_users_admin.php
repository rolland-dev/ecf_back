<?php
// connexion  
require_once '.././connect.php';

// on va faire pour la table users 

// on fait cassiment tout le temps un select * c'est rare de faire autre chose pour "voir la table"
$sql= " SELECT * FROM users";
// c est des valeur defini par les CODEURS $sql $res etc...
$res = mysqli_query($conn,$sql);

//
if ($res){
    //ici on fait un tableau dans le $row
    $row=mysqli_fetch_all($res,MYSQLI_ASSOC);

    //la c est un tableaeau d'objet
    // $row=mysqli_fetch_array($res,MYSQLI_ASSOC);

    //fermer la connexion a la bdd
    mysqli_close($conn);

    //affichage

    //rajouter des class id autre ici selon vos besoin

    //la vous faite votre affichage pour moi "tableau" tout est achanger ou pas suivant ce que vous voulez faire
    echo'<table>';
    echo'<th> id </th>';
    echo'<th> email </th>';
    echo'<th> role </th>';
    //inserer vos autre champs de tableau
    foreach ($row as $value){
    echo'<tr>';    
    echo'<td>'.$value['id'].'</td>' ;   
    echo'<td>'.$value['email'].'</td>' ;   
    echo'<td>'.$value['ROLE'].'</td>' ;   
    echo'</tr>';   
    // les lignes sont a ajouter et a completer si par exemple vous voulez mettre des bouton ^^
    }
    echo'</table>';
    //fin affichage  pour info cette parti la vous la faite comme bon vous semblera ^^ sa c est un truc sommaire et on peut rien faire dessus

}
?>