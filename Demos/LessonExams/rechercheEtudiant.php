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
        
        // put your code here
        <label for="filter">nom étudiant : </label>
        <input type="text" name="filter" placeholder="nom" >        


        
        <?php
                require ("connect.php");
                $pdo = new PDO ("mysql:host=" . SERVER . ";dbname=" . BASE, USER, PASSWD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT numetu, nom, prenom FROM etudiant where nom like 'Depp'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["numetu"]. " - Identite : " . $row["nom"]. " " . $row["prenom"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
?>
    </body>
</html>
