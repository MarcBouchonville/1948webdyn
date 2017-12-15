<?php
// pour debug
var_dump($_GET);
echo "<br>";
var_dump($_POST);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Process</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <p>Hello<br>
                <?php echo $_GET["name"]; ?><br>              
                <?php echo $_GET["prenom"]; ?>
            </p>
<!--            <p>Hello Depaepe Jean</p>-->
        </div>
    </body>
</html>










