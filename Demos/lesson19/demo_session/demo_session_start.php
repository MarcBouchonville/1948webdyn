<?php
/*
 * écrit des données dans la session
 */
session_start();        // démarre la session (crée ou utilise l'existance)
$_SESSION['toto'] = 'ce héro';      // écrit dans la session 'ce héro' référencé par 'toto'
$_SESSION['auteur'] = 'vandroomael'; // idem
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>
            <?php
            echo $_SESSION['toto'] . ' ' . $_SESSION['auteur'];     // lit dans la session
            ?>
        </h3>
        <p>
            <a href='demo_session_continue.php'>next</a> <!-- aller à la page suivante -->
        </p>
    </body>
</html>
