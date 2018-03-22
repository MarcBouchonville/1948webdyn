<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
        <button id="bouton1" onclick="myFunction()">Click me</button>
        <script>
            function myFunction() {
                var recherche = document.getElementById("bouton1");
                recherche.style.color = "green";
                recherche.style.backgroundColor = "red";
                
            }
        </script>
    </body>
</HTML>
