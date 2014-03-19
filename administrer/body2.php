<?php
session_start();
?>
<body>

    <script type="text/javascript">
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
        <img src="../image/footer.png" class="img">

        <?php
        if (!isset($_SESSION['mail'])) {
            ?><A href="../connect.php" class='connexion'>Connexion</a>
        <?php } else {
            ?><A href="../compte.php" class='connexion'>Mon compte</a>
            <?php }
            ?>
        <A href="../Inscription.php" class='inscrip'>Inscription</a>
        <div class='titre'>
            <h2>Sté LaFleur</2>
        </div>
    </header>

    <nav></br>
        <A href="../Accueil.php">Accueil</a><br/><br/>
        <A href="../Contact.php">Nous contacter</a><br/><br/>
        <hr>

        <h3><u>Nos Produits</u></h3>
        <A href="../tul.php">Tulipes</a><br/>
        <A href="../vio.php">Violettes</a><br/>
        <A href="../ros.php">Roses</a><br/><br/>
        <hr><br/>
        <A href="../pan.php">Mon panier</a><br/><br/>

        <?php if (isset($_SESSION ['mail'])) { ?>
        <A href="../deconnection.php">Deconnection</a></br><br/>
        <?php }
        ?>

        <?php
        if (isset($_SESSION['mail'])) {
            if ($_SESSION ['mail'] == "jttluffy@hotmail.fr") {
                ?><A href="../administrer/Exercice3.php">Administrer</a><?php
            }
        }
        ?>
    </nav>