<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

$pdo = new PDO("mysql:host=localhost;dbname=DBTest;charset=utf8", "root", "root");

if ($conn->connect_error) {
    die("Connexion impossible: " . $conn->connect_error);
} 
echo "Connexion Ok";


/* http://php.net/manual/fr/timezones.europe.php
date_default_timezone_set("Europe/Brussels"); */

?>
<!DOCTYPE html>
<!--
afficher la ville
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ville</title>
        <style>
            .ville {
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
        <input type="text" name="filter" placeholder="recherche" >        
    <script>
        var searchinput = document.getElementById('ville');
        var searchListener = ville.adEventListener('keyup', search)
        function search(event) {
            var filter = event.target.value;
            console.log(filter);
            // RQ récupérer le body de la réponse
            // injecte la rép html à faire ...
        }
    </script>
    <script>
        
    </script>
    </body>
</html>