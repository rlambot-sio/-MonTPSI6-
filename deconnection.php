<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section><br/>
    <?php
    if (isset($_SESSION['mail'])) { //On vérifie que l'utilisateur soit connecté
        echo '<h1>' . "Vous vous êtes déconnecté!" . '</h1>'; //On affiche un message indiquant à l'utilisateur qu'il s'est déconnecté
        header("Refresh: 1;URL=Accueil.php"); // On redirigige l'utilisateur sur la page d'accueil
        session_destroy(); //On détruit toutes les données associées à la session courante
    }
    ?>

</section>
</body>
</html>
