<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section><br/>

    <form method="post" action="inscription2.php">

        <table border="0">

            <tr>
                <th>Pseudo :</th>

                <td> <input type="text" name="pseudo"> </td>
            </tr>

            <tr>
                <th>Adresse e-mail :</th>

                <td> <input type="text" name="mail"> <td>
            </tr>

            <tr>
                <th>Confirmer l'adresse e-mail :</th>

                <td> <input type="text" name="mail2"> <td>
            </tr>

            <tr>
                <th>Mot de passe :</th>

                <td> <input type="password" name="mot"> </td>
            </tr>

            <tr>
                <th align="left">Confirmation du mot de passe :</th>

                <td> <input type="password" name="mdp2"> </td>
            </tr>
            <tr>

                <th>Question secrète :</th>


                <td> <select name="question">

                        <option value="1">Quel est votre ville de naissance ?</option>

                        <option value="2">Quel est votre acteur préféré ?</option>

                        <option value="3">Quel est votre couleur préférée ?</option>

                    </select>
                </td>

            </tr>


            <tr>
                <th>Réponse secrète :</th>


                <td> <input type="text" name="reponse"> </td>
            </tr>


            <tr>
                <th>Sexe :</th>

                <td>
                    <select name="sexe">
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                    </select>
                </td>
            </tr>

        </table><br/>
        <input type="submit" value="Confirmer">
    </form>
</section>
</body>
</html>