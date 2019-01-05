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
    if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter']))
    {
            // 1 : On force la conversion en nombre entier
            $_GET['repeter'] = (int) $_GET['repeter'];

            // 2 : Le nombre doit être compris entre 1 et 100
            if ($_GET['repeter'] >= 1 AND $_GET['repeter'] <= 100) 
            {	
                    for ($i = 0 ; $i < $_GET['repeter'] ; $i++)
                    {
                            echo 'Bonjour ' . strip_tags($_GET['prenom']) . ' ' . strip_tags($_GET['nom']) . ' !<br />';
                    }
            }
    }
    else
    {
       echo 'Il faut renseigner un nom, un prénom et un nombre de répétitions entre 1 et 100 !';
    }
    ?>
</body>
</html>
