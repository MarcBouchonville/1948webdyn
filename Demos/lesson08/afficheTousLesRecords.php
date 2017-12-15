<?php
// crée une connection avec mysql, en sélectionnant la DB "biblio"
$pdo = new PDO("mysql:host=localhost;dbname=biblio", "root", "root");
// crée une simple chaîne de caractères
$sql = "SELECT * FROM `livre` LIMIT 5";
// crée un objet complexe qui permet de gérer la requête ou "false" si la requête échoue
$query = $pdo->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>DB Demo</h1>
        <?php
//        via un seul fetch
        $records = $query->fetchAll();
        foreach ($records as $record) {
            echo $record['id'] . '<br>';
            echo $record['auteur'] . '<br>';
            echo $record['titre'] . '<br>';
            echo $record['date'] . '<br>';
            echo $record['categories'] . '<br>';
            echo $record['description'] . '<br>';
            echo "<hr>";
        }
        while ($record = $query->fetch()) {
            echo "via while<br>";
            echo $record['id'] . '<br>';
            echo $record['auteur'] . '<br>';
            echo $record['titre'] . '<br>';
            echo $record['date'] . '<br>';
            echo $record['categories'] . '<br>';
            echo $record['description'] . '<br>';
            echo "<hr>";
        }
        ?>

    </body>
</html>
