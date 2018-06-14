<?php 
// obligatoire sinon crash
// http://php.net/manual/fr/timezones.europe.php
date_default_timezone_set("Europe/Brussels"); 
?>
<!DOCTYPE html>
<!--
affiche l'heure
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Horloge</title>
        <!-- demande au browser de recharger la page toutes les secondes -->
        <meta http-equiv="refresh" content='1'/>
        <style>
            .horloge {
                margin: 50px auto 10px auto; 
                border: 5px solid black; 
                border-radius: 30px; 
                padding: 0px 20px; 
                max-width: 200px; 
                font-size: 3em; 
                text-align: center
            }
        </style>
    </head>
    <body>
        <div class='horloge'>
            <!-- retourne l'heure -->
            <p><?php echo date("h:m:s"); ?></p>
        </div>
    </body>
</html>