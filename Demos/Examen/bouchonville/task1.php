<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Marc Bouchonville">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="date" content="2018-06-20" scheme="YYYY-MM-DD">
	<meta http-equiv="expires" content="Wed, 20 Jun 2018 18:30:00 GMT">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
<?php
// connexion a une DB
	
	/* INITIALISATION DES VARIABLES (de connexion au serveur mysql) */
	
	try {
            // #prof#change#begin (pour faciliter les tests)
            // $pdo = new PDO("mysql:host=localhost;dbname=organisation;charset=utf8", "root", "root");
            $pdo = new PDO("mysql:host=localhost;dbname=marc;charset=utf8", "root", "root");
            // #prof#change#end

                // fixer le mode erreur de PDO a exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    // table 'task'
            $sql = "SELECT * FROM `task`";

                /*Envoyer cette RQ SQL*/
                /* RECUPERER LA REFERENCE */
                // crée un objet complexe qui permet de gérer la rq ou "false" si*/
            $query = $pdo->query($sql);
                
            $query->setFetchMode(PDO::FETCH_ASSOC);

	}
	catch(PDOException $e) {
		printf ("Echec de connexion : %s\n", $e->getMessage());
		exit();
	}
        echo "connexion réussie";
// FIN du code - déconnexion 

?>

    <h1>db-organisation</h1>
   
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>date</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $query->fetch())
            {
                echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['description'] . '</td>
                </tr>';
            }?>
        </tbody>
    </table>

    </body>
</html>