<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section> <br/> 

    <TABLE> 
        <h1><u>Tulipes</u></h1><br/><br/><tr>
            <TD> <img src="image/tulipe.jpg" height="200" width="200" > </TD> 
            <TD> t03 </TD> 
            <TD> Lot de 3 tulipes </TD> 
            <TD> 1.50€ </TD> 
        </TR> 
    </TABLE> <br/><br/>

    <form align="center" id="f1" action="pan.php?action=ajout&amp;l=Lot de 3 tulipes&amp;p=1.50" method="post"> 
        <input type='button' name='subtract' value="-"  class="sub"/>
        <input type='text' name='qtyt' id='qtyt' size="1" value='1' readonly = 'readonly'/>
        <input type='button' name='add' value="+" class="add"/>
        <input type="submit" value="Ajouter au panier">
    </form> 

    <script type="text/javascript">

        with (document.getElementById('f1'))
            incrementButtons(add, subtract, qtyt);

    </script>

</section>

</body>

</html>
