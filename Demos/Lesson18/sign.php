<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>1-Sign</title>
            <script type="text/javascript">
                    function verif(nom, email)
                    {
                            if ((nom === undefined) || (email === undefined))
                            {
                                    alert("les 2 champs doivent être complétés !");
                                    return false;
                            } else {
                                    alert("ok");
                                    return true;
                            }
                    }
            </script>
    </head>
    <body>
        <form action="process.php" method="POST">
            <div>
                <label>Nom</label>
                <input type="text" name="nom" placeholder="votre nom" />
                <br>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="adresse email" />
                <br>
            </div>
            <div>
                <input type="submit" value="Ok" onclick="verif(nom, email);"/>
            </div>
        </form>
    </body>
</html>
