<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section><br/>
    <div class="table">
        <table>
            <tr>
                <td>
                    Connexion
                </td>
            </tr>
            <tr>
                <td>
                    <form method="post" action="validation.php">
                        <label>Adresse mail :</label>
                        <input type='text' name="nom"><br/>
                        <label>Mot de passe :</label>
                        <input type='password' name="mdp">
                        <input type='submit' value='Se connecter'>
                    </form>
                    <form method="post" action="findmdp.php">
                        <input type="submit" value="Mot de passe oublié ?">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</section>
</body>
</html>