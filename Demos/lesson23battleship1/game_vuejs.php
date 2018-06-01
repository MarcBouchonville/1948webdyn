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
                <div v-for="(line, lIndex) in me">
                    <div v-for="(cell, cIndex) in line" class="cell" @click="addBoat(lIndex, cIndex)">
                        <span v-bind:class="other[lIndex][cIndex].boat"></span>                        
                    </div>
                </div>
            </div>
        </main>
        <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
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

            function generateMatrice(size, boatState) {
                return new Array(size).fill(new Array.size(boatState));
            };
            
            var vm = new Vue({
                el: '#grids',
                data: {
                    other: generateMatrice(size, BOAT_NONE),
                    me: generateMatrice(size, BOAT_NONE)
                },
                methods: {
                    addBoat: function (lIndex, cIndex) {
                        if (gameState === GAME_CONFIGURING) {
                            console.log("Add boad on line: " + lIndex + " - cell: " + cIndex);
                            // does not work this.me[lIndex][cIndex] = BOAT_VISIBLE;
                            var newLine;// to do copy
                            Vue.set(me, lIndex, newLine);
                        }
                    },
                    fire: function (lIndex, cIndex) {
                        switch(gameState) {
                            case GAME_CONFIGURING:
                                gameState = GAME_PLAYING;
                                this._fireOther(lIndex, cIndex);
                        }
                    },
                    _fireOther: function(lIndex, cIndex) {
                        var cell = this.other[lIndex][cIndex];
                        if(cell.boat === BOAT_UNVISIBLE) {
                            cell = BOAT_SUNK;
                        }
                    },
                    _hasLost: function(grid) {
                        var lost = true;
                        for(var l=0; l<grid.length; l++) {
                            
                        }
                    }
                }
            });
        </script>
    </body>
</html>
