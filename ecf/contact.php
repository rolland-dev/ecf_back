<?php





?>



<body>
    <h1>Contactez-nous</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="commentaire">Commentaire :</label>
        <textarea id="commentaire" name="commentaire" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>



