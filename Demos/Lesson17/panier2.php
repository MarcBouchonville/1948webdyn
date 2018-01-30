<?php

var_dump($_POST);

/* $item = $_POST['item']; // crash si n'existe pas encore */
$a = false;

$item= filter_input(INPUT_POST, "item",FILTER_SANITIZE_STRING);
/* $panier = $_COOKIE['panier'];  // crash si n'existe pas encore */

$panier = filter_input(INPUT_COOKIE,"panier",FILTER_SANITIZE_STRING);


// ajouter un IF pour éviter de commencer par ";" si panier n'existe pas encore
// pour la ligne qui suit :

switch ($item)
{
    case "bahamas":
        $a = true ;
        break;
    case "mont blanc" :
        $a = true ;
        break;
    case "thalasso" :
        $a = true ;
        break;
    default :
        echo 'Choisir entre bahamas, mont blanc OU thalasso !' . "\r" . "\n"; ?>
<br />
<?php
}

if ($a) {
    echo '$a = ' . "$a"; ?>
    <br/> 
    <?php
    if ($panier=='') {
        $panier = $item ;
    } else {
        $panier = $panier . " ; " . $item;
    }
}

setcookie('panier', $panier);
echo 'Le panier contient : ' . $panier . "\r" . "\n";
echo '*****' . "\r" . "\n";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PANIER2 PHP</title>
    </head>
    <body>
        <form action="panier2.php" method="POST">
            <input type="text" name="item" />
            <input type="submit" value="envoyer"/>
        </form>
        
        <h3>resultat</h3>
        
        <?php
            echo "panier : " . $panier; ?>
            <br/>
            <?php
            echo "item : " . $item;
        ?>
        
    </body>
</html>
