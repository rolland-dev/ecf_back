<?php
require_once '.././securite_et_tests/test_session_log.php';

if($connect=="yes"){
    header('location:.././ecf/index.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="fr">

    <?php
        include_once '.././includes/html_head.php'
    ?>

<body>
    <?php
        include_once '.././includes/html_menu.php'
    ?>

    <main>
    <h1><?= $titre ?></h1>
    <form action= ".././ecf/crud/create_users.php" method="post">
        <fieldset>
            <legend>Inscription :</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Votre E-mail" required="">
            <span> <?php echo $mail_error; ?></span>
            <br>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required="">
            <span> <?php echo $password_error; ?></span>

            <!--si vous avez d'autre information a recuperer a vous d'ajouter des label input etc
            si vous rajouter des input n'oubliez pas d'aller les inserer dans le fichier /php/CRUD/create_users.php-->
            <br>
            <label for="cgu"><a href="cgu.php" target="_blank">CGU</a></label>
            <input type="checkbox" id="cgu" onclick="verifcgu();" name="cgu" value="valider" required="">
            <!-- le bouton et griser de base  avec le Disabled-->
            
            <br>
            <button id="btn_inscription" disabled > S'inscrire</button>
        </fieldset>
    </form>
 
    </main>
    <?php
        include_once '.././includes/footer.php';
    ?>
    <?php
        // include_once '.././includes/html_script.php';
    ?>
    <script>
        function verifcgu(){
            var checkbox = document.getElementById('cgu');
            var inscription = document.getElementById('btn_inscription');
            if(checkbox.checked){
                inscription.disabled=false;
            }else{
                inscription.disabled=true;
            }
        }
    </script>
</body>
</html>