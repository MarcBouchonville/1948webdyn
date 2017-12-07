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
        
        $email = $_POST["email"];
        $prenom = $_POST["prenom"];
		$nom = $_POST["nom"];
        $telephone = $_POST["telephone"];
        $commune = $_POST["commune"];
        $commentaire = $_POST["commentaire"];
        
        try
        {
            $commerceDB=new PDO('mysql:host=localhost;dbname=commerce;charset=utf8','root','root');
        }
        catch (exception $ex)
        {
            echo $ex->getMessage();
            die('Erreur : '.$ex->getMessage());
        }

        $query = "INSERT INTO `contacts` (`Id`, `Email`, `Nom`, `Prenom`, `Telephone`, `Commune`, `Commentaire`) VALUES (NULL, 'jetest@test.be', 'test1', 'arthur', '021232585', 'Bruxelles', 'premier test en cours');";
        // $query = "INSERT INTO contacts (email) VALUES ('" . $email ."')";
        
        var_dump($query); // pour debug
        
        $commerceDB->exec($query);
        
        // $reponse = $commerceDB->query('select * from contacts');
        // while($donnees = $reponse->fetch())
        //{
        
        ?>
        
        //}
    </body>
</html>
