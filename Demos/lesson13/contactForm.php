<?php
$db = new PDO("mysql:host=localhost;dbname=Isuzu", "root", "root");
$db->exec("set names utf8");

$select = "SELECT * FROM communes";
$query = $db->query($select);
$result = $query->fetchAll();
$record = $result[0];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Isuzu Ute Australia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body id="main">
        <header>
            <h1>Isuzu Ute Australia</h1>
            <ul>
                <li><a class="link" href="index.php"> Home</a></li>
                <li><a class="link" href="index.php">D-MAX</a></li>
                <li><a class="link" href="index.php">MU-X</a></li>
                <li><a class="link" href="contact.php">Contact</a></li>
            </ul>
        </header>

        <h2 class="center">Bienvenue sur la page de contact</h2>

        <article>
            <form action="contactController.php" method="POST">
                <p>
                    <label for="email">Email : </label>
                    <input type="email" id="email" name="email" required>
                </p>
                <p>
                    <label for="firstName">Nom : </label>
                    <input type="text" id="firstName" name="firstName">
                </p>
                <p>
                    <label for="name">Prénom : </label>
                    <input type="text" id="name" name="name">
                </p>
                <p>
                    <label for="phoneNumber">Numéro de téléphone : </label>
                    <input type="tel" id="phoneNumber" name="phoneNumber">
                </p>
                <p>
                    <label for="town">Commune : </label>
                    <select id="town" name="town">
                        <?php foreach ($result as $record) { ?>
                            <option value=<?php echo $record['nom'] ?>><?php echo $record['nom'] ?></option>';
                        <?php } ?>
                    </select>
                </p>
                <p>
                    <label for="comment">Commentaire : </label>
                    <textarea id="comment" name="comment" maxlength="1000"></textarea>
                </p>
                <input type="submit" name="envoyer" value="Envoyer">
            </form>
        </article>
    </body>
</html>