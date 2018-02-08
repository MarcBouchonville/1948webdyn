<!DOCTYPE html>
<!--
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign</title>
    </head>
    <body>
        <form action="process.php" method="POST">
            <div>
                <input type="text" name="nom" placeholder="votre nom">
            </div>
            <div>
                <input type="email" name="email" placeholder="votre email">
            </div>
            <div>
                <input type="submit" value="OK">
            </div>
            <ul>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                    <li><?php echo $i ?></li>
                <?php } ?>
            </ul>
        </form>
    </body>





</html>