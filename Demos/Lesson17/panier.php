<?php

var_dump($_POST);

/* $item = $_POST['item']; // crash si n'existe pas encore */

$item= filter_input(INPUT_POST, "item",FILTER_SANITIZE_STRING);
/* $panier = $_COOKIE['panier'];  // crash si n'existe pas encore */

$panier = filter_input(INPUT_COOKIE,'panier',FILTER_SANITIZE_STRING);


// ajouter un IF pour éviter de commencer par ";" si panier n'existe pas encore
// pour la ligne qui suit :
$panier = $panier . " ; " . $item;

setcookie("panier",$panier);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PANIER PHP</title>
    </head>
    <body>
        <form action="panier.php" method="POST">
            <input type="text" name="item" />
            <input type="submit" value="envoyer"/>
        </form>
        
        <h3>resultat</h3>
        
        <?php
            echo "panier : " . $item;
        ?>
        
    </body>
</html>
