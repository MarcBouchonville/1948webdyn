<?php
    session_start();
    
    if (isset($_SESSION['toto'])) {
        $toto = $_SESSION['toto'];
    }
    if (isset($_SESSION['auteur'])) {
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
        <?php
            echo $_SESSION['toto'] . ' ' . $_SESSION['auteur'];    // lit ds la session
        ?>
    </body>
</html>
