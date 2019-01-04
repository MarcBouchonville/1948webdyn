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
        <label for="filter">Ville : </label>
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
        
        <?php
                $sql="select * from Table01 where ville like ". villeElement . "% limit 10";
                $resultat = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["id"]. " - Ville: " . $row["Ville"]. "<br>";
                        }
                } else {
                    echo "0 results";
                }
                $conn->close();
        
        /* echo json_encode(); */
        ?>
    </body>
</html>
