<?php require 'head2.php'; ?>
<?php require 'body2.php'; ?>
<?php require '../connection.php'; ?>

<section></br></br>
    <?php
    echo '<table border=1>';
    echo '<tr><td>' . "id" . '</td><td>' . "pseudo" . '</td><td>' . "email" . '</td></tr>';
    foreach ($bdd->query('SELECT * from inscription2') as $row) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['pseudo'] . '</td><td>' . $row['email'] . '</td></tr>';
    }
    echo '</table>';
    ?></br>
    <form  method="POST" action="Exercice3.php">
        <label> Entrer l'id à supprimer : </label>
        <input type="text" name="id" /> <br/>
        <input type="submit" value="Supprimer">
        <br/></form> </br>
    <?php
    if (isset($_POST['id'])) {
        $bdd->query('DELETE from inscription2 WHERE id="' . $_POST["id"] . '"');    
        header("Refresh: 1;URL=Exercice3.php");
    }
    ?>
</section>
</body>
</html>
