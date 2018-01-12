<?php
// enregistre le formulaire dans la DB
// ouvre une connection avec mysql (voir http://php.net/manual/fr/pdo.construct.php)
// $pdo est la variable qui permet de travailler avec la connection
//     new : est un mot clef du langage pour créer un nouvelle objet (ici une nouvelle connection)
//         PDO(...) construit la connection, il connecte mysql et établit cette connection
//              mysql:host=localhost;dbname=isuzu;charset=utf8 est un dsn (Data Source Name) : un texte qui décrit la connection
//              mysql : indique qu'il faut connecter mysql (ici un exemple pour se connecter à MS SQL Server : new PDO("sqlsrv:Server=localhost;Database=bddtest", "Utilisateur", "MotDePasse")
//                    host=localhost : le server est le PC local (on pourrait avoir host=192.168.13.4)
//                                   dbname=isuzu : nom de la DB (optionnel)
//                                                charset=utf8 : les caractères sont encodés en UTF8
//                                                               user
//                                                                       password
$pdo = new PDO("mysql:host=localhost;dbname=isuzu;charset=utf8", "root", "root");
// affiche les excepté - facile pour développer
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
// prepare une requête dans mysql
// $stmt est une référence sur un "statement", une instruction pour mysql
//            prepare : ... prépare l'exécution de l'(ici) INSERT dans mysql
//                     INSERT INTO ... : le code SQL que mysql doit exécuté
//         (email, nom, prenom, telephone, commune, commentaire) : les noms des colonnes
//         VALUES(?, ?, ?, ?, ?, ?) : les valeurs à insérer
//                                    chaque point d'interrogation correspond à une colonne, dans l'ordre
//                                    ? indique que la valeur sera fournie après (c'est pour cela que l'on parle de "prepare", l'exécution n'est pas terminée
$stmt = $pdo->prepare("INSERT INTO clients "
        . "(email, nom, prenom, telephone, commune, commentaire)"
        . "VALUES(?, ?, ?, ?, ?, ?)");
// injecte la valeur $_POST['email'] dans le premier ? (=> colonne email dans la table isuzu.clients)
$stmt->bindValue(1, $_POST['email']);
// injecte la valeur $_POST['name'] dans le second ? (=> colonne nom)
$stmt->bindValue(2, $_POST['name']);
// injecte la valeur $_POST['firstName'] dans le troisième ? (=> colonne prenom)
$stmt->bindValue(3, $_POST['firstName']);
// injecte la valeur $_POST['phoneNumer'] dans le quatrième ? (=> colonne telephone)
$stmt->bindValue(4, $_POST['phoneNumber']);
// injecte la valeur $_POST['commune'] dans le cinquième ? (=> colonne commune)
$stmt->bindValue(5, $_POST['town']);
// injecte la valeur $_POST['comment'] dans le sixième ? (=> colonne commentaire
$stmt->bindValue(6, $_POST['comment']);
// exécute le "statement" (l'instruction SQL préparée ci-avant), donc effectue l'INSERT
$stmt->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <h1>Form Controller</h1>
            <p>Nous avons bien reçu votre requête et reprendrons contact
            avec vous dans les plus brefs délais</p>
            <ul>
                <li>Email: <?php echo $_POST['email'];?></li>
                <li>Prénom: <?php echo $_POST['firstName'];?></li>
                <li>Nom: <?php echo $_POST['name'];?></li>
                <li>Téléphone: <?php echo $_POST['phoneNumber'];?></li>
                <li>Commune: <?php echo $_POST['town'];?></li>
                <li>Commentaire: <?php echo $_POST['comment']?></li>
            </ul>
        </div>
    </body>
</html>