<?php
// ref: https://zestedesavoir.com/tutoriels/295/les-filtres-en-php/
// quel formulaire a été posté
$form = 0;  // numéro du formulaire posté (0 : pas de formulaire)
if (isset($_GET['submit1'])) {   // si la query string contient la clef "submit1"
    $form = 1;                  // sert à indiquer que le formulaire 1 a été posté
}
if (isset($_GET['submit2'])) {   // si la query string contient la clef "submit2"
    $form = 2;                  // sert à indiquer que le formulaire a été posté
}

$model = array();   // contient toutes les informations du formulaire
$model['form'] = $form;
switch ($form) {
    case 1: // validation input par input
        echo ' la var : ' . htmlspecialchars($_GET["pseudo"]);
        
        if (htmlspecialchars($_GET['pseudo']) == NULL) {
            echo 'test valeur null';
        } else {
            $model['pseudo'] = filter_input(INPUT_GET, 'pseudo', FILTER_SANITIZE_STRING);
        }
        
        $model['email'] = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
        break;
    case 2:
        $filter = [
            'login' => FILTER_SANITIZE_STRING,
            'passwd' => FILTER_UNSAFE_RAW,
            'passwd2' => FILTER_UNSAFE_RAW,
            'email' => [
                'filter' => FILTER_VALIDATE_EMAIL,
                'flags' => FILTER_NULL_ON_FAILURE
            ],
            'email2' => FILTER_UNSAFE_RAW,
            'birth' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '#^\d{4}-\d{2}-\d{2}$#'
                ],
                'flags' => FILTER_NULL_ON_FAILURE
            ]
        ];
        $result = filter_input_array(INPUT_GET, $filter);
        $model = array_merge($model, $result);
        break;
}
$valid = true;
if (in_array(NULL, $model, true)) {
    $valid = false;
} else if ($form === 2) {
    if ($model['email'] !== $model['email2'] or $model['passwd'] !== $model['passwd2']) {
        $valid = false;
    }
}
$model['valid'] = $valid;

function isPseudoValid($model) {
    return $model["form"] === 1 && is_null($model["email"]);
}


?>
<!DOCTYPE html>
<!--
ref: https://zestedesavoir.com/tutoriels/295/les-filtres-en-php/
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test filter_input</title>
        <style>
            .debug {
                border: 1px black solid;
                border-radius: 10px;
                margin: 10px auto 20px auto;
                padding: 1.2em 0 1.2em 3em;
                width: 30em;
                text-align: justify;
            }
            .form {
                border: 1px black solid;
                border-radius: 10px;
                margin: 10px auto 10px auto;
                padding: 10px;
                width: 30em;
            }
            .form h3 {
                text-align: center;
                margin-top: 0em;
            }
            .form div {
                margin: 10px;
            }
            .form div label {
                display: inline-block;
                width: 6em;
            }
            .form div label::after {
                content: ' : ';
            }
            .error {
                font-family: courier, courier new, serif;
                color: red;
                font-weight: bold;
                font-style: italic;
            }
            #error_pseudo {
                    <?php
                        if (empty($model['pseudo'])) {
                     ?>
                            display: inline-block;
                    <?php } else {
                    ?>
                            visibility: hidden;
                    <?php }
                    ?>

            }
            
            #error_email {
                visibility: hidden;
            }
        </style>
    </head>
    <body>
        <div id="response" class="debug">
<?php
var_dump($model);
?>
        </div>
        <div id="conteneur1" class="form">
            <h3>form 1</h3>
            <form id="form1" method="GET" action="filter_input.php">
                <div class="error">
                    <p>

                        <span id="error_pseudo">pseudo doit contenir minimum 3 caractères</span> <br>
                        <span id="error_email">email doit être une adresse email valide</span>
                    </p>
                </div>
                <div>
                    <label id="pseudo">pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" minlength="3" maxlength="8" required />
                </div>
                <div>
                    <label id="email">email</label>
                    <input type="email" id="email" name="email" required />
                </div>
                <div>
                    <input type="submit" name="submit1" value="envoyer" />
                </div>
            </form>
        </div>
        <div id="conteneur2" class="form">
            <h3>form 2</h3>
            <form id="form2" method="GET" action="filter_input.php">
                <div>
                    <label id="login">login</label>
                    <input type="text" id="login" name="login" required />
                </div>
                <div>
                    <label id="passwd">password</label>
                    <input type="password" id="passwd" name="passwd" required />
                </div>
                <div>
                    <label id="passwd2">re password</label>
                    <input type="password" id="passd2" name="passwd2" required />
                </div>
                <div>
                    <label id="emailA">email</label>
                    <input text="email" id="emailA" name="email" required />
                </div>
                <div>
                    <label id="email2">re email</label>
                    <input text="email" id="email2" name="email2" required/>
                </div>
                <div>
                    <label id="birth">né le</label>
                    <input type="date" id="birth" name="birth" required pattern="^\d{4}-\d{2}-\d{2}$" />
                </div>
                <div>
                    <input type="submit" name="submit2" value="envoyer" />
                </div>
            </form>
        </div>
    </body>
</html>
