<?php require 'head.php'; ?>
<?php require 'body.php'; ?>
<?php require 'connection.php'; ?>

<section> <br/> 

    <TABLE> 
        <h1><u>Roses</u></h1><br/><br/><tr>
            <TD> <img src="image/rose.jpg" height="200" width="200" > </TD> 
            <TD> r02 </TD> 
            <TD> Lot de 2 roses </TD> 
            <TD> 2.99€ </TD> 
        </TR> 
    </TABLE> <br/><br/>
    <form align="center" id="f1" action="pan.php?action=ajout&amp;l=Lot de 2 roses&amp;p=2.99" method="post"> 
        <input type='button' name='subtract' value="-"  class="sub"/>
        <input type='text' name='qtyr' id='qtyr' size="1" value='1' readonly = 'readonly'/>
        <input type='button' name='add' value="+" class="add"/>
        <input type='submit' value="Ajouter au panier"/>
    </form>

    <script type = "text/javascript">
        with (document.getElementById('f1'))
            incrementButtons(add, subtract, qtyr);

    </script>

</section>

</body>

</html>