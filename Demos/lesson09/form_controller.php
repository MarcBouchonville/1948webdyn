<!DOCTYPE html>
<!--
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $email = $_POST["email"];   // jedepaepe@epfc.eu
        // ... les autres entrées du formulaire
        
        $bdd = new PDO('mysql:host=localhost;dbname=commerce;charset=utf8', 'root', 'root');
        $sqlQuery = "INSERT INTO contacts (email) VALUES('" . $email . "')";
        // INSERT INTO contacts (email) VALUES('jedepaepe@epfc.eu')
        var_dump($sqlQuery);   // pour debug
        $bdd->exec($sqlQuery);
        ?>
    </body>
</html>
