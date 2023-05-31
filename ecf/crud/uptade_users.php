<?php
session_start();
// connexion 
require_once './connect.php';
require_once '.././securite_et_tests/security.php';

//update
// en vrai la parti connexion ou fait pas trop de update dessus mais vous aurai une trame  ^^

$email_ok = protect_montexte($_POST['email']);
$pass = protect_montexte($_POST['password']);

$pass_ok = password_hash($pass,PASSWORD_BCRYPT);

//la ligne qui change d'une CREATE_USERS
$sql ='UPDATE users SET (email,mdp) VALUES (?,?)';

//pour els commentaire voir la page Create_users
if($stmt= mysqli_prepare($conn,$sql)){
    mysqli_stmt_bind_param($stmt,"ss",$param_email,$param_mdp);

    $param_email=$email_ok;
    $param_mdp=$pass_ok;
    
    if(mysqli_stmt_execute($stmt)){
        mysqli_close($conn);
        // c est vous qui voyez poue vous voulez repartir ^^
        header('location: index.php ');
        exit();
    }

}

