<?php
var_dump($_GET);
$nom = filter_input(INPUT_GET, 'nom', FILTER_VALIDATE_EMAIL);
// $nom = $_GET['nom']; // + nétoyage
var_dump($nom);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="testFilter.php" method="GET">
            <input type="text" name="nom" />
        </form>
        <div>
            <?php echo $nom ?>
        </div>
    </body>
</html>
