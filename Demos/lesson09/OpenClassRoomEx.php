<!DOCTYPE html>
<!--
https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/lire-des-donnees-2
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ex OpenClassRoom</title>
    </head>
    <body>
        <?php
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

// Si tout va bien, on peut continuer
// On récupère tout le contenu de la table jeux_video
        $reponse = $bdd->query('SELECT * FROM jeux_video');

// On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()) {
            ?>
            <p>
                <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
                Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
                Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
                <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
            </p>
            <?php
        }   // fin du while
        ?>    

        // version pure PHP (note: ne sera pas exécuté car le $response->fetch() retourne directement false
        <?php
        while ($donnees = $reponse->fetch()) {
            echo "<p><strong>Jeu</strong> : " . $donnees['nom'];
            echo "<br />Le possesseur de ce jeu est : " . $donnees['possesseur'];
            echo ", et il le vend à " . $donnees['prix'] . " euros !<br />";
            echo "Ce jeu fonctionne sur " . $donnees['console'] . " et on peut y jouer à " . $donnees['nbre_joueurs_max'] . " au maximum<br />";
            echo $donnees['possesseur'] . " a laissé ces commentaires sur " . $donnees['nom'] . " : <em>" . $donnees['commentaires'] . "</em>";
            echo "</p>";
        }   // fin du while

        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>    


    </body>
</html>
