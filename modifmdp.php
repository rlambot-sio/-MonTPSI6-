<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section><br>
    <form method="post" action="modifmdp.php">
        <label>Ancien mot de passe :</label>
        <input type='password' name="mdp"><br/>
        <label>Nouveau mot de passe :</label>
        <input type='password' name="mdp1"><br/>
        <label>Validez votre nouveau mot de passe :</label>
        <input type='password' name="mdp2"><br/>
        <input type="submit" value="Valider">
    </form>

    <?php
    if (isset($_POST['mdp']) && isset($_POST['mdp1']) && isset($_POST['mdp2'])) { //On vérifie que le champs mot de passe a été rempli
        //On sélectionne le mot de passe de l'adresse email de l'utilisateur connecté depuis la base de données
        $a = $bdd->query('SELECT * FROM inscription2 WHERE mot_de_passe = "' . mysql_real_escape_string(md5($_POST['mdp'])) . '"AND email = "' . mysql_real_escape_string($_SESSION['mail']) . '"');
        $count = $a->rowCount();
        if ($count == 1) { //Si le mot de passe indiqué est identique à celui précedemment prélevé de la base de données alors on change le mot de passe
            if (strlen($_POST['mdp1']) > 4) {
                if ($_POST['mdp1'] == $_POST['mdp2']) { //On vérifie que les deux nouveaux mots de passe soient identiques
                    $b = $bdd->query('UPDATE inscription2 SET mot_de_passe="' . (md5($_POST["mdp1"])) . '" WHERE email="' . $_SESSION["mail"] . '"'); //On modifie le mot de passe dans la base de données
                    echo '<h2>' . "Mot de passe changé !" . '</h2>';
                    header("Refresh: 2;URL=Accueil.php");
                } else {
                    echo '<h2>' . "Les deux nouveaux mots de passe ne sont pas identiques !" . '</h2>';
                }
            } else {
                echo '<h2>' . "Le mot de passe doit faire minimum 4 caractères !" . '</h2>';
            }
        } else {
            echo '<h2>' . "Mot de passe initial incorrect !" . '</h2>';
        }
    }
    ?>

</section>
</body>
</html>