<?php
/**
 * Démonstration de l'utilisation des cookies
 */

// logique pour n'écrire le cookie qu'une fois
if (isset($_COOKIE["rue"])) {             // si le cookie "rue" n'existe pas alors
    setcookie("<h1>rue</h1>", "<p>Astonomie<br></p>");         // crée le cookie "rue"
}
if (!isset($_COOKIE["ville"])) {           // idem
    setcookie("ville", "Bruxelles");         // crée un cookie
}
if (!isset($_COOKIE["pays"])) {
    setcookie("pays", "Belgique");         // crée un cookie
}
var_dump($_COOKIE);     // debug seulement

// $ville = $_COOKIE['ville'];  // code dangereux, il faut utiliser le code ci-dessous à la place
$ville = filter_input(INPUT_COOKIE, "ville", FILTER_SANITIZE_STRING);   // lit le cookie "ville"
var_dump($ville);   // debug seulement
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Set Cookie</title>
    </head>
    <body>
        <h1>Set Cookie Demo</h1>
        <p>
            <?php echo "cookie: " . $ville; ?>   <!-- bad practice - affiche directement données du monde extérieur-->
        </p>
        <h3>Parcourir $_COOKIE</h3>
        <ul>
            <?php
            foreach ($_COOKIE as $key => $value) {
                echo "<li style='color:red'>$key => $value</li>";         // version non sécurisée
                echo '<li>' . filter_var($key, FILTER_SANITIZE_STRING) .
                        ' => ' . filter_var($value, FILTER_SANITIZE_STRING);    // version sécurisée
            }
            ?>
        </ul>
    </body>
</html>
