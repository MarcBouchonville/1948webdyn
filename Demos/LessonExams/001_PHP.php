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
    /* ouvrir la connexion */
    /* declaration de var = les var de connexion ont été déclarées ds le file connect.php */
	/*  appel de ce fichier : */
	require ("connect.php");
	
	/* INITIALISATION DES VARIABLES (de connexion au serveur mysql) */
	
	try {
		$pdo = new PDO ("mysql:host=" . SERVER . ";dbname=" . BASE, USER, PASSWD);
			// sans cette déclaration des variables, on utilise :
			// $pdo = new PDO("mysql:host=localhost;dbname=biblio", "root", "root");
                
                // fixer le mode erreur de PDO a exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // creation de la table MATIERE :
                $sql  = "CREATE TABLE `MATIERE` ( `codemat` CHAR(3) "
                    . "CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, "
                    . "`libelle` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , "
                    . "`coef` FLOAT , PRIMARY KEY (`codemat`(1))) ENGINE = InnoDB "
                    . "CHARSET=utf8 COLLATE utf8_bin;";

                // use exec() because no results are returned
                if ($pdo->exec($sql) === FALSE)
                    echo "<p>ERREUR pendant la création de la table</p>\n";
                else
                    echo "Table MATIERE créée";
                
                // insertion de data dans la table :
                $sql = "INSERT INTO `MATIERE`(`codemat`, `libelle`, `coef`) VALUES ('STA', 'Statistiques', 0.4),"
                        . "('INF', 'Informatique', 0.4),"
                        . "('ECO', 'Economie', 0.2);";
                echo "<p>" . $pdo->exec($sql) . " n-uplet inséré(s) . </p>\n";
	}
	catch(PDOException $e) {
		printf ("Echec de connexion : %s\n", $e->getMessage());
		exit();
	}
	
// suite du code ...
        echo "connexion réussie";

        
// FIN du code - déconnexion 
        
        // $pdo = null;

?>
    </body>
</html>