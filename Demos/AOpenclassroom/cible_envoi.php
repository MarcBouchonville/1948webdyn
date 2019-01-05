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
    
    if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
            {
		if ($_FILES['monfichier']['size'] <= 1000000 ) 
                    {
			$infosfichier = pathinfo($_FILES['monfichier']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			if (in_array($extension_upload, $extensions_autorisees)) 
                        {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . $prenom . '.' . extension($_FILES['monfichier']['name']));
                    echo "L'envoi a bien été effectué !";

			}
		}
	}
    ?>
    </body>
</html>
