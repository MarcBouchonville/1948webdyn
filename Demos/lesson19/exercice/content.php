<?php
session_start();
$valid = isset($_SESSION['nom']) && isset($_SESSION['email']);
if ($valid) {
    $nom = $_SESSION['nom'];
    $email = $_SESSION['email'];
} else {    // redirige sur sign.php
    header('Location: sign.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Content</title>
        <style>
            .container {
                max-width: 960px;
                margin: 0 auto 0 auto;
                font-size: 1.4em;
                text-align: justify;
            }
            .text-right {
                text-align: right;
            }
            .float-left {
                float: left;
                margin-right: 1em;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <section class="text-right">
                    <p><?php echo $nom; ?></p>
                    <p><?php echo $email; ?></p>
                </section>
            </header>
            <main>
                <h3>Bienvenue <?php echo $nom; ?></h3>
                <p>
                    <img class="float-left" 
                         src="https://lemag.nikonclub.fr/wp-content/uploads/2016/11/Photo-selection-pour-Nikon-France-Mattia-Bonavida-2016-8.jpg"
                         alt="paysage" width="200"/>
                    123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vestibulum rhoncus vehicula. Pellentesque nisi dolor, rutrum sit amet elementum iaculis, venenatis eget lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam sodales sollicitudin scelerisque. In hac habitasse platea dictumst. Proin mollis arcu lobortis leo luctus, sed ultrices orci mollis. Nulla porttitor risus neque, et lobortis libero sagittis vel. Aliquam erat volutpat. Donec placerat sed magna consequat tincidunt. Vivamus pellentesque elit nec magna pulvinar, eget finibus nibh volutpat.

                    Nunc eu metus eu dolor facilisis sodales. Morbi semper, risus hendrerit fringilla congue, eros est sollicitudin lorem, vitae pharetra diam eros ut magna. Pellentesque dapibus, lacus id auctor feugiat, nunc velit porttitor ligula, a tincidunt est diam vel lorem. Suspendisse justo massa, interdum sed metus sit amet, porttitor commodo ante. Praesent aliquam maximus tellus, vitae elementum neque elementum ac. Sed in massa pretium, dapibus ex et, dignissim tortor. Quisque posuere erat nibh, non molestie enim finibus quis. Donec eget tempor augue. Integer eu nunc eu nunc lobortis efficitur sed non lacus. Proin tellus augue, dictum varius accumsan eget, venenatis ut mauris.

                    Donec a tortor cursus, maximus sem vitae, hendrerit odio. Pellentesque eget ipsum rhoncus, gravida mauris nec, blandit nibh. Curabitur et dolor leo. Morbi maximus, neque eu consectetur vulputate, sem lectus varius leo, vitae gravida sapien nisi id ante. Nunc quis urna feugiat, tristique quam a, feugiat mi. Pellentesque facilisis vulputate arcu suscipit ultrices. Donec egestas lacinia leo sit amet vehicula. Donec posuere metus sit amet lorem egestas sodales. Morbi bibendum est massa, quis fermentum lectus aliquam sed. Ut lorem sem, imperdiet id eros in, ultricies viverra ipsum. Nullam fringilla eu erat sed euismod. Quisque a tellus luctus urna fermentum suscipit ac sodales turpis. Sed mollis, magna at imperdiet egestas, nunc est eleifend risus, vitae euismod neque massa eu sem. Etiam viverra eros turpis, et feugiat est finibus dapibus. Duis nunc dui, molestie non velit non, placerat tempus odio. In risus sem, mollis id velit condimentum, porta sodales diam.

                    Curabitur varius, sapien vel maximus dignissim, purus odio eleifend nisl, id facilisis lectus urna et massa. Praesent ac magna sed risus hendrerit bibendum. Quisque consequat luctus tortor a posuere. Nunc vel augue velit. Nullam sit amet ornare nulla. Proin at commodo justo, at mollis massa. Integer eu eleifend dui. Morbi vel placerat nibh. Nunc magna erat, elementum nec risus eu, posuere aliquet massa. Praesent dapibus rhoncus diam et cursus. Aenean maximus urna nibh, id mattis urna vestibulum vitae. Nullam enim odio, malesuada quis nisl ut, tempus blandit mauris. Donec et lacus nulla.

                    Aenean maximus, urna in convallis tincidunt, dolor mauris hendrerit augue, a porttitor orci ipsum in nibh. In sit amet lorem at nulla dictum finibus in eu massa. Aenean consectetur ipsum eget vehicula convallis. Donec suscipit magna dolor. Pellentesque sit amet justo auctor, semper enim id, ultrices enim. Mauris egestas sed metus non commodo. Cras molestie nibh eu fermentum auctor. Maecenas non semper arcu, vitae porttitor mi. Nullam eget nibh ac sem malesuada mattis nec eget elit. Morbi nunc felis, hendrerit non feugiat quis, faucibus et diam. Sed nec elit semper, finibus purus eget, tincidunt enim.
                </p>
            </main>
        </div>
    </body>
</html>