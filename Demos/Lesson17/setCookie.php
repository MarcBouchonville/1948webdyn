<?php

// logique pour n'écrire qu'une seule fois le cookie :
/* if(!isset($_COOKIE["rue"])) {
    setcookie("rue", "Astronomie");
} */


setcookie("ville", "Bruxelles");  // crée ou màj de cookie

var_dump($_COOKIE);

$ville= filter_input(INPUT_COOKIE, "ville",FILTER_SANITIZE_STRING);
var_dump($ville);

// incrementeur de compteur :

if (isset($_COOKIE["count"])) {
    $count = $_COOKIE['count']; // ou $count = $_COOKIE['count'] + 1 ;
    $count = $count + 1;        // ds ce cas => l'incrémentation est déjà faite !
    echo $count . "<br>";
} else {
    $count = 1;
}
setcookie("count",$count);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Setcookie</title>
    </head>
    <body>
        <h1>set cookie Demo</h1>
        <?php
            echo "cookie : " . $_COOKIE['ville'];
        ?>
        <h3>parcour tab $cookie</h3>
        <?php
        
        foreach ($_COOKIE as $key => $value) {
            echo "<li>$key => $value</li>";
            echo '<li>' . filter_var($key, FILTER_SANITIZE_STRING) . 
                    '==> ' . filter_var($value, FILTER_SANITIZE_STRING);
        }
        
        ?>

        <h3>compteur</h3>
        
        <?php
            echo "count = " . $count;
        ?>
        
    </body>
</html>