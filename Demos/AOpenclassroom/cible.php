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
        $prenom = filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_STRING);
        $message = $prenom = filter_input(INPUT_POST,'message',FILTER_SANITIZE_STRING);
        $choix = $prenom = filter_input(INPUT_POST,'choix',FILTER_SANITIZE_STRING);
        $case = $prenom = filter_input(INPUT_POST,'case',FILTER_SANITIZE_STRING);
        $frites = $prenom = filter_input(INPUT_POST,'frites',FILTER_SANITIZE_STRING);
        
        ?>
        <p>Bonjour !</p>
        <p>Le prénom reçu : <?php echo $prenom; ?> !</p>
        <p>le texte reçu : <?php echo $message; ?></p>
        <p>Le pays choisi : <?php echo $choix; ?> </p>
        <p>La spécialité de ce pays est, selon vous : <?php echo $case; ?></p>
        <p>Vous aimez les frites ? : <?php echo $frites; ?></p>
        <br>
        <p>Si tu veux changer de prénom, <a href="formulaire.php">clique ici</a> pour revenir à la page formulaire.php.</p>
        
    </body>
</html>
