<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $nom = $_GET["nom"];
        $prenom = $_GET["prenom"];
        $datenaiss = $_GET["datenaiss"];
        $rue = $_GET["rue"];
        $cp = $_GET["cp"];
        $ville = $_GET["ville"];
        
        require ("connect.php");
        
        try
        {
            $pdo = new PDO ("mysql:host=" . SERVER . ";dbname=" . BASE, USER, PASSWD);
            $pdo = new PDO('mysql:host=localhost;dbname=commerce;charset=utf8','root','');
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // prepare sql and bind parameters
            $stmt = $pdo->prepare("INSERT INTO etudiant (nom, prenom, datenaiss, rue, cp, ville)
                VALUES (:nom, :prenom, :datenaiss, :rue, :cp, :ville)");
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':prenom', $prenom);
                    $stmt->bindParam(':datenaiss', $datenaiss);
                    $stmt->bindParam(':rue', $rue);
                    $stmt->bindParam(':cp', $cp);
                    $stmt->bindParam(':ville', $ville);
            $stmt->execute();
            echo "le nommé " . $nom . ", " . $prenom . " est ajouté dans la table des étudiants";
        }
        catch (exception $ex)
        {
            echo $ex->getMessage();
            die('Erreur : '.$ex->getMessage());
        }

        
        //$query = "INSERT INTO `etudiant`(`nom`, `prenom`, `datenaiss`, `rue`, `cp`, `ville`) VALUES ($nom, $prenom, $datenaiss, $rue, $cp, $ville)"
        
        // var_dump($query); // pour debug
        
        //$commerceDB->exec($query);
        
        // $reponse = $commerceDB->query('select * from contacts');
        // while($donnees = $reponse->fetch())
        //{
        
        ?>
        
        $pdo = null;

    </body>
</html>