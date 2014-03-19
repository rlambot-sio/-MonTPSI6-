<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>
<?php require 'fonction-panier.php'; ?>

<section> <br/>
    <table>
        <tr>
            <td colspan="4">Votre panier</td>
        </tr>
        <tr>
            <td>Produit</td>
            <td>Quantité</td>
            <td>Prix Unitaire</td>
            <td>Action</td>
        </tr>
        <?php
        $erreur = false;

        $action = (isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null ));
        if ($action !== null) {
            if (!in_array($action, array('ajout', 'suppression', 'refresh', 'supprimer')))
                $erreur = true;

            //récuperation des variables en POST ou GET
            $l = (isset($_POST['l']) ? $_POST['l'] : (isset($_GET['l']) ? $_GET['l'] : null ));
            $p = (isset($_POST['p']) ? $_POST['p'] : (isset($_GET['p']) ? $_GET['p'] : null ));
            if (isset($_POST['qtyr'])) {
                $q = $_POST['qtyr'];
                $l = preg_replace('#\v#', '', $l); //Suppression des espaces verticaux
                $p = floatval($p); //On verifie que $p soit un float

                if (is_array($q)) {
                    $QteArticle = array();
                    $i = 0;
                    foreach ($q as $contenu) {
                        $QteArticle[$i++] = intval($contenu);
                    }
                } else
                    $q = intval($q);
            }
            if (isset($_POST['qtyv'])) {
                $q = $_POST['qtyv'];
                $l = preg_replace('#\v#', '', $l);
                $p = floatval($p);

                if (is_array($q)) {
                    $QteArticle = array();
                    $i = 0;
                    foreach ($q as $contenu) {
                        $QteArticle[$i++] = intval($contenu);
                    }
                } else
                    $q = intval($q);
            }
            if (isset($_POST['qtyt'])) {
                $q = $_POST['qtyt'];
                $l = preg_replace('#\v#', '', $l);
                $p = floatval($p);

                if (is_array($q)) {
                    $QteArticle = array();
                    $i = 0;
                    foreach ($q as $contenu) {
                        $QteArticle[$i++] = intval($contenu);
                    }
                } else
                    $q = intval($q);
            }
            if (!$erreur) {
                switch ($action) {
                    Case "ajout":
                        ajouterArticle($l, $q, $p);
                        break;

                    Case "suppression":
                        supprimerArticle($l);
                        break;

                    Case "refresh" :
                        for ($i = 0; $i < count($QteArticle); $i++) {
                            modifierQTeArticle($_SESSION['panier']['id'][$i], round($QteArticle[$i]));
                        }
                        break;

                    Case "supprimer" :
                        supprimePanier();
                        break;
                    Default:
                        break;
                }
            }
        }

        if (creationPanier()) {
            $nbArticles = count($_SESSION['panier']['id']);
            if ($nbArticles <= 0)
                echo "<tr><td colspan=\"4\">Votre panier est vide</td></tr>"; else {
                for ($i = 0; $i < $nbArticles; $i++) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($_SESSION['panier'] ['id'][$i]) . "</ td>";
                    echo "<td>" . htmlspecialchars($_SESSION['panier'] ['qte'][$i]) . "</td>";
                    echo "<td>" . htmlspecialchars($_SESSION['panier'] ['prix'] [$i]) . " €" . "</td>";
                    echo "<td><a href=\"" . htmlspecialchars("pan.php?action=suppression&l=" . rawurlencode($_SESSION['panier'] ['id'][$i])) . "\">Supprimer</a></td>";
                    echo "</tr>";
                }

                echo "<tr><td colspan=\"2\"> </td>";
                echo "<td colspan=\"2\">";
                echo "Total : " . MontantGlobal() . " €";
                echo "</td></tr>";
                echo "</td></tr>";
            }
        }
        ?>
    </table>
    <?php if ($nbArticles > 0) {
        ?> 
        <form method='post' action='pan.php?action=supprimer' class='vide'>
            <input type='submit' value="Vider le panier"/>
        </form>
        <form method='post' action='achat.php' class='passe'>
            <input type='submit' value="Valider la commande"/>
        </form>
    <?php } ?>

</section>
</body>
</html>
