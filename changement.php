<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>
<section><br/>
    <?php
    if (isset($_POST['reponse'])) {
        $_SESSION ['rep'] = $_POST['reponse'];
    }
    $reponse = $bdd->query('SELECT * FROM inscription2 WHERE reponse = "' . $_SESSION ['rep'] . '"');
    $count = $reponse->rowCount();
    if ($count == 1) {
        ?>
        <form method = "post" action = "changement.php">
            <label>Nouveau mot de passe :</label>
            <input type = 'password' name = "mdp1"><br/>
            <label>Validez votre nouveau mot de passe :</label>
            <input type = 'password' name = "mdp2"><br/>
            <input type = "submit" value = "Valider">
        </form>

        <?php
        $reponse = $bdd->query('SELECT * FROM inscription2 WHERE reponse = "' . $_SESSION ['rep'] . '"');
        $count = $reponse->rowCount();
        if ($count == 1) {
            if (isset($_POST['mdp1']) && (isset($_POST['mdp2']))) {
                if (strlen($_POST['mdp1']) > 4) {
                    if ($_POST['mdp1'] == $_POST['mdp2']) {
                        $b = $bdd->query('UPDATE inscription2 SET mot_de_passe="' . (md5($_POST["mdp1"])) . '" WHERE email="' . $_SESSION ['mai'] . '"');
                        echo '<h2>' . "Mot de passe changé !" . '</h2>';
                        header("Refresh: 2;URL=Accueil.php");
                    } else {
                        echo '<h2>' . "Les deux nouveau de mot de passes ne sont pas identiques !" . '</h2>';
                    }
                } else {
                    echo '<h2>' . "Le mot de passe doit faire 4 caractères !" . '</h2>';
                }
            }
        }
    } else {
        echo '<h2>' . "Réponse secrète incorrecte!" . '</br>' . " Faites attention aux majuscules et minuscules!" . '</h2>';
        echo "Vous allez être redirigé.";
        header("Refresh: 2;URL=findmdp.php");
    }
    ?>
</section>
</body>
</html>