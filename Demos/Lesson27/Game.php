<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <div class="container">
            <h1>Battle Ship</h1>
            <main>
                <div id="ships" class="ships" style="display: none">
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
                    <h3>Statut : <span id="state"></span></h3>
                </div>
            </main>
        </div>
        <script src="javascript/board.js" type="text/javascript"></script>
    </body>
</html>
