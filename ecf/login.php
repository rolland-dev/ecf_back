<?php
require_once '.././securite_et_tests/test_session_log.php';
// fichier de sécurité 
require_once '.././securite_et_tests/security.php';

if($connect=="yes"){
    header('location:../index.php');
    exit();
}

//on declare les variables de base 
$err=false;
//on les defini sur '' pour empeche des erreur 
$mail_error=''; 
$password_error=''; 
$msg_badlogin ='';
//on les defini sur '' pour empeche des erreur 
$email=''; 
$password=''; 


if(isset($_POST['btn_connexion'])){
    // if empty = si mon $post est vide
    if(empty($_POST['email'])){
        // petit message pour les utilisateur 
        $mail_error="l'e-mail est obligatoire";
        // on verrifier si il ya une erreur et on passe a true si il y en a une 
        $err=true;
    }else{
        // $db correspond à la connexion à la base de données (voir mysqli_connect)
        
          
        // si c'est pas vide donc on recupere la valeur du $post'email' dans un $email
        // on securise IMPORTANT avec le protect_montexte des INJECTION merci d avoir suivi 
        $email = protect_montexte($_POST['email']);
        // on verifie que l'email est bien du type xxx@yyy.zz 
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email='';
            $mail_error = "L'email est invalide ";
            $err=true;
        }
    }
    //comme au dessus sauf que l'on verifie que la longueur du mots de passe est de plus de 7 caractere vous pouvez changer le "8"
    if(empty($_POST['password'])||strlen($_POST['password'])<8){
        $password_error = "Le mots de passe est obligatoire (8 caractère minimum)";
        $err=true;
    }else{
        // $db correspond à la connexion à la base de données (voir mysqli_connect)
        

        $password = protect_montexte($_POST['password']);
    }
    // on verifier qu'il n'y a pas d'erreur que la variable et different de true
    // if ($err) meme chose que if ($err==true)
    // if (!$err) meme chose que if ($err==false)
    //si $err = false alors on fait ce qu'il a l'interieur du if 
    if(!$err){
        require_once '../ecf/connect.php';
        //on recupere tout les utilisateur de la table users
        $sql = 'SELECT * FROM users';
        // on lance la requete
        $res=mysqli_query($conn,$sql);
        //si ma requete et valide "vrai" "true" pour quentin il aime bien
        if($res){
            //on recuperer tout les utlisateurs
            $row = mysqli_fetch_all($res,MYSQLI_ASSOC);
            //on ferme la connexion a la bdd
            mysqli_close($conn);
            //la on teste !!
            foreach( $row as $value ){
                // si $email = a la valeur d'une email du tableau  ET que $password = a la valeur du password de la colonne mdp associer 
                if( $email == $value['email'] && password_verify($password,$value['mdp'])){
                    //on recuepre tout les valeurs dans la bdd pour les inserer dans $_SESSION qui lui est propre
                    $_SESSION['email'] = $value['email'];
                    $_SESSION['ROLE'] = $value['ROLE'];
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['connexion'] = 'yes';
                   
                    header('location: .././ecf/index.php');
                }else{
                    //si ya pas de correspondance email et mdp
                    // la variable $msg_badlogin ou pouvez la definir comme vous voulez
                    $msg_badlogin = "L'e-mail ou le mots de passe et incorrecte !!!";
                }
            }  
        }else{
            //si la requete $res pas bonne
         echo 'un souci avec select ??';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
    <?php  
        // le nom de votre page ici qui sera afficher en haut de votre navigateur
        $titre='connexion'; 
        include_once '.././includes/html_head.php';
    ?>    
    <body>
        <?php 
            include_once '.././includes/html_menu.php';
        ?>
        <main>
            <h1> <?= $titre ?> </h1>
           <div>
                <form action="login.php" method="post">
                    <fieldset>
                        <legend> Connexion : </legend>

                        <label for="email">E_mail</label>
                        <input type="email" name="email" id="email" placeholder="Votre E-mail" value="<?php echo $email; ?>" required="">
                        <span> <?php echo $mail_error; ?> </span>
                        
                        <label for="password">Mots de passe</label>
                        <input type="password" name="password" id="password" placeholder="Votre Mot de passe" value="<?php echo $password;  ?>" required="">
                        <span> <?php echo $password_error; ?> </span>

                        <button id="btn_connexion" name="btn_connexion" > Connexion </button>
                        
                        <div>
                            <span> <?php echo $msg_badlogin; ?> </span>
                        </div>
                    </fieldset>
                </form>
           </div>
        </main>
        <?php 
            include_once '.././includes/footer.php';
        ?>
        <?php 
            // include_once './php/html_script.php';
        ?>
    </body>
</html>