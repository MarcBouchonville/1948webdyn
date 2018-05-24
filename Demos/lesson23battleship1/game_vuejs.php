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
                    <div v-for="(cell, cIndex) in line" class="cell" @click="addBoat(this, lIndex, cIndex)">
                        <span v-bind:class="other[lIndex][cIndex].boat"></span>                        
                    </div>
                </div>
            </div>
        </main>
        <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
        <script>
            const BOAT_NONE = 'NONE';
            const BOAT_HEALTY = 'HEALTHY';
            
            var vm = new Vue({
                el: '#grids',
                data: {
                    other: [],
                    me: []
                },
                methods: {
                    addBoat: function(lIndex, cIndex) {
                        console.log("Add boad on line: " + lIndex + " - cell: " + cIndex);
                        this.me[lIndex][cIndex] = {boat: BOAT_HEALTY}; 
                    },
                    fire: function(lIndex, cIndex) {
                        
                    }
                }
            });
            function init(size) {
                for(var i=0; i<size; i++) {
                    var otherLine = [];
                    var meLine = [];
                    for(var j=0; j<size; j++) {
                        otherLine.push({boat: BOAT_NONE});
                        meLine.push({boat: BOAT_NONE});
                    }
                    vm.other.push(otherLine);
                    vm.me.push(meLine);
                }
            } 
            init(4);
        </script>
    </body>
</html>
