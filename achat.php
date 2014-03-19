<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section><br/>
    <?php
    if (isset($_SESSION['mail'])) { //On vérifie que l'utilisateur soit connecté
        echo '<h2>' . "Projet fini!" . '</h2>';
    } else { //Si l'utilisateur n'est pas connecté alors
        echo '<h2>' . "Vous devez être connecté pour passer une commande!" . '<br/></h2>'; //On précise à l'utilisateur qu'il doit etre connecté
        echo "Vous allez être redirigé."; //On l'avertit qu'il va être rédirigé
        header("Refresh: 2;URL=connect.php"); //On redirige l'utilisateur vers la page de connexion
    }
    ?>

</section>
</body>
</html>