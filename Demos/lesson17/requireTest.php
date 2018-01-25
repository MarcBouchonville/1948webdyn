<?php
/**
 * Vérification que l'attribut "required" de l'élément "input" ne pose pas de problème
 */
//$ville = $_POST["ville"]; // pas sécurisé, il est préférable d'utiliser le code ci-dessus
$ville = filter_input(INPUT_POST, "ville", FILTER_SANITIZE_STRING);
var_dump($ville);   // pour debug
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <title>DEMO required</title>
    </head>
    <body>
        <form method="POST" action="requireTest.php">
            <input type="text" name="ville" value="<?php echo $ville ?>" required autofocus />
            <input type="submit" value="soumettre" />
        </form>
    </body>
</html>
