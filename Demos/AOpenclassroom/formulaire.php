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
        <form method="post" action="cible_envoi.php" enctype='multipart/form-data'>
            <label>Prénom</label>
            <input type="text" name="prenom" />
            <label>champ texte</label>
            <textarea name="message" rows="8" cols="45">
                Votre message ici.
            </textarea>
            <select name="choix">
                <option value="choix1" selected="selected">Belgique</option>
                <option value="choix2">France</option>
                <option value="choix3">Allemagne</option>
                <option value="choix4">Luxembourg</option>
            </select>
            <label><p>nourriture :</p>
                <input type="checkbox" name="case" id="case1" checked="cheked"/> <label for="case1">frites</label>
                <input type="checkbox" name="case" id="case2" /> <label for="case2">fromage</label>
                <input type="checkbox" name="case" id="case3" /> <label for="case3">choucroute</label>
                <input type="checkbox" name="case" id="case4" /> <label for="case4">saucisses</label>
            </label>
            Aimez-vous les frites ?
            <input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
            <input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label>
            <br>
            <hr>
            <p>Formulaire d'envoi de fichier</p>
            <input type="file" name="monfichier" />
            <input type="submit" value="Valider pour envoi" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
