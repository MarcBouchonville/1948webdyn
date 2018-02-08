<?php
    session_start();
    
    if (isset(['toto'])) {
        
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
