<!DOCTYPE html>
<?php
// utilise la session 

session_start();
$_SESSION['toto']='ce hero';  // ecirt dans la session 'ce heros' référencé par 'toto'
$_SESSION['auteur']='vandroomael'; // idem
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>
            <?php
            echo $_SESSION['toto'] . ' ' . $_SESSION['auteur'];    // lit ds la session
            ?>
        </h3>
    </body>
</html>
