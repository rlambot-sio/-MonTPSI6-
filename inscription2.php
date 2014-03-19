<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>
<section><br/>

    <?php
    //On va vérifier que tous les champs précédents ont été remplis
    if (isset($_POST['pseudo']) && ($_POST['mail']) && ($_POST['sexe']) && ($_POST['mot']) && ($_POST['mail2']) && ($_POST['mdp2']) && ($_POST['question']) && ($_POST['reponse'])) {
        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $mail2 = htmlspecialchars(trim($_POST['mail2']));
        $mdp2 = ($_POST['mdp2']);
        $mail = htmlspecialchars(trim($_POST['mail']));
        $sexe = htmlspecialchars(trim($_POST['sexe']));
        $mot = ($_POST['mot']);
        $question = htmlspecialchars(trim($_POST['question']));
        $reponse = htmlspecialchars(trim($_POST['reponse']));


        if (filter_var($mail, FILTER_VALIDATE_EMAIL) AND $mail == $mail2) { //On vérifie  que l'email est valide et que les deux emails soient identiques
            if ($mot == $mdp2) { //On vérifie que les deux mots de passe sont identiques
                if (strlen($mot) > 4) { //On vérifie que le mot de passe fait plus de 4 caractères
                    $mot = md5($mot);
                    $mdp2 = md5($mdp2);
                    $login = $pseudo;
                    $query = $bdd->query("SELECT * FROM inscription2 WHERE pseudo = '$login'");
                    $count = $query->rowCount();

                    if ($count == 0) {
                        $bdd->query("INSERT INTO inscription2 VALUES(0 , '$login', '$mail','$sexe','$mot', '$question','$reponse')");
                        echo '<h2>' . 'Vous vous êtes inscrit!' . '</h2>';
                        header("Refresh: 2;URL=connect.php");
                    } else { //Si le pseudo rentré est déjà utilisé
                        echo '<h2>' . 'Pseudo déjà utilisé!' . '</h2>';
                        header("Refresh: 2;URL=Inscription.php");
                    }
                } else { //Si le mot de passe ne fait pas plus de 4 caractères
                    echo '<h2>' . 'Le mot de passe est trop court!' . '</h2>';
                    header("Refresh: 2;URL=Inscription.php");
                }
            } else { //Si les deux mots de passes ne sont pas identiques
                echo '<h2>' . "Le mot de passe n'est pas le même !" . '</h2>';
                header("Refresh: 2;URL=Inscription.php");
            }
        } else { //Si l'email n'est pas valide ou les deux ne coîncident pas
            echo '<h2>' . "Le mail n'est pas le même ou n'est pas valide !" . '</h2>';
            header("Refresh: 2;URL=Inscription.php");
        }
    } else { //Si tous les champs n'ont pas été remplis
        echo '<h2>' . 'Tous les champs doivent être remplis !' . '</h2>';
        header("Refresh: 2;URL=Inscription.php");
    }
    ?> 

</section>
</body>
</html>