<?php
if( ! session_start()) {
    error_log(date("Y-m-d h:m:s") . " ERROR - " . __FILE__ . " - " . "JMD checkt sign.php");
}
$valid = isset($_POST['nom']) && isset($_POST['email']);    // le formulaire est-il rempli

if ($valid) {       // si le formulaire est rempli
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);         // nettoie $_POST['nom') et assigne à $nom
    $_SESSION['nom'] = $nom;    // enregistre nom dans la session (via $_SESSION)
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);     // idem pour email
    $_SESSION['email'] = $email;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Process</title>
    </head>
    <body>
        <?php
        if ($valid) {
            ?>
            <section id="valid">
                <p>
                    Félicitation, vous être enregistré sous:<br>
                    <?php echo $nom ?><br>
                    <?php echo $email ?><br>
                    <a href="content.php">continuer</a>
                </p>
            </section>
        <?php } else { ?>
            <section id="invalide">
                <p>
                    Erreur<br>
                    veuillez introduire votre nom et email<br>
                    <a href='sign.php'>click ici pour signer</a>
                </p>
            </section>
        <?php } ?>
    </body>
</html>
