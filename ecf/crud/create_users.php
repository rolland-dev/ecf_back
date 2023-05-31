<?php
session_start();
// connexion
require_once '../connect.php';
// // function de securité
require_once '../.././securite_et_tests/test_session_log.php';

//evidament un CRUD pour UNE TABLE pour faire simple !! 


//on declare les variables de base 
$err = false;
$_SESSION['mail_error'] = '';
$_SESSION['pass_error'] = '';

function protect_montexte($param){
    $param= trim($param);
    $param= stripslashes($param);
    $param= htmlspecialchars($param);
    return $param;
}

if (empty($_POST['email'])) {
    $_SESSION['mail_error'] = "Entrer un email";
    $err = true;
} else {
    $email_ok = protect_montexte($_POST['email']);

    if (!filter_var($email_ok, FILTER_VALIDATE_EMAIL)) {
        $email_ok = '';
        $_SESSION['mail_error'] = "Mail invalide";
        $err = true;
    }
}

if (empty($_POST['password']) || strlen($_POST['password']) < 8) {
    $_SESSION['pass_error'] = 'Mot de passe obligatoire (8 caractères minimum)';
    $err = true;
} else {
    $pass = protect_montexte($_POST['password']);
}

if (!$err) {
    $pass_ok = password_hash($pass, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (email, mdp, ROLE, cgu) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_mdp, $param_role, $param_cgu);
        
        $param_cgu = $_POST['cgu'];
        $param_email = $email_ok;
        $param_mdp = $pass_ok;
        $param_role = "USER";

        if (mysqli_stmt_execute($stmt)) {
            mysqli_close($conn);
            header("location: ../login.php");
            exit();
        } else {
            echo "Une erreur s'est produite lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    } else {
        echo "Une erreur s'est produite lors de la préparation de la requête : " . mysqli_error($conn);
    }
} else {
    header("location: ../inscription.php");
    exit();
}
?>

?>