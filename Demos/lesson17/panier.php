<?php
var_dump($_POST);   // debug
var_dump($_COOKIE); // debug
//
// $item = $_POST['item']; // crash si $_POST['item'] n'existe pas => utiliser la ligne suivante
$item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING); // sécurisé

// $panier = $_COOKIE['panier']; // crash si $_COOKIER['panier'] n'existe pas
$panier = filter_input(INPUT_COOKIE, "panier", FILTER_SANITIZE_STRING);


// doit être conditionnel (ajouter if ...)
// bahamas;mont blanc;thalasso
$panier = $panier . ";" . $item;

setcookie('panier', $panier);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="panier.php" method="POST">
            <input name="item">
            <input type="submit" value="submit">
        </form>
    </body>
</html>
