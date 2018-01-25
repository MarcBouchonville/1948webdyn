<?php
/**
 * Simulation d'un panier:
 * le formulaire 'item' sert à ajouter des items (marchandises) au panier
 * le cookie 'panier' sert à enregistrer le panier
 */
var_dump($_POST);   // debug
var_dump($_COOKIE); // debug
//
// récupérer l'item (la marchandises)
// $item = $_POST['item']; // crash si $_POST['item'] n'existe pas => utiliser la ligne suivante
$item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING); // sécurisé

// récupérer le panier
// $panier = $_COOKIE['panier']; // crash si $_COOKIER['panier'] n'existe pas
$panier = filter_input(INPUT_COOKIE, "panier", FILTER_SANITIZE_STRING);

// mettre à jour le panier
// doit être conditionnel (ajouter if ...)
// bahamas;mont blanc;thalasso
$panier = $panier . ";" . $item;

// enregistrer le panier dans le COOKIE 'panier'
setcookie('panier', $panier);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- formulaire simulant l'ajout d'un produit dans un panier-->
        <form action="panier.php" method="POST">
            <input name="item">  <!-- il est clair que dans un cas réel, l'utilisateur ne pourra pas écrire ce qu'il veut : il devra choisir le produit dans une liste-->
            <input type="submit" value="submit">
        </form>
    </body>
</html>
