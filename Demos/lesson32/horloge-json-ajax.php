<?php
http://php.net/manual/fr/timezones.europe.php
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
            <p id='horloge'><?php echo date("h:m:s"); ?></p>
        </div>
        <script>
            // récupère une référence sur l'élément
            var horlogeElement = document.getElementById('horloge');
            // exécute la fonction toutes les secondes
            setInterval(function () {
                // instantie un XMLHttpRequest : 
                //       l'objet qui permet à Javascript de faire des requeêtes HTTP
                var xhttp = new XMLHttpRequest();
                // enregistre une fonction qui sera exécutée lorsque l'état de xhttp change
                //      en particulier, quand le browser reçoit la réponse du serveur
                xhttp.onreadystatechange = function () {
                    // si l'état est terminé et la communication a réussi
                    if (this.readyState === 4 && this.status === 200) {
                        // affiche le contenu de la réponse dans l'élément
                        var current_time = JSON.parse(this.responseText);
                        horlogeElement.innerHTML = current_time.hour;
                    }
                    // si l'état est terminé et la communication n'a pas réussi
                    else if(this.readyState === 4 ){
                        // affiche une erreur
                        horlogeElement.innerHTML = "<span style='color: red;'>connexion perdue</span>";
                    }
                    // dans les autres cas
                    else {
                        // affiche dans la console pour comprendre ce qui se passe
                        console.log(this.readyState, this.status);
                    }
                };
                // précise la méthode (GET), l'url et si c'est asynchrone
                xhttp.open("GET", "json-api/time.php", true);
                // envoie la requête HTTP
                xhttp.send();
            }, 100);
        </script>
    </body>
</html>