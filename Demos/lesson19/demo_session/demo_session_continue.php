<?php
/*
 * utilise la session (démontre que les données dans la session sont persistantes)
 */
session_start();
if(isset($_SESSION['toto'])) {
    $toto = $_SESSION['toto'];
}
if(isset($_SESSION['auteur'])) {
    $auteur = $_SESSION['auteur'];
}
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
            echo $_SESSION['toto'] . ' ' . $_SESSION['auteur'];     // utilise la session
            ?>
        </h3>
    </body>
</html>
