<?php
// crée une connection avec mysql, en sélectionnant la DB "biblio"
$pdo = new PDO("mysql:host=localhost;dbname=biblio", "root", "root");
// crée une simple chaîne de caractères
$sql = "SELECT * FROM `livre`";
// crée un objet complexe qui permet de gérer la requête ou "false" si la requête échoue
$query = $pdo->query($sql);
var_dump($query);
// récupére le contenu de la table livre
$records = $query->fetchAll();
var_dump($records);
// $record référence le premier record
$record = $records[0];      // même syntaxe que pour $_GET['clef'] , syntaxe des tableaux
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
        echo $record['id'] . '<br>';
        echo $record['auteur'] . '<br>';
        echo $record['titre'] . '<br>';
        echo $record['date'] . '<br>';
        echo $record['categories'] . '<br>';
        echo $record['description'] . '<br>';
        echo "<hr>";
        ?>
    </body>
</html>
