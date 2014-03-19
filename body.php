<?php
session_start(); //On crée une session
?>
<body>

    <script type="text/javascript"> // Script permettant le changement de quantité des produits
        function incrementButtons(upBtn, downBtn, qtyrField)
        {
            var step = parseFloat(qtyrField.value) || 1,
                    currentValue = step;

            downBtn.onclick = function()
            {
                currentValue = parseFloat(qtyrField.value) || step;
                qtyrField.value = (currentValue -= Math.min(step, currentValue - step));
            }

            upBtn.onclick = function()
            {
                currentValue = parseFloat(qtyrField.value) || step;
                qtyrField.value = (currentValue += step);
            }
        }

    </script>

    <header>
        <img src="image/footer.png" class="img" alt="">

        <?php
        if (!isset($_SESSION['mail'])) { //On vérifie que l'utilisateur ne soit pas connecté, et on affiche le bouton de connexion
            ?><A href="connect.php" class='connexion'>Connexion</a> 
        <?php } else { //si l'utilisateur est connecté alors on affiche un bouton de gestion de compte
            ?><A href="compte.php" class='connexion'>Mon compte</a>
            <?php }
            ?>
        <A href="Inscription.php" class='inscrip'>Inscription</a>
        <div class='titre'>
            <h2><u>Société LaFleur</u></h2>
        </div>
    </header>

    <nav><br/>
        <A href="Accueil.php">Accueil</a><br/>
        <A href="Contact.php">Nous contacter</a><br/><br/>
        <hr>

        <h3><u>Nos Produits</u></h3>
        <A href="ros.php">Roses</a><br/>
        <A href="tul.php">Tulipes</a><br/>
        <A href="vio.php">Violettes</a><br/><br/>

        <hr><br/>
        <A href="pan.php">Mon panier</a><br/>

        <?php if (isset($_SESSION ['mail'])) { //On regarde si l'utilisateur est connecté, s'il l'est on affiche un bouton de déconnection
            ?>
            <A href="deconnection.php">Déconnection</a><br/>
        <?php }
        ?>

        <?php
        if (isset($_SESSION['mail'])) { //On vérifie que l'utilisateur soit connecté{
            if ($_SESSION ['mail'] == "jttluffy@hotmail.fr") { // Si l'adresse de connexion est celle d'un administrateur alors on ajoute un bouton d'administration
                ?><A href="administrer/Exercice3.php">Administrer</a><?php
            }
        }
        ?>
    </nav>