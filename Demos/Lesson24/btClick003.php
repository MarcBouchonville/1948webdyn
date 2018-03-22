<?php
    /* fichier btClick002.php*/
?>
<!DOCTYPE HTML5>
<HTML>
    <head>
        <title>
            test
        </title>


    </head>
    <body>
        <div>
            <p id="demo">couleur</p>
        </div>
        
        
        <button id="bouton1">Click me</button>
        <script>
            document.getElementById("bouton1").addEventListener("click", chgtCouleur)
                function chgtCouleur() {
                var recherche = document.getElementById("bouton1");
                recherche.style.color = "green";
                recherche.style.backgroundColor = "red";
            }
        </script>
    </body>
</HTML>
