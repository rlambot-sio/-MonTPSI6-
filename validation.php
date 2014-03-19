<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section><br/>

    <?php
    //On sélectionne l'adresse email de la base de données indiquée dans le champs précedent
    $a = $bdd->query('SELECT * FROM inscription2 WHERE email = "' . mysql_real_escape_string($_POST['nom']) . '"');
    $count = $a->rowCount();

    //On sélectionne le mot de passe de l'adresse email indiqué précedemment
    $b = $bdd->query('SELECT * FROM inscription2 WHERE mot_de_passe = "' . mysql_real_escape_string(md5($_POST['mdp'])) . '" AND email = "' . mysql_real_escape_string($_POST['nom']) . '"');
    $count2 = $b->rowCount();

    if (($count == 1) && ($count2 == 1)) { //Si l'adresse email et le mot de passe sont correctes alors l'utilisateur est connecté
        $_SESSION['mail'] = $_POST['nom'];
        header("Location: Accueil.php");
    } else {
        if ($count == 0) { //Si l'adresse email est inconnue
            echo " <h1> ERREUR: email inconnu! </h1>" . '</br>' . "Vous allez être redirigé.";
            header("Refresh: 3;URL=connect.php");
        } else { //Si l'adresse email est référencée mais le mot de passe est incorrecte
            echo " <h1> ERREUR: mot de passe ou email incorrect!</h1>" . '</br>' . "Vous allez être redirigé.";
            header("Refresh: 3;URL=connect.php");
        }
    }
    ?>

</section>
</body>
</html>