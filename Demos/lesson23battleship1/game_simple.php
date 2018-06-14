<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Battle Ship</title>
        <link href="style/new.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Battle Ship</h1>
        <main id="grids">
            <div id="other" class="board">
                <div v-for="(line, lIndex) in other">
                    <div v-for="(cell, cIndex) in line" class="cell" @click="fire(lIndex, cIndex)">
                        <span v-bind:class="other[lIndex][cIndex].boat"></span>
                    </div>
                </div>
            </div>
            <div id="me" class="board">
            </div>
        </main>
        <script>
            const BOAT_NONE = "boat-none";
            const BOAT_VISIBLE = "boat-visible";
            const BOAT_UNVISIBLE = "boat-unvisible";
            const BOAT_SUNK = "boat-sunk";
            
            const GAME_CONFIGURING = "CONFIGURING";
            const GAME_PLAYING = "PLAYING";
            const GAME_DONE = "DONE";

            var gameState = GAME_CONFIGURING;
            
            var size = 5;
            
            var other = document.getElementById('other');
            var me = document.getElementById('me');

            function onClickCell(event) {
                console.log(event.target);
            }
            
            function generateMatrice(board, size, boatState) {
                for(var l=0; l<size; l++) {
                    var line = document.createElement('div');
                    for(var c=0; c<size; c++) {
                        var cell = document.createElement('div');
                        //cell.addEventListener('click', function(event) { console.log(event.target);});
                        line.appendChild(cell);
                    }
                    board.appendChild(line);
                }
            };
            generateMatrice(me, 5, BOAT_NONE);
            var cell = document.querySelector('#me>div>div');
            cell.addEventListener('click', function(event) { console.log(event.target);});
            cell.style.backgroundColor = 'black';
            
            
        </script>
    </body>
</html>
