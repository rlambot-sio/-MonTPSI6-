<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section> <br/> <h2>"Dites-le avec Lafleur"</h2>
    <table>
        <tr >
            <td><img src="image/gillou.jpg" alt="" width="400" height="400"/></td>
        </tr>
    </table>
    <?php
    if (isset($_SESSION['mail'])) {
        echo '<h1>' . "Bienvenue " . $_SESSION ['mail'] . " !" . '</h1>'; //Si l'utilisateur est connecté, alors on affiche un message de bienvenue.
    }
    ?>
</section>
</body>
</html>
