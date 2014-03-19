<!-- Page permettant la modification de la table. --> 

<?php require 'connection.php'; ?>
<?php require 'Exercice3.php'; ?>

<section>
    </br>
    <form  method="POST" action="..8modif.php">
        <label> Nom du contact : </label>
        <input type="text" name="nom" /> <br/>
        <label> Entrer le nouveau Numéro de téléphone : </label>
        <input type="text" name="num" /> <br/>
        <input type="submit" value="Modifier">
        <br/></form>
</section>
<?php
if ((isset($_POST['nom'])) || (isset($_POST['num']))) {
    $bdd->query('UPDATE Personne SET num_tel="' . $_POST["num"] . '" WHERE nom="' . $_POST["nom"] . '"');
}
?>
</body>
</html>
