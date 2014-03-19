<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>
<section><br/>
    <form action='changement.php' method='post'>
        <?php
        $mail = $bdd->query('SELECT * FROM inscription2 WHERE email = "' . mysql_real_escape_string($_POST['mail']) . '"'); //On selectionne l'email inscrite précédemment
        $count = $mail->rowCount();
        if ($count == 1) {
            $_SESSION['mai'] = $_POST['mail']; //Si elle existe alors on l'associe à une variable Session
            ?> 
            <label> Question secrète: </label>
            <?php
            $question = $bdd->query('SELECT question FROM inscription2 WHERE email ="' . $_SESSION['mai'] . '"'); // On selectionne la question qui correspond à l'adresse email précédente
            $d = $question->fetch();
            $c = $d[0];

            if ($c == 1) { //On cherche l'id de la question par rapport aux select du formulaire d'inscription
                echo "Quelle est votre ville de naissance ?";
            } elseif ($c == 2) {
                echo "Quel est votre acteur préféré ?";
            } elseif ($c == 3) {
                echo "Quelle est votre couleur préférée ?";
            }
            ?>
            <br/><br/>

            <label> Réponse secrète : </label>
            <input type="text" name="reponse" /> <br/><br/>
            <input type='submit' value='Valider'/>
        </form><?php
    } else {
        echo '<h2>' . "Adresse email inconnue!" . '</h2>';
        echo "Vous allez être redirigé.";
        header("Refresh: 2;URL=findmdp.php");
    }
    ?>
</section>
</body>
</html>