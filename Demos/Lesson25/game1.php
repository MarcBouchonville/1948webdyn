<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Battle Ship</title>
        <link href="style/new.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <h1>Battle Ship</h1>
            <main>
                <div id="ships" class="ships">
                    <div>
                        <div></div><div></div><div></div><div></div>
                    </div>
                    <div>
                        <div></div><div></div><div></div>
                    </div>
                    <div>
                        <div></div><div></div>
                    </div>
                    <div>
                        <div></div>
                    </div>
                </div>
                <div id="other" class="board">

                </div>
                <div id="me" class="board">

                </div>
                <div>
                    <h3>Statut : <span id="state">CONFIGURING</span></h3>
                </div>
            </main>
        </div>
        <script src="javascript/board.js" type="text/javascript"></script>
    </body>
</html>